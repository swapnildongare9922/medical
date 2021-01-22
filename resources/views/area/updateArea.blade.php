@extends('layouts.master')
@section('content')
    <section class="mt-5">
        <div class="conatiner">
            <div class="row">
                <div class="col-3"></div>
                <div class="col-6">
                    @include('flash::message')
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-3"></div>
                <div class="col-6 card">
                    <div class="card-header text-center">
                        <h4>Update Area</h4>
                    </div>
                   <div class="card-body">
                    <form method="POST" action="/admin/home/area/update/{{ $area->slug }}">
                        @csrf

                        <input type="text" name="id" value={{ $area->id }} hidden />
                        <div class="form-group">
                            <select id="my-select" class="form-control" name="district_id">
                                <option value="{{ null }}">Select District</option>
                                @foreach ($district as $item)
                                    <option value="{{ $item->id }}" {{ $item->id === $area->district_id ?  "selected" : null }}>{{ $item->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="my-input1">Area</label>
                            <input id="my-input1" class="form-control" type="text" name="title" value="{{ $area->title }}">
                        </div>
                        <div class="form-group">
                            <label for="my-input">Area code</label>
                            <input id="my-input" class="form-control" type="text" name="area_code" value="{{ $area->area_code }}">
                        </div>
                        <div class="form-group">
                            <button class="form-control btn btn-info" >Update</button>
                        </div>



                    </form>
                   </div>
                </div>
            </div>
        </div>
    </section>
@endsection
