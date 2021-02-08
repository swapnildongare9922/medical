<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class StateController extends Controller
{
    public function index(Request $request)
    {
        $state = State::get()->all();
        $country = Country::get()->all();
        return view('admin.state.state', ['state' => $state, 'country' => $country]);
    }

    public function insertState(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|alpha|unique:states',
            'country_id' => 'required',
        ]);

        if ($validator->fails()) {
            flash($validator->errors());
            return redirect()->back();
        }

        $state = new State();
        $state->country_id = $request->country_id;
        $state->title = ucfirst($request->title);
        $state->slug = Str::random(2) . '-' . Str::of(strtolower($request->title))->substr(0, 2);
        $state->save();

        flash('State added !')->warning()->important();;
        return redirect()->back();
    }

    public function getUpdatetState(Request $request)
    {
        $state = State::get()->where('slug',$request->slug)->first();
        $country = Country::get()->all();
        return view('admin.state.updateState',['state'=>$state,'country'=>$country]);
    }

    public function updateState(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required', Rule::unique('states')->ignore($request->slug),
            'country_id' => 'required'

        ]);

        if ($validator->fails()) {
            flash($validator->errors())->warning()->important();
            return redirect()->back();
        }

        $state = State::get()->where('slug', $request->slug)->first();
        $state->country_id = $request->country_id;
        $state->title = ucfirst($request->title);
        $state->slug = Str::random(2) . '-' . Str::of(strtolower($request->title))->substr(0, 2);
        $state->update();
        flash('State updated')->warning()->important();
        return redirect()->route('states');
    }
    public function deletetState(Request $request)
    {
        $state = State::get()->where('slug', $request->slug)->first();
        $state->delete();

        flash('State deleted !')->warning()->important();
        return redirect()->back();
    }
}
