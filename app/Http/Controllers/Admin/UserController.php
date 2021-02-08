<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\Mail\ActivateUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function getUsers()
    {
        $user = User::get()->all();
        return view('admin.user.user', ['user' => $user]);
    }
    public function activeUser(Request $request)
    {
        $user = User::find($request->id);
        $user->status = 1;
        $user->update();

        Mail::to($user->email)->send(new ActivateUser());

        flash('User activated !')->success()->important();
        return redirect()->back();
    }

    public function inactiveUser(Request $request)
    {
        $user = User::find($request->id);
        $user->status = 0;
        $user->update();

        flash('User deactivated !')->warning()->important();
        return redirect()->back();
    }
}
