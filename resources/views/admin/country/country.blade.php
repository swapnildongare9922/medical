@extends('layouts.admin.master')

@section('sidebar-country')
    active
@endsection

@section('content')

    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">add country</span>
            <h3 class="page-title">Countries</h3>
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
                    <h6 class="m-0">Countries
                       <form action="" id="countryForm" method="POST">
                           @csrf
                           <div class="input-group">
                            <input type="text" class="form-control" id="newcountry" placeholder="New country"
                                aria-label="Add new langugae" aria-describedby="basic-addon2" name="title">
                            <div class="input-group-append">
                                <button class="btn btn-white px-2" type="button" id="countrySubmitButton" style="width:200px">
                                    <i class="material-icons btn btn-primary" style="width: 100%">add</i>
                                </button>
                            </div>

                        </div>
                       </form>
                       <small class="text-danger border-danger" id="countryError" hidden>Category can not be null</small>
                    </h6>
                </div>
                <div class="card-body p-0 pb-3 text-center">
                    <table class="table mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th scope="col" class="border-0">#</th>
                                <th scope="col" class="border-0">Title</th>
                                <th scope="col" class="border-0">Action</th>
                                <th scope="col" class="border-0"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($country  as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>

                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-danger" data-toggle="modal"
                                            data-target="#example{{ $item->id }}Modal">
                                            remove
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="example{{ $item->id }}Modal" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-body text-danger">
                                                        <p>Do you want to delete Country ?</p>
                                                        <div>
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            <a href="/admin/home/country/delete/{{ $item->slug }}">
                                                                <button class="btn btn-danger">Confirm</button>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="/admin/home/country/update/{{ $item->slug }}">
                                            <button class="btn btn-success">Update</button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
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
