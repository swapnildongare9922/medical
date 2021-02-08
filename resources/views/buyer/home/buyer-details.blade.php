@extends('layouts.buyer.master')
@section('title')
    Profile
@endsection

@section('content')
    <div class="container mt-4 mb-4 ">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8 card">
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" id="email" class="form-control" value="{{ $user->email }}" name="email"
                                readonly>
                        </div>
                        <div class="form-group">
                            <label for="email">Name</label>
                            <input type="text" id="name" class="form-control" value="{{ $user->name }}" name="name">
                        </div>
                        @if ($user_details != null)
                            <div class="form-group">
                                <label for="email">Mobile</label>
                                <input type="text" id="mobile" class="form-control" value="{{ $user_details->mobile_no }}"
                                    name="mobile_no">
                            </div>
                            <div class="form-group">
                                <label for="email">GST Number</label>
                                <input type="text" id="email" class="form-control" value="{{ $user_details->gst_no }}"
                                    name="gst_no">
                            </div>
                            <div class="form-group">
                                <label for="area">Area</label>
                                <input type="area" id="email" class="form-control" value=""
                                    name="area" list="areaList">
                                    <datalist id="areaList">
                                        @foreach ($area as $item)
                                            <option value="{{ $item->id }}"> {{ $item->title }} {{ $item->area_code }}</option>
                                        @endforeach
                                    </datalist>
                            </div>
                            <div class="form-group">
                                <label for="email">Address</label>
                                <input type="text" id="email" class="form-control" value="{{ $user_details->address }}"
                                    name="address">
                            </div>
                            <div class="form-group text-center">
                                @if ($user_details->profile_pic == null)
                                    <img class="img-fluid img-thumbnail profile_image" style="cursor:pointer"
                                        src="https://media.sproutsocial.com/uploads/2017/02/10x-featured-social-media-image-size.png"
                                        alt="" width="50%">
                                @else
                                    <img class="img-fluid img-thumbnail profile_image" style="cursor:pointer"
                                        src="{{ $user_details->profile_pic }}" alt="" width="50%">
                                @endif
                                <input type="file" class="form-control profile_pic" value="" name="profile_pic"
                                    accept="image/*" hidden>
                            </div>

                            @else

                            <div class="form-group">
                                <label for="email">Mobile</label>
                                <input type="text" id="mobile" class="form-control" value=""
                                    name="mobile_no">
                            </div>
                            <div class="form-group">
                                <label for="email">GST Number</label>
                                <input type="text" id="email" class="form-control" value=""
                                    name="gst_no">
                            </div>
                            <div class="form-group">
                                <label for="area">Area</label>
                                <input type="area" id="email" class="form-control" value=""
                                    name="area" list="areaList">
                                    <datalist id="areaList">
                                        @foreach ($area as $item)
                                            <option value="{{ $item->id }}"> {{ $item->title }} {{ $item->area_code }}</option>
                                        @endforeach
                                    </datalist>
                            </div>
                            <div class="form-group">
                                <label for="email">Address</label>
                                <input type="text" id="email" class="form-control" value=""
                                    name="address">
                            </div>
                            <div class="form-group text-center">
                                    <img class="img-fluid img-thumbnail profile_image" style="cursor:pointer"
                                        src="https://media.sproutsocial.com/uploads/2017/02/10x-featured-social-media-image-size.png"
                                        alt="" width="50%">

                                <input type="file" class="form-control profile_pic" value="" name="profile_pic"
                                    accept="image/*" hidden>
                            </div>
                        @endif
                        <div class="form-group text-center">
                            <button class="btn btn-info" style="width: 80%">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('.profile_image').click(function() {
                $('.profile_pic').click();
            });
        });

    </script>
@endsection
