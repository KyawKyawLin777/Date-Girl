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
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="">{{ __('messages.text edit') }}</h3>
                        <form action="{{ url('text_update', $texts->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{-- @method('PUT') --}}


                            <div class="col-12  mb-2">
                                <div class="form-group">
                                    <label for="text"> {{ __('messages.text') }}
                                        <span class="text-danger">*</span></label>

                                    <textarea name="text" id="text" cols="10" rows="3" class="form-control" required>{{ $texts->text }}</textarea>
                                </div>
                            </div>

                    </div>
                    <div class="modal-footer d-flex justify-content-between mt-3">
                        <a href="{{ url('text') }}" class="btn btn-secondary">{{ __('messages.back') }}</a>
                        <button type="submit" class="btn btn-primary">{{ __('messages.update') }}</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


@endsection
