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
                <div class="card shadow col-md-11">
                    <h5 class="card-header" style="background-color: rgb(219, 219, 219)">Girl ON/OFF</h5>
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
                                        <th>{{ __('messages.time') }}</th>
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

                                                @if ($girl->status == 'off')
                                                    <form action="{{ route('girlon', $girl->id) }}" method="POST">
                                                        @method('PUT')
                                                        @csrf
                                                        <button class="btn" type="submit"><i
                                                                class="fa-solid fa-2x fa-toggle-on"></i></button>
                                                    </form>
                                                @else
                                                    <form action="{{ route('girloff', $girl->id) }}" method="POST">
                                                        @method('PUT')
                                                        @csrf
                                                        <button class="btn" type="submit"><i
                                                                class="fa-solid fa-2x fa-toggle-off"></i></button>
                                                    </form>
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
            $('#add_row').click(function() {
                var html = '<tr>' +
                    '<td class="text-center"><input type="text" name="no[]" value="' + id_no +
                    '" class="form-control text-center" readonly></td>' +

                    '<td class="text-center"><input type="text" name="price[]" class="form-control" required></td>' +
                    '<td class="text-center"><button type="button" class="btn btn-danger remove_row">Remove</button></td>' +
                    '</tr>';
                $('#price_table tbody').append(html);
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
