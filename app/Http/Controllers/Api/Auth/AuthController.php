<?php

namespace App\Http\Controllers\Api\Auth;

use App\Extra\Helper;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth:api', ['except' => ['login']]);
    // }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "email" => 'required|email',
            "password" => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        try {
            $credentials = request(['email', 'password']);

            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'Unauthorized'], 401);
            }

            return $this->respondWithToken($token, Auth::id());
        } catch (JWTException $e) {
            return response()->json(["User not found"], 404);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users',
            'name' => 'required|string|between:2,100',
            'password' => 'required',
            'role' => 'required',
        ]);

        if ($validator->fails()) {
            $valErr = [];
            foreach ($validator->errors()->toArray() as $key => $value) {
                $valErr[$key] = $valErr[0];
            }
            return response()->json($valErr, 422);
        }

        try {
            $user = new User();
            $user->email = $request->email;
            $user->name = ucfirst($request->name);
            $user->password = Hash::make($request->password);
            $user->role = $request->role;
            $user->save();

            if (!$token = JWTAuth::attempt(['email' => $request->email, 'password' => $request->password])) {
                return response()->json(['error' => 'Email or Password is incorrect', "status" => 422], 401);
            }

            $user = User::find(Auth::id());
            return response()->json([
                'access_token' => $token,
                'user_id' => $user->id,
                'name' => $user->name,
                'message' => "User register successfully.",
                'status' => 200
            ], 200);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        if (Auth::check()) {
            Auth::logout();

            return response()->json(['message' => 'Successfully logged out']);
        }

        return response()->json([], 422);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token, $auth_id)
    {
        $user = User::find($auth_id);
        return response()->json([
            'access_token' => $token,
            'user_id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'role' => $user->role,
        ]);
    }
}
