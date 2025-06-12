@extends('layouts.master')

@section('top')
    <link rel="stylesheet" href="{{ asset('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('content')
<div class="box box-info">
    <div class="box-header">
        <h3 class="box-title">Current Product Stocks</h3>
    </div>
    <div class="box-body">
        <table id="products-table" class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Item</th>
                    <th>Total In</th>
                    <th>Total Out</th>
                    <th>Current Stock</th>
                    <th>Stock Alert</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>
@endsection

@section('bot')
<script src="{{ asset('assets/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>

<script>
    $(function() {
        $('#products-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('api.products') }}",  // Make sure you create this route & controller method
            columns: [
                { data: 'id', name: 'id' },
                { data: 'item', name: 'item' },
                { data: 'total_in', name: 'total_in' },
                { data: 'total_out', name: 'total_out' },
                { data: 'current_stock', name: 'current_stock' },
                { data: 'stock_alert', name: 'stock_alert' }
            ]
        });
    });
</script>
@endsection
