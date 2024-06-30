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
        <div class="col-12 mt-4">



            <div class="row">
                <div class="col-12 mt-3 mb-3">
                    <form action="{{ url('girl_search') }}" method="GET">
                        <div class="row">
                            <div class="col-12 col-md-4 mt-2">
                                <input class="form-control" type="text" name="search" placeholder="Search by name"
                                    value="{{ request('search') }}">
                            </div>
                        </div>
                        <div>
                            <button class="mt-2 btn btn-primary" type="submit"><i
                                    class="fa-solid fa-magnifying-glass"></i></button>
                            <button type="button" class="mt-2 btn btn-primary" onclick="reloadAndClear()">
                                {{ __('messages.search clear') }}</button>
                        </div>

                    </form>
                    <form class="mt-3" action="{{ url('commission_search') }}" method="GET">
                        <div class="row">
                            <div class="col-6 col-md-4 mt-2">
                                <input class="form-control text-dark" type="date" name="start_date"
                                    placeholder="Start Date" value="{{ request('start_date') }}">
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
            <div class="container d-flex justify-content-center align-items-center mt-5">
                <div class="card shadow col-12">
                    <h5 class="card-header" style="background-color: rgb(219, 219, 219)">
                        {{ __('messages.girl commission report') }}</h5>

                    <div class="card-body">

                        <div class="table-responsive text-nowrap">
                            <table id="commissionTable" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">{{ __('messages.no') }}</th>

                                        <th class="text-center">{{ __('messages.girl name') }}</th>
                                        <th class="text-center">{{ __('messages.total hour') }}</th>
                                        <th class="text-center">{{ __('messages.total amount') }}
                                        </th>
                                        <th class="text-center">{{ __('messages.commission') }}</th>
                                        <th class="text-center">{{ __('messages.total amount commission') }}</th>
                                        <th>{{ __('messages.actions') }}</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    @php
                                        $totalCommissionPrice = 0;
                                    @endphp
                                    @foreach ($reports as $key => $report)
                                        @php
                                            $totalCommissionPrice +=
                                                ($report->girl_commission / 100) * $total_price[$report->id];
                                        @endphp
                                        <tr>
                                            <td class="text-center">{{ $key + 1 }}</td>
                                            <td class="text-center">{{ $report->name }}</td>
                                            {{-- @if ($report->time == 'Night' || 'night')
                                                    <td class="text-center">{{ $report->time }}
                                                @endif hours</td> --}}
                                            {{-- {{ $report->time ?? 'Night' }} --}}

                                            <td class="text-center">{{ $total_time[$report->id] }} hours</td>
                                            <td class="text-center">{{ $total_price[$report->id] ?? 0 }} THB</td>
                                            <td class="text-center">{{ $report->girl_commission }} %</td>
                                            <td class="text-center">
                                                {{ ($report->girl_commission / 100) * $total_price[$report->id] }}
                                                THB</td>
                                            <td><a href="{{ url('girl_history', $report->id) }}" class="btn btn-info">
                                                    {{ __('messages.girl history') }}</a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        @if (empty($startDate) && empty($endDate) && empty($search))
                                            <td colspan="2"></td>
                                            <td class="text-center">{{ __('messages.total') }}</td>
                                            <td class="text-center">{{ $totalPrice }} THB</td>
                                            <td class="text-center">{{ $totalCommission }} %</td>
                                            <td class="text-center">{{ $totalCommissionPrice }} THB</td>
                                            <td colspan="1"></td>
                                        @else
                                            <td colspan="2"></td>
                                            <td class="text-center"></td>
                                            <td class="text-center"></td>
                                            <td class="text-center"></td>
                                            <td class="text-center"></td>
                                            <td colspan="1"></td>
                                        @endif
                                    </tr>
                                </tfoot>
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
