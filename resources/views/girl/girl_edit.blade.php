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
                        <h3 class="text-center">{{ __('messages.girl edit') }}</h3>
                        <form action="{{ route('girl#girlUpdate', $girl->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            {{-- @method('PUT') --}}
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-12 d-flex justify-content-center mb-2">
                                        <div class="form-group">
                                            <img src="{{ asset('storage/' . $girl->profile_photo) }}"
                                                class="img-thumbnail shadow-sm mx-auto rounded"
                                                style="width: 150px;height:150px;">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="profile_photo">{{ __('messages.profile image') }}</label>
                                            <input type="file" class="form-control" id="profile_photo"
                                                name="profile_photo">
                                        </div>
                                        <span class="text-danger">Old : {{ $girl->profile_photo }}</span>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="name">{{ __('messages.name') }}</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                placeholder="Enter Name" value="{{ $girl->name }}" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mt-3">
                                        <div class="form-group">
                                            <label for="age">{{ __('messages.age') }}</label>
                                            <input type="text" class="form-control" id="age" name="age"
                                                placeholder="Enter Age" value="{{ $girl->age }}" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mt-3">
                                        <div class="form-group">
                                            <label for="height">{{ __('messages.height') }}</label>
                                            <input type="text" class="form-control" id="height" name="height"
                                                placeholder="Enter Height" value="{{ $girl->height }}" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mt-3">
                                        <div class="form-group">
                                            <label for="type">{{ __('messages.type') }}</label>
                                            {{-- <input type="text" class="form-control" id="type" name="type"
                                                value="{{ $girl->type }}" placeholder="e.g. Slim, LCD, Fat..."> --}}
                                            <textarea name="type" id="type" cols="10" rows="3" placeholder="eg. Slim, LCD, Fat..."
                                                class="form-control">{{ $girl->type }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mt-3">
                                        <div class="form-group">
                                            <label for="girl_commission">{{ __('messages.commission') }}</label>
                                            <input type="number" class="form-control" id="girl_commission"
                                                name="girl_commission" value="{{ $girl->girl_commission }}"
                                                placeholder="Enter Girl Commission">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mt-3">
                                        <div class="form-group">
                                            <label for="description_photo_one">{{ __('messages.desc 1') }}</label>
                                            <input type="file" class="form-control" id="description_photo_one"
                                                name="description_photo_one">
                                        </div>
                                        <span class="text-danger">Old : {{ $girl->description_photo_one }}</span>

                                    </div>
                                    <div class="col-12 col-md-6 mt-3">
                                        <div class="form-group">
                                            <label for="description_photo_two">{{ __('messages.desc 2') }}</label>
                                            <input type="file" class="form-control" id="description_photo_two"
                                                name="description_photo_two">
                                        </div>
                                        <span class="text-danger">Old : {{ $girl->description_photo_two }}</span>

                                    </div>
                                    <div class="col-12 col-md-6 mt-3">
                                        <div class="form-group">
                                            <label for="description_photo_three">{{ __('messages.desc 3') }}</label>
                                            <input type="file" class="form-control" id="description_photo_three"
                                                name="description_photo_three">
                                        </div>
                                        <span class="text-danger">Old : {{ $girl->description_photo_three }}</span>

                                    </div>
                                    <div class="col-12 col-md-6 mt-3">
                                        <div class="form-group">
                                            <label for="description_photo_four">{{ __('messages.desc 4') }}</label>
                                            <input type="file" class="form-control" id="description_photo_four"
                                                name="description_photo_four">
                                        </div>
                                        <span class="text-danger">Old : {{ $girl->description_photo_four }}</span>

                                    </div>
                                    <div class="col-12 col-md-6 mt-3">
                                        <div class="form-group">
                                            <label for="description">{{ __('messages.desc') }}</label>
                                            <textarea name="description" id="description" class="form-control" placeholder="Enter Description">{{ $girl->description }}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 mt-3">
                                        <div class="form-group">
                                            <label for="get_service">{{ __('messages.get service') }}</label>
                                            {{-- <input type="text" class="form-control" id="get_service"
                                                name="get_service" value="{{ $girl->get_service }}"
                                                placeholder="Enter Get Service"> --}}
                                            <textarea class="form-control" name="get_service" id="" cols="10" rows="2"
                                                placeholder="Enter Get Service">{{ $girl->get_service }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mt-3">
                                        <div class="form-group">
                                            <label for="video">{{ __('messages.video') }}</label>
                                            <input type="file" class="form-control" id="video" name="video">
                                        </div>
                                        <span class="text-danger">Old: {{ basename($girl->video) }}</span>


                                    </div>
                                    <div class="col-12 col-md-6 mt-3">
                                        <div class="form-group">
                                            <label for="country">{{ __('messages.country') }}</label>
                                            <select class="form-control" name="country" id="country" required>

                                                @foreach ($countries as $country)
                                                    <option value="{{ $country->id }}"
                                                        @if ($girl->country == $country->id) selected @endif>
                                                        {{ $country->country }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <h5>{{ __('messages.variant price') }}</h5>
                                        <div class="row mt-2 table-responsive">
                                            <table id="price_table" class="table table-bordered">
                                                <thead>
                                                    <tr class="item_header bg-gradient-directional-blue white">
                                                        <th class="text-center" style="width: 10%;">
                                                            {{ __('messages.no') }}</th>
                                                        <th class="text-center" style="width: 20%;">
                                                            {{ __('messages.time') }}</th>

                                                        <th class="text-center" style="width: 20%;">
                                                            {{ __('messages.price') }}</th>
                                                        <th class="text-center" style="width: 20%;">
                                                            {{ __('messages.actions') }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($time_price as $key => $price)
                                                        <tr>
                                                            <td class="text-center">
                                                                <input type='text' name='no[]'
                                                                    value="{{ $key + 1 }}"
                                                                    class="form-control text-center" readonly>
                                                            </td>
                                                            <td class="text-center">
                                                                <input type='text' name='time[]'
                                                                    value="{{ $price->time }}"
                                                                    class="form-control time-picker" required>
                                                            </td>

                                                            <td class="text-center">
                                                                <input type='number' name='price[]'
                                                                    value="{{ $price->price }}" class="form-control"
                                                                    required>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <div class="d-md-flex justify-content-end mt-4">
                                                <button type="button" id="add_row"
                                                    class="btn btn-success px-4">{{ __('messages.add') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer d-flex justify-content-between mt-3">
                                <a href="{{ route('girl#girlPage') }}"
                                    class="btn btn-secondary">{{ __('messages.back') }}</a>
                                <button type="submit" class="btn btn-primary">{{ __('messages.update') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            var rowCount = 1;
            let id_no = 2;
            var rowCount = $('#price_table tbody tr').length + 1;
            $('#add_row').click(function() {
                var html = '<tr>' +
                    '<td class="text-center"><input type="text" name="no[]" value="' + rowCount +
                    '" class="form-control text-center" readonly></td>' +
                    '<td class="text-center"><input type="text" name="time[]" class="form-control time-picker" required></td>' +
                    '<td class="text-center"><input type="number" name="price[]" class="form-control" required></td>' +
                    '<td class="text-center"><button type="button" class="btn btn-danger remove_row">Remove</button></td>' +
                    '</tr>';
                $('#price_table tbody').append(html);
                rowCount++;
                id_no++;
            });

            $(document).on('click', '.remove_row', function() {
                $(this).closest('tr').remove();
                rowCount--;
            });
        });
    </script>


@endsection
