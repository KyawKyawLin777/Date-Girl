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
            $('#commissionTable').DataTable({
                dom: 'Bfrtip',
                searching: false,
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
        });
    </script>
@endsection

@section('content')
    <style>
        .roboto-thin {
            font-family: "Roboto", sans-serif;
            font-weight: 100;
            font-style: normal;
        }

        .roboto-light {
            font-family: "Roboto", sans-serif;
            font-weight: 300;
            font-style: normal;
        }

        .roboto-regular {
            font-family: "Roboto", sans-serif;
            font-weight: 400;
            font-style: normal;
        }

        .roboto-medium {
            font-family: "Roboto", sans-serif;
            font-weight: 500;
            font-style: normal;
        }

        .roboto-bold {
            font-family: "Roboto", sans-serif;
            font-weight: 700;
            font-style: normal;
        }

        .roboto-black {
            font-family: "Roboto", sans-serif;
            font-weight: 900;
            font-style: normal;
        }

        .roboto-thin-italic {
            font-family: "Roboto", sans-serif;
            font-weight: 100;
            font-style: italic;
        }

        .roboto-light-italic {
            font-family: "Roboto", sans-serif;
            font-weight: 300;
            font-style: italic;
        }

        .roboto-regular-italic {
            font-family: "Roboto", sans-serif;
            font-weight: 400;
            font-style: italic;
        }

        .roboto-medium-italic {
            font-family: "Roboto", sans-serif;
            font-weight: 500;
            font-style: italic;
        }

        .roboto-bold-italic {
            font-family: "Roboto", sans-serif;
            font-weight: 700;
            font-style: italic;
        }

        .roboto-black-italic {
            font-family: "Roboto", sans-serif;
            font-weight: 900;
            font-style: italic;
        }


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
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session('delete'))
            <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                <strong>{{ session('delete') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="row">
            <div class="col-12 mt-3 mb-3">
                <form action="{{ url('girl_history_search', $girl->id) }}" method="GET">
                    <div class="row">
                        <div class="col-6 col-md-4 mt-2">
                            <input class="form-control text-dark" type="date" name="start_date" placeholder="Start Date"
                                value="{{ request('start_date') }}">
                        </div>
                        <div class="col-6 col-md-4 mt-2">
                            <input class="form-control text-dark" type="date" name="end_date" placeholder="End Date"
                                value="{{ request('end_date') }}">
                        </div>
                    </div>
                    <div>
                        <button class="mt-2 btn btn-primary" type="submit"><i
                                class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                </form>


            </div>
        </div>
        <div class="col-12 mt-4">



            <div class="container d-flex justify-content-center align-items-center mt-5">
                <div class="card shadow col-12">
                    <h5 class="card-header" style="background-color: rgb(219, 219, 219)">
                        {{ __('messages.girl history') }}</h5>

                    <div class="card-body">

                        <div class="table-responsive text-nowrap">
                            <table id="commissionTable" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>{{ __('messages.no') }}</th>
                                        <th>{{ __('messages.customer name') }}</th>
                                        <th>{{ __('messages.phone number') }}</th>
                                        <th>{{ __('messages.girl name') }}</th>
                                        <th>{{ __('messages.country') }}</th>
                                        <th style="width: 10%">{{ __('messages.time') }}</th>
                                        <th style="width: 10%">{{ __('messages.price') }}</th>
                                        <th>{{ __('messages.state') }}</th>

                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">

                                    @foreach ($history as $key => $order_list)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $order_list->customer_name }}</td>
                                            <td>{{ $order_list->phone_number }}</td>
                                            <td>{{ $order_list->girl_name }}</td>
                                            <td>{{ $order_list->country }}</td>
                                            <td>{{ $order_list->time }} </td>
                                            <td>{{ $order_list->price }} THB</td>
                                            <td>{{ $order_list->state }}</td>

                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script>
        function reloadAndClear() {
            // Clear the input values
            document.querySelector('input[name="search"]').value = '';
            document.querySelector('input[name="start_date"]').value = '';
            document.querySelector('input[name="end_date"]').value = '';
        }
    </script>
@endsection
