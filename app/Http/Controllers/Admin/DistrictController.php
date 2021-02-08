<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class DistrictController extends Controller
{
    public function index(Request $request)
    {
        $district = District::get()->all();
        $state = State::get()->all();
        return view('admin.district.district',['district'=>$district,'state'=>$state]);
    }

    public function insertDistrict(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|alpha',
            'state_id' => 'required',
        ]);

        if ($validator->fails()) {
            flash($validator->errors());
            return redirect()->back();
        }
        if($request->state_id === null)
        {
            flash('Please select state');
            return redirect()->back();
        }
        $district = new District();
        $district->state_id = $request->state_id;
        $district->title = ucfirst($request->title);
        $district->slug = Str::random(2) . '-' . Str::of(strtolower($request->title))->substr(0, 2);
        $district->save();

        flash('District added !')->success()->important();;
        return redirect()->back();
    }

    public function getUpdateDistrict(Request $request)
    {
        $district = District::get()->where('slug',$request->slug)->first();
        $state = State::get()->all();
        return view('admin.district.updateDistrict',['district'=>$district,'state'=>$state]);
    }

    public function updateDistrict(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required', Rule::unique('districts')->ignore($request->slug),
            'state_id' => 'required'

        ]);

        if ($validator->fails()) {
            flash($validator->errors())->warning()->important();
            return redirect()->route('districts');
        }
        if($request->state_id === null){
            flash('please select state !')->warning()->important();
            return redirect()->back();
        }

        $district = District::get()->where('slug', $request->slug)->first();
        $district->state_id = $request->state_id;
        $district->title = $request->title;
        $district->slug = Str::random(2) . '-' . Str::of(strtolower($request->title))->substr(0, 2);
        $district->update();
        flash('District updated')->warning()->important();
        return redirect()->route('districts');
    }
    public function deletetDistrict(Request $request)
    {
        $district = District::get()->where('slug', $request->slug)->first();
        $district->delete();

        flash('District deleted !')->warning()->important();
        return redirect()->back();
    }
}
