<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\UserDetails;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('buyer.home.home');
    }

    public function getProfile()
    {
        $user = User::find(Auth::user()->id);
        $auth_id = Auth::user()->id;
        $userDetails = UserDetails::get()->where('user_id', $auth_id)->first();
        $area = Area::get()->all();
        // return response()->json([$user,$userDetails]);
        return view('buyer.home.buyer-details', ['user' => $user, 'user_details' => $userDetails, 'area' => $area]);
    }

    public function updateProfile(Request $req)
    {
        $user = User::find(Auth::user()->id);
        $user->name = $req->name;
        $user->save();

        $userDet = UserDetails::get()->where('user_id', Auth::user()->id)->first();
        if ($userDet == null) {
            $userDetails = new UserDetails();
            $userDetails->user_id = Auth::user()->id;
            $userDetails->gst_no = $req->gst_no;
            $userDetails->mobile_no = $req->mobile_no;
            $userDetails->address = $req->address;
            $userDetails->area = $req->area;
            $userDetails->gst_no = $req->gst_no;
            if ($req->hasFile('profile_pic')) {
                $image = $req->profile_pic->store('images/user/profile', 'public');
                $image_path = config('app.url') . '/storage/' . $image;
                $userDetails->profile_pic = $image_path;
            } else {
                $userDetails->profile_pic = null;
            }
            $userDetails->save();
            flash('Profile updated !')->success()->important();
            return redirect()->back();
        } else {
            $userDetails =  UserDetails::get()->where('user_id', Auth::user()->id)->first();
            $userDetails->gst_no = $req->gst_no;
            $userDetails->mobile_no = $req->mobile_no;
            $userDetails->address = $req->address;
            $userDetails->area = $req->area;
            $userDetails->gst_no = $req->gst_no;
            if ($req->hasFile('profile_pic')) {
                $image = $req->profile_pic->store('images/user/profile', 'public');
                $image_path = config('app.url') . '/storage/' . $image;
                $userDetails->profile_pic = $image_path;
            }
            $userDetails->update();
            flash('Profile updated !')->success()->important();
            return redirect()->back();
        }
    }
}
