<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\District;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class AreaController extends Controller
{
    public function index()
    {
        $area = Area::get()->all();
        $district =  District::get()->all();
        return view('admin.area.area', ['area' => $area, 'district' => $district]);
    }
    public function insertArea(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'district_id' => 'required',
            'title' => 'required|alpha|unique:areas',
            'area_code' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            flash($validator->errors());
            return redirect()->back();
        }
        if ($request->district_id === null) {
            flash('Please select District !')->warning()->important();
            return redirect()->back();
        }

        $area = new Area();
        $area->district_id = $request->district_id;
        $area->title = ucfirst($request->title);
        $area->slug = Str::random(3) . '-' . Str::of(strtolower($request->title))->substr(0, 2);
        $area->area_code = $request->area_code;
        $area->save();

        flash('Area added successfully !')->success()->important();
        return redirect()->back();
    }
    public function getUpdateArea(Request $request)
    {
        $district = District::get()->all();
        $area = Area::get()->where('slug', $request->slug)->first();

        return view('admin.area.updateArea', ['area' => $area, 'district' => $district]);
    }

    public function updateArea(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'district_id' => 'required',
            'title' => 'required|alpha',
            'area_code' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            flash($validator->errors());
            return redirect()->back();
        }
        if ($request->district_id === null) {
            flash('Please select District !')->warning()->important();
            return redirect()->back();
        }
        $area = Area::get()->where('slug', $request->slug)->first();
        $area->district_id = $request->district_id;
        $area->title = ucfirst($request->title);
        $area->slug = Str::random(3) . '-' . Str::of(strtolower($request->title))->substr(0, 2);
        $area->area_code = $request->area_code;
        $area->update();

        flash('Area update successfully !')->success()->important();
        return redirect()->route('areas');
    }
    public function deleteArea(Request $request)
    {
        $area = Area::get()->where('slug', $request->slug)->first();
        $area->delete();
        flash('Area deleted !')->warning()->important();
        return redirect()->back();
    }
}
