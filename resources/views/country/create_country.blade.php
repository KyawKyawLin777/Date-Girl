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

@section('page-script')
    <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#countryTable').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
        });
    </script>
@endsection

@section('content')
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



    <div class="container">
        <div class="row">
            <div class="col-12">
                {{-- modal start --}}
                {{-- modal button --}}
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    {{ __('messages.create country') }}
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">{{ __('messages.create country') }}</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="{{ url('/countryCreate') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="country_name"
                                                    class="">{{ __('messages.country name') }}</label>
                                                <input type="text" class="form-control" id="country_name"
                                                    name="country_name" placeholder="Enter Country Name" required>
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
                                <div class="modal-footer d-flex justify-content-between">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">{{ __('messages.close') }}</button>
                                    <button type="submit" class="btn btn-primary">{{ __('messages.save') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                {{-- modal end --}}
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
        <div class="col-12 mt-4">
            @if (count($countries) != 0)
                <div class="container d-flex justify-content-center align-items-center mt-5">
                    <div class="card shadow col-md-10">
                        <h5 class="card-header" style="background-color: rgb(219, 219, 219)">
                            {{ __('messages.country table') }}</h5>
                        <div class="card-body">
                            <div class="table-responsive text-nowrap">
                                <table id="countryTable" class="table table-striped ">
                                    <thead>
                                        <tr>
                                            <th>{{ __('messages.no') }}</th>
                                            <th>{{ __('messages.country') }}</th>
                                            <th>{{ __('messages.image') }}</th>
                                            <th>{{ __('messages.actions') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        @foreach ($countries as $key => $country)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $country->country }}</td>
                                                <td>
                                                    <ul
                                                        class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                            data-bs-placement="top" class="avatar avatar-md pull-up"
                                                            title="Lilian Fuller">
                                                            <a href="{{ asset('storage/' . $country->image) }}"
                                                                target="_blank">
                                                                <img src="{{ asset('storage/' . $country->image) }}"
                                                                    alt="Avatar" class="rounded-3">
                                                            </a>
                                                        </li>
                                                    </ul>

                                                </td>
                                                <td>
                                                    <a href="{{ route('country#countryEdit', $country->id) }}"
                                                        class="btn btn-primary"><i
                                                            class="fa-solid fa-pen-to-square"></i></a>
                                                    <a href="{{ route('country#countryDelete', $country->id) }}"
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
                <h3 class="text-secondary text-center mt-5">There is no Country Here.</h3>
            @endif
        </div>
    </div>
@endsection
