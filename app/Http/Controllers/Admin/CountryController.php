<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class CountryController extends Controller
{
    public function index()
    {
        $country = Country::get()->all();
        return view('admin.country.country')->with('country', $country);
    }
    public function storeCountry(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|alpha|unique:countries',
        ]);

        if ($validator->fails()) {
            flash($validator->errors())->warning()->important();
            return redirect()->back();
        }
        $slug = Str::random(2) . '-' . Str::of(strtolower($request->title))->substr(0, 2);
        $country = new Country();
        $country->title = ucfirst($request->title);
        $country->slug = $slug;
        $country->save();

        flash('Country Inserted !')->success()->important();
        return redirect()->back();
    }

    public function getUpdateCountry(Request $request)
    {
        $country = Country::get()->where('slug', $request->slug)->first();
        return view('admin.country.updateCountry')->with('country', $country);
    }

    public function updateCountry(Request $request)
    {

        $validation = Validator::make($request->all(), [
            'title' => 'required|alpha', Rule::unique('countries')->ignore($request->slug)
        ]);
        if ($validation->fails()) {
            flash($validation->errors());
            return redirect()->back();
        }

        $slug = Str::random(2) . '-' . Str::of(strtolower($request->title))->substr(0, 2);
        $country = Country::get()->where('slug', $request->slug)->first();
        $country->title = $request->title;
        $country->slug = $slug;
        $country->update();
        // return response()->json([$request->all(),$request->slug]);
        flash('country updated !')->success()->important();
        return redirect('/admin/countries');
    }

    public function deleteCountry(Request $request)
    {
        $country = Country::get()->where('slug', $request->slug)->first();
        $country->delete();
        flash('country deleted !')->warning()->important();
        return redirect()->back();
    }
}
