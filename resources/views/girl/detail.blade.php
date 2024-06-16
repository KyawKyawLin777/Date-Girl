@extends('layouts/contentNavbarLayout')

@section('title', 'Dashboard - Analytics')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}">
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>
@endsection

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="text-center">{{ __('messages.girl detail') }}</h3>
                        <div class="modal-body">
                            <div class="ms-5 mt-5">
                                <a href="{{ route('girl#girlPage') }}"><i
                                        class="fa-solid fa-circle-arrow-left text-dark fs-xlarge"></i></a>
                            </div>
                            <div class="row">
                                <div class="col-12 d-flex justify-content-center mb-2">
                                    <div class="form-group">


                                        <a href="{{ asset('storage/' . $girl->profile_photo) }}" target="_blank">
                                            <img src="{{ asset('storage/' . $girl->profile_photo) }}"
                                                class="img-thumbnail shadow-sm mx-auto rounded"
                                                style="width: 150px;height:150px;">
                                        </a>

                                    </div>
                                </div>
                                <div class="col-12 col-md-6 mt-3">
                                    <div class="form-group">
                                        <label for="name">{{ __('messages.name') }}</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Enter Name" value="{{ $girl->name }}" readonly>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 mt-3">
                                    <div class="form-group">
                                        <label for="age">{{ __('messages.age') }}</label>
                                        <input type="text" class="form-control" id="age" name="age"
                                            placeholder="Enter Age" value="{{ $girl->age }}" readonly>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 mt-3">
                                    <div class="form-group">
                                        <label for="height">{{ __('messages.height') }}</label>
                                        <input type="text" class="form-control" id="height" name="height"
                                            placeholder="Enter Height" value="{{ $girl->height }}" readonly>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 mt-3">
                                    <div class="form-group">
                                        <label for="type">{{ __('messages.type') }}</label>
                                        <input type="text" class="form-control" id="type" name="type"
                                            value="{{ $girl->type }}" placeholder="e.g. Slim, LCD, Fat..." readonly>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 mt-3">
                                    <div class="form-group">
                                        <label for="description">{{ __('messages.desc') }}</label>
                                        <textarea name="description" id="description" class="form-control" placeholder="Enter Description" readonly>{{ $girl->description }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 mt-3">
                                    <div class="form-group">
                                        <label for="get_service">{{ __('messages.get service') }}</label>
                                        {{-- <input type="text" class="form-control" id="get_service" name="get_service"
                                            value="{{ $girl->get_service }}" placeholder="Enter Get Service" readonly> --}}
                                        <textarea name="" class="form-control" id="" cols="10" rows="2" readonly>{{ $girl->get_service }}</textarea>

                                    </div>
                                </div>


                                <div class="col-12 col-md-6 mt-3">
                                    <div class="form-group">
                                        <label for="country">{{ __('messages.time') }}</label>
                                        {{-- @foreach (json_decode($girl->price, true) as $index => $price) --}}
                                        @foreach ($girl->time_prices as $time_price)
                                            <input type="text" class="form-control mt-2" id="get_service"
                                                name="get_service" value="{{ $time_price->time }} "
                                                placeholder="Enter Get Service" readonly>
                                        @endforeach

                                        {{-- @endforeach --}}
                                    </div>
                                </div>


                                <div class="col-12 col-md-6 mt-3">
                                    <div class="form-group">
                                        <label for="country">{{ __('messages.price') }}</label>
                                        {{-- @foreach (json_decode($girl->price, true) as $index => $price) --}}
                                        @foreach ($girl->time_prices as $time_price)
                                            <input type="text" class="form-control mt-2" id="get_service"
                                                name="get_service" value="{{ $time_price->price }} THB"
                                                placeholder="Enter Get Service" readonly>
                                        @endforeach

                                        {{-- @endforeach --}}
                                    </div>
                                </div>

                                <div class="col-12 col-md-6 mt-3">
                                    <div class="form-group">
                                        <label for="country">{{ __('messages.country') }}</label>
                                        @php
                                            $serviceValue = '';
                                            foreach ($categorys as $category) {
                                                if ($category->id == $girl->country) {
                                                    $serviceValue = $category->country;
                                                    break;
                                                }
                                            }
                                        @endphp
                                        <input type="text" class="form-control" id="get_service" name="get_service"
                                            value="{{ $serviceValue }}" placeholder="Enter Get Service" readonly>
                                    </div>
                                </div>

                                <div class="col-12 col-md-6 mt-3">
                                    <div class="form-group">
                                        <label for="country">{{ __('messages.commission') }}</label>

                                        <input type="text" class="form-control" id="get_service" name="get_service"
                                            value="{{ $girl->girl_commission }}" placeholder="Enter Get Service"
                                            readonly>
                                    </div>
                                </div>


                                <div class="col-6 col-md-3 mt-3">
                                    <div class="form-group">
                                        <a href="{{ asset('storage/' . $girl->description_photo_one) }}" target="_blank">
                                            <img src="{{ asset('storage/' . $girl->description_photo_one) }}"
                                                class="img-thumbnail shadow-sm mx-auto rounded"
                                                style="width: 150px;height:150px;">
                                        </a>


                                    </div>
                                </div>
                                <div class="col-6 col-md-3 mt-3">
                                    <div class="form-group">

                                        <a href="{{ asset('storage/' . $girl->description_photo_two) }}" target="_blank">
                                            <img src="{{ asset('storage/' . $girl->description_photo_two) }}"
                                                class="img-thumbnail shadow-sm mx-auto rounded"
                                                style="width: 150px;height:150px;">
                                        </a>

                                    </div>

                                </div>
                                <div class="col-6 col-md-3 mt-3">
                                    <div class="form-group">

                                        <a href="{{ asset('storage/' . $girl->description_photo_three) }}"
                                            target="_blank">
                                            <img src="{{ asset('storage/' . $girl->description_photo_three) }}"
                                                class="img-thumbnail shadow-sm mx-auto rounded"
                                                style="width: 150px;height:150px;">
                                        </a>

                                    </div>

                                </div>
                                <div class="col-6 col-md-3 mt-3">
                                    <div class="form-group">

                                        <a href="{{ asset('storage/' . $girl->description_photo_four) }}"
                                            target="_blank">
                                            <img src="{{ asset('storage/' . $girl->description_photo_four) }}"
                                                class="img-thumbnail shadow-sm mx-auto rounded"
                                                style="width: 150px;height:150px;">
                                        </a>


                                    </div>
                                </div>


                                <div class="col-12 col-md-12 mt-3 d-flex justify-content-center mt-5">
                                    <video width="500" height="300" controls>
                                        <source src="{{ asset('storage/' . $girl->video) }}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>

                                </div>
                                {{-- {{ dd($girl->video) }} --}}


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
