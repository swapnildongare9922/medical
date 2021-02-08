@extends('layouts.admin.master')
@section('title')
    Update Product
@endsection
@section('sidebar-add-product')
    active
@endsection
@section('content')
 <div class="container mt-5">
     <div class="row">
         <div class="col-md-2"></div>
         <div class="col-md-6 card">
             <div class="card-header text-center">
                 <h4>Update Product</h4>
             </div>
            <div class="card-body">
                <form action="" id="countryForm" method="POST">
                    @csrf
                    <div class="form-group">
                        <select id="my-select" class="form-control" name="type">
                            <option value="{{ null }}">Select Product Type</option>
                            @foreach ($product_type as $item)
                            <option value="{{ $item->id }}">{{ $item->title }}</option>
                            @endforeach


                        </select>
                    </div>
                    <div class="form-group">
                        {{-- <label for="my-input">Enter Product Name</label> --}}
                        <input id="my-input" class="form-control" type="text" name="name" value={{ $product->name }}
                            placeholder="Product name">
                    </div>
                    <div class="input-group">
                        <input type="text" class="form-control" id="newcountry" placeholder="Product Company"
                        value={{ $product->company }}
                            aria-label="Add new langugae" aria-describedby="basic-addon2" name="company">
                    </div>
                    <button class="form-control p-1 btn-info mt-2">Update</button>
                </form>
            </div>
         </div>
     </div>
 </div>
@endsection
