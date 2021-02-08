@extends('layouts.admin.master')
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
                        <h4>Update State</h4>
                    </div>
                   <div class="card-body">
                    <form method="POST" action="/admin/home/state/update/{{ $state->slug }}">
                        @csrf

                        <input type="text" name="id" value={{ $state->id }} hidden />
                        <div class="form-group">
                            <select id="my-select" class="form-control" name="country_id">
                                <option value="{{ null }}">Select Country</option>
                                @foreach ($country as $item)
                                    <option value="{{ $item->id }}" {{ $item->id === $state->id ? "selected" : null }}>{{ $item->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="my-input">State</label>
                            <input id="my-input" class="form-control" type="text" name="title" value="{{ $state->title }}">
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
