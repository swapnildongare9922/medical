@extends('layouts.seller.master')
@section('title')
    Seller | | Orders
@endsection
@section('sidebar-orders')
    active
@endsection
@section('content')
    <div class="container-fluid mt-2">
        <div class="row">
            <div class="col text-secondary">
                <h2> Orders</h2>
            </div>
        </div>
    </div>
    <div class="container m-1">
        <div class="row card">
            <div class="card-header">
                <div class="col">
                    <div class="row " >
                        <div class="col">
                            <strong>Product Name</strong>
                        </div>
                        <div class="col">
                            <strong>Quantity</strong>
                        </div>
                        <div class="col">
                            <strong>Company</strong>
                        </div>
                        <div class="col">
                            <strong>Product Type</strong>
                        </div>
                        <div class="col">
                            <strong>Price</strong>
                        </div>
                        <div class="col">
                            <strong>Action</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @foreach ($orders as $item)
        <div class="container-fluid m-1">
            <div class="row">
                <div class="col card">
                    <div class="card-body">
                        <form action="" method="POST">
                            @csrf
                            <input type="hidden" name="order_id" value="{{ $item->order_id }}">
                            <input type="hidden" name="product_id" value="{{ $item->ordered_product_id }}">
                            <div class="row">
                                <div class="col">
                                    {{ $item->product_name }}
                                </div>
                                <div class="col">
                                    {{ $item->ordered_product_quantity }}
                                </div>
                                <div class="col">
                                    {{ $item->product_company }}
                                </div>
                                <div class="col">
                                    {{ $item->product_type }}
                                </div>
                                <div class="col">
                                    <input class="form-control" type="number" name="product_price" id="" placeholder="Enter total price">
                                </div>
                                <div class="col">
                                    <button class="btn btn-info">Deliver</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
