@extends('layouts.admin.master')
@section('title')
    Product
@endsection

@section('sidebar-add-product')
    active
@endsection


@section('content')

    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">add product</span>
            <h3 class="page-title">Products</h3>
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
                <div class="card-header border-bottom">
                    <h6 class="m-0">Products
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
                                <input id="my-input" class="form-control" type="text" name="name"
                                    placeholder="Product name">
                            </div>
                            <div class="input-group">
                                <input type="text" class="form-control" id="newcountry" placeholder="Product Company"
                                    aria-label="Add new langugae" aria-describedby="basic-addon2" name="company">
                                <div class="input-group-append">
                                    <button class="btn btn-white px-2" type="button" id="countrySubmitButton"
                                        style="width:200px">
                                        <i class="material-icons btn btn-primary" style="width: 100%">add</i>
                                    </button>
                                </div>

                            </div>
                        </form>
                        <small class="text-danger border-danger" id="countryError" hidden>Product can not be null</small>
                    </h6>
                </div>
                <div class="card-body p-0 pb-3 text-center">
                    <table class="table mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th scope="col" class="border-0">#</th>
                                <th scope="col" class="border-0">Name</th>
                                <th scope="col" class="border-0">Company</th>
                                <th scope="col" class="border-0">type</th>
                                <th scope="col" class="border-0"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($product == null)
                               <td> no data found</td>
                            @else
                            @php
                                $count = 1;
                            @endphp
                                @foreach ($product as $item)
                                    <tr>
                                        <td>{{ $count }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->company }} </td>
                                        <td>{{ $item->type }} </td>
                                        <td>

                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-danger" data-toggle="modal"
                                                data-target="#example{{ $item->id }}Modal">
                                                remove
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="example{{ $item->id }}Modal" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered ">
                                                    <div class="modal-content bg-danger ">
                                                        <div class="modal-body  text-white">
                                                            <p>Do you want to delete Product ?</p>
                                                            <div>
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                                <a href="/admin/home/products/delete/{{ $item->id }}">
                                                                    <button class="btn btn-success">Confirm</button>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="/admin/home/products/update/{{ $item->id }}">
                                                <button class="btn btn-success">Update</button>
                                            </a>
                                        </td>
                                    </tr>
                                    @php
                                        $count++;
                                    @endphp
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- End Default Light Table -->

@endsection

@section('footer-script')
    <script>
        document.getElementById('countrySubmitButton').addEventListener("click", function() {
            var newCountry = document.getElementById('newcountry').value;
            if (newCountry == '') {
                document.getElementById('countryError').removeAttribute('hidden')
            } else {
                document.getElementById('countryError').setAttribute('hidden', 'true');
                event.preventDefault();
                document.getElementById('countryForm').submit();
            }
        })

    </script>
@endsection
