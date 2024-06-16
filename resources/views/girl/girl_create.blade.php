@extends('layouts/contentNavbarLayout')

@section('title', 'Dashboard - Analytics')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
@endsection
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
@section('page-script')
    <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#girtTable').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
        });
    </script>
@endsection
<style>
    body {
        font-family: 'Roboto', sans-serif !important;

    }

    .dataTables_filter input {
        margin-bottom: 10%;
        margin-top: 10%;
        border: 1px solid #ccc;
        border-radius: 4px;
    }
</style>

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    {{ __('messages.create girl') }}
                </button>

                <!-- Modal -->
                <div class="modal fade modal-lg" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel"> {{ __('messages.create girl') }}
                                </h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>


                            <form action="{{ url('/girlCreate') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label for="name"> {{ __('messages.name') }}
                                                    <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="name" name="name"
                                                    placeholder="Enter Name" required>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label for="profile_photo">{{ __('messages.profile image') }}<span
                                                        class="text-danger">*</span></label>
                                                <input type="file" class="form-control" id="profile_photo"
                                                    name="profile_photo" required>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 mt-3">
                                            <div class="form-group">
                                                <label for="age">{{ __('messages.age') }} <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="age" name="age"
                                                    placeholder="Enter Girl Age" required>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 mt-3">
                                            <div class="form-group">
                                                <label for="height">{{ __('messages.height') }} <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="height" name="height"
                                                    placeholder="Enter Girl Height" required>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 mt-3">
                                            <div class="form-group">
                                                <label for="type">{{ __('messages.type') }} <span
                                                        class="text-danger">*</span></label>
                                                {{-- <input type="text" class="form-control" id="type" name="type"
                                                    placeholder="eg. Slim, LCD, Fat..."> --}}
                                                <textarea name="type" id="type" cols="10" rows="3" placeholder="eg. Slim, LCD, Fat..."
                                                    class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 mt-3">
                                            <div class="form-group">
                                                <label for="girl_commission">{{ __('messages.commission') }} </label>
                                                <input type="number" class="form-control" id="girl_commission"
                                                    name="girl_commission" placeholder="Enter Girl Commission">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 mt-3">
                                            <div class="form-group">
                                                <label for="description_photo">{{ __('messages.desc 1') }}</label>
                                                <input type="file" class="form-control" id="description_photo"
                                                    name="description_photo_one">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 mt-3">
                                            <div class="form-group">
                                                <label for="description_photo">{{ __('messages.desc 2') }}</label>
                                                <input type="file" class="form-control" id="description_photo"
                                                    name="description_photo_two">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 mt-3">
                                            <div class="form-group">
                                                <label for="description_photo">{{ __('messages.desc 3') }}</label>
                                                <input type="file" class="form-control" id="description_photo"
                                                    name="description_photo_three">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 mt-3">
                                            <div class="form-group">
                                                <label for="description_photo">{{ __('messages.desc 4') }}</label>
                                                <input type="file" class="form-control" id="description_photo"
                                                    name="description_photo_four">
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-6 mt-3">
                                            <div class="form-group">
                                                <label for="description">{{ __('messages.desc') }}</label>
                                                <textarea name="description" id="description" class="form-control" placeholder="Enter Girl Description"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 mt-3">
                                            <div class="form-group">
                                                <label for="get_service">{{ __('messages.get service') }}</label>
                                                {{-- <input type="text" class="form-control" id="get_service"
                                                    name="get_service" placeholder="Enter Get Service"> --}}
                                                <textarea name="get_service" id="get_service" class="form-control" cols="10" rows="2"
                                                    placeholder="Enter Get Service"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 mt-3">
                                            <div class="form-group">
                                                <label for="video">{{ __('messages.video') }}</label>
                                                <input type="file" class="form-control" id="video"
                                                    name="video">
                                            </div>

                                        </div>
                                        <div class="col-12 col-md-6 mt-3">
                                            <div class="form-group">
                                                <label for="country">{{ __('messages.country') }} <span
                                                        class="text-danger">*</span></label>
                                                <select class="form-control" name="country" id="country" required>
                                                    <option disabled>Select Country</option>
                                                    @foreach ($countries as $country)
                                                        <option value="{{ $country->id }}">{{ $country->country }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mt-3">
                                            <h5>{{ __('messages.variant price') }}</h5>
                                            <div class="table-responsive">
                                                <table id="price_table" class="table table-bordered">
                                                    <thead>
                                                        <tr class="item_header bg-gradient-directional-blue white">
                                                            <th class="text-center" style="width: 10%;">
                                                                {{ __('messages.no') }}</th>
                                                            <th class="text-center" style="width: 20%;">
                                                                {{ __('messages.time') }}<span
                                                                    class="text-danger">*</span></th>
                                                            {{-- <th class="text-center" style="width: 20%;">
                                                                {{ __('messages.day/night') }}<span
                                                                    class="text-danger">*</span></th> --}}
                                                            <th class="text-center" style="width: 20%;">
                                                                {{ __('messages.price') }}<span
                                                                    class="text-danger">*</span></th>
                                                            <th class="text-center" style="width: 20%;">
                                                                {{ __('messages.actions') }}</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="text-center">
                                                                <input type='text' name='no[]' value="1"
                                                                    class="form-control text-center" readonly>
                                                            </td>
                                                            <td class="text-center">
                                                                <input type='text' name='time[]'
                                                                    class="form-control time-picker" required>
                                                            </td>
                                                            {{-- <td class="text-center">
                                                                <input type='text' name='day_night[]'
                                                                    class="form-control time-picker" required>
                                                            </td> --}}
                                                            <td class="text-center">
                                                                <input type='number' name='price[]' class="form-control"
                                                                    required>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <div class="d-md-flex justify-content-end">
                                                    <button type="button" id="add_row" class="btn btn-success px-4">
                                                        {{ __('messages.add') }}</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer d-flex justify-content-between">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                        {{ __('messages.close') }}</button>
                                    <button type="submit" class="btn btn-primary"> {{ __('messages.save') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session('update'))
            <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                <strong>{{ session('update') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session('delete'))
            <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                <strong>{{ session('delete') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>

    <div class="col-12 mt-4">

        @if (count($girls) != 0)
            <div class="container d-flex justify-content-center align-items-center mt-5">
                <div class="card shadow col-md-12">
                    <h5 class="card-header" style="background-color: rgb(219, 219, 219)">{{ __('messages.girls table') }}
                    </h5>
                    <div class="card-body">
                        <div class="table-responsive text-nowrap">
                            <table id="girtTable" class="table table-striped ">
                                <thead>
                                    <tr>
                                        <th>{{ __('messages.no') }}</th>
                                        <th>{{ __('messages.profile') }}</th>
                                        <th>{{ __('messages.name') }}</th>
                                        <th>{{ __('messages.age') }}</th>
                                        <th>{{ __('messages.height') }}</th>
                                        <th>{{ __('messages.type') }}</th>
                                        <th style="width: 10%">{{ __('messages.time') }}</th>
                                        <th style="width: 10%">{{ __('messages.price') }}</th>
                                        <th>{{ __('messages.country') }}</th>
                                        <th>{{ __('messages.actions') }}</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    @foreach ($girls as $key => $girl)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>
                                                <ul
                                                    class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                        data-bs-placement="top" class="avatar avatar-md pull-up"
                                                        title="Lilian Fuller">
                                                        <a href="{{ asset('storage/' . $girl->profile_photo) }}"
                                                            target="_blank">
                                                            <img src="{{ asset('storage/' . $girl->profile_photo) }}"
                                                                alt="Avatar" class="rounded-3">
                                                        </a>
                                                    </li>
                                                </ul>
                                            </td>
                                            <td>{{ $girl->name }}</td>
                                            <td>{{ $girl->age }}</td>
                                            <td>{{ $girl->height }}</td>
                                            <td>{{ $girl->type }}</td>
                                            <td>
                                                @foreach ($girl->time_prices as $time_price)
                                                    {{ $time_price->time }} <br>
                                                @endforeach
                                            </td>
                                            <td>
                                                @foreach ($girl->time_prices as $time_price)
                                                    {{ $time_price->price }} THB<br>
                                                @endforeach
                                            </td>
                                            <td>{{ $girl->category->country ?? 'N/A' }}</td>
                                            <td>
                                                <a href="{{ route('girl#girlDetail', $girl->id) }}"
                                                    class="btn btn-primary"><i class="fa-solid fa-circle-info"></i></a>
                                                <a href="{{ route('girl#girlEdit', $girl->id) }}"
                                                    class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                                                <a href="{{ route('girl#girlDelete', $girl->id) }}"
                                                    class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <!-- Repeat similar rows for other projects -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <h3 class="text-secondary text-center mt-5">There is no Girl Here.</h3>
        @endif
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#girlTable').DataTable({
                "paging": true,
                "searching": true,
                "ordering": true,
                "lengthChange": false,
                "pageLength": 20,
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            var rowCount = 1;
            let id_no = 2;

            function initializeFlatpickr() {
                $('input[class^="time_picker"]').each(function() {
                    flatpickr(this, {
                        enableTime: true,
                        noCalendar: true,
                        dateFormat: "H:i",
                        time_24hr: true
                    });
                });
            }

            // Initialize Flatpickr on all existing time_picker elements
            initializeFlatpickr();

            $('#add_row').click(function() {
                var html = '<tr>' +
                    '<td class="text-center"><input type="text" name="no[]" value="' + id_no +
                    '" class="form-control text-center" readonly></td>' +
                    '<td class="text-center"><input type="text" name="time[]" class="form-control time-picker" required></td>' +
                    // '<td class="text-center"><input type="text" name="day_night[]" class="form-control time-picker" required></td>' +
                    '<td class="text-center"><input type="number" name="price[]" class="form-control" required></td>' +
                    '<td class="text-center"><button type="button" class="btn btn-danger remove_row">Remove</button></td>' +
                    '</tr>';
                $('#price_table tbody').append(html);

                initializeFlatpickr();

                rowCount++;
                id_no++;
            });

            $(document).on('click', '.remove_row', function() {
                $(this).closest('tr').remove();
                id_no--;
            });
        });
    </script>



@endsection
