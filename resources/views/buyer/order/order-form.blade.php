@extends('layouts.buyer.master')
@section('title')
    Order
@endsection
@section('sidebar-orders')
    active
@endsection


@section('content')

    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">order products</span>
            <h3 class="page-title">Order Products</h3>
        </div>
    </div>
    <!-- Page Header -->
    <div>
        @include('flash::message')
    </div>
    <div class="row">
        <div class="col">
            <div class="row">
                <div class="col-3"></div>
                <div class="col-9">

                </div>
            </div>
            <div class="card card-small mb-4">
                <div class="card-body border-bottom">
                    <h6 class="m-0">Order </h6>
                    <form action="" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <input type="text" class="form-control" list="product" name="product[]"
                                        placeholder="Select medicine">
                                    <datalist id="product">
                                        @foreach ($product as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </datalist>
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="quantity" placeholder="Quantity"
                                        aria-label="quantity" aria-describedby="basic-addon2" name="quantity[]">
                                </div>
                            </div>
                        </div>

                        <div class="add-row"></div>

                        <div class="card-footer">
                            <div class="form-group text-center mt-5">
                                <div class="row">
                                    <div class="col">
                                        <button class="btn btn-warning add-row-button" style="width:30%" type="button">
                                            Add Row
                                        </button>
                                    </div>
                                    <div class="col">
                                        <button class="btn btn-info " style="width:80%;height:50px">Order</button>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- End Default Light Table -->

    <script>
        $(document).ready(function() {

            var i=0;

            $('.add-row-button').click(function() {
                const addRowHtml = `
                             <div class="row" id="mainRow${i}">
                                <div class="col">
                                    <div class="form-group">
                                        <input type="text" class="form-control" list="product" name="product[]"
                                            placeholder="Select medicine">
                                        <datalist id="product">
                                            @foreach ($product as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </datalist>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="quantity" placeholder="Quantity"
                                            aria-label="quantity" aria-describedby="basic-addon2" name="quantity[]">
                                    </div>
                                </div>
                                <div clas="col">
                                    <div class="btn btn-danger" type="button" onclick="removeRow('mainRow${i}')"> remove</button>
                                </div>
                            </div>

                `;
                i++;
                $('.add-row').append(addRowHtml);
            });

            removeRow=(id)=>{
                $(`#${id}`).remove();
            }
        });

    </script>

@endsection


