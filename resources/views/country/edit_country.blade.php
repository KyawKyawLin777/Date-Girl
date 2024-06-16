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
                        <h3 class="text-center">{{ __('messages.country edit') }}</h3>
                        <form action="{{ route('country#countryUpdate', $country->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="country_name"
                                                class="">{{ __('messages.country name') }}</label>
                                            <input type="text" class="form-control" id="country_name" name="country_name"
                                                placeholder="Enter Country Name" value="{{ $country->country }}" required>
                                        </div>
                                    </div>
                                    <div class="col-12 mt-3">
                                        <div class="form-group">
                                            <label for="country_image"
                                                class="">{{ __('messages.country image') }}</label>
                                            <input type="file" class="form-control" id="country_image"
                                                name="country_image">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer d-flex justify-content-between mt-3">
                                <a href="{{ route('country#countryPage') }}"
                                    class="btn btn-secondary">{{ __('messages.back') }}</a>
                                <button type="submit" class="btn btn-primary">{{ __('messages.save') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>


@endsection
