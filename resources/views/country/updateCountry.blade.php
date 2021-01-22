@extends('layouts.master')
@section('content')
    <form method="POST" action="/admin/home/country/update/{{ $country->slug }}">
        @csrf

        <input type="text" name="id" value={{ $country->id }} hidden/>
        <input type="text" name="title" />
        <button type="submit">Submit</button>


    </form>
@endsection
