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
        <div class="col-12 mt-4">
            @if (count($order_lists) != 0)
                <div class="container d-flex justify-content-center align-items-center mt-5">
                    <div class="card shadow col-12">
                        <h5 class="card-header" style="background-color: rgb(219, 219, 219)">
                            {{ __('messages.order table') }}</h5>
                        <div class="card-body">
                            <div class="table-responsive text-nowrap">
                                <table id="countryTable" class="table table-striped ">
                                    <thead>
                                        <tr>
                                            <th>{{ __('messages.no') }}</th>
                                            <th>{{ __('messages.customer name') }}</th>
                                            <th>{{ __('messages.phone number') }}</th>
                                            <th>{{ __('messages.girl name') }}</th>
                                            <th>{{ __('messages.country') }}</th>
                                            <th>{{ __('messages.time') }}</th>
                                            <th style="width: 10%">{{ __('messages.price') }}</th>
                                            <th>{{ __('messages.state') }}</th>
                                            <th class="text-center">{{ __('messages.actions') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        @foreach ($order_lists as $key => $order_list)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $order_list->customer_name }}</td>
                                                <td>{{ $order_list->phone_number }}</td>
                                                <td>{{ $order_list->girl_name }}</td>
                                                <td>{{ $order_list->country }}</td>
                                                <td>{{ $order_list->time }} </td>
                                                <td>{{ $order_list->price }} THB</td>
                                                <td>{{ $order_list->state }}</td>
                                                <td>

                                                    @if ($order_list->state != 'Accept')
                                                        <form action="{{ route('report#stateChange', $order_list->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            <button class="btn btn-success"
                                                                type="submit">{{ __('messages.accept') }}</button>
                                                        </form>
                                                        <a href="{{ route('order#orderReject', $order_list->id) }}"
                                                            type='button'
                                                            class="btn btn-danger">{{ __('messages.reject') }}</a>
                                                    @endif
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
                <h3 class="text-secondary text-center mt-5">There is no Order Here.</h3>
            @endif
        </div>
    </div>
@endsection
