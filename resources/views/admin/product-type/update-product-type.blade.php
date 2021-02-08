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
                        <h4>Update District</h4>
                    </div>
                   <div class="card-body">
                    <form method="POST" action="/admin/home/product-type/update/{{ $pro->slug }}">
                        @csrf

                        <div class="form-group">
                            <label for="my-input">Product Type</label>
                            <input id="my-input" class="form-control" type="text" name="title" value="{{ $product->title }}">
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
