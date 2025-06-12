@extends('layouts.master')

@section('top')
    <link rel="stylesheet" href="{{ asset('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('content')
    <div class="box box-danger">
        <div class="box-header">
            <h3 class="box-title">Products Out Records</h3>
        </div>

        <div class="box-header">
            <a onclick="addForm()" class="btn btn-warning"><i class="fa fa-plus"></i> Add Product Out</a>
            <a href="{{ route('exportPDF.productKeluarAll') }}" class="btn btn-danger">
                <i class="fa fa-file-pdf-o"></i> Export PDF
            </a>
            <a href="{{ route('exportExcel.productKeluarAll') }}" class="btn btn-primary">
                <i class="fa fa-file-excel-o"></i> Export Excel
            </a>
        </div>

        <div class="box-body">
            <table id="products-out-table" class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Date</th>
                        <th>Item</th>
                        <th>Quantity</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>

    @include('product_keluar.form') {{-- Make sure this form view exists --}}
@endsection

@section('bot')
    <script src="{{ asset('assets/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/validator/validator.min.js') }}"></script>

    <script>
        var table = $('#products-out-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('api.productsOut') }}",
            columns: [
                { data: 'id', name: 'id' },
                { data: 'date', name: 'date' },
                { data: 'item', name: 'item' },
                { data: 'quantity', name: 'quantity' },
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ]
        });

        function addForm() {
            save_method = 'add';
            $('#form-item')[0].reset();
            $('input[name=_method]').val('POST');
            $('#modal-form').modal('show');
            $('.modal-title').text('Add Product Out Record');
        }

        function editForm(id) {
            save_method = 'edit';
            $('input[name=_method]').val('PATCH');
            $('#form-item')[0].reset();
            
            $.ajax({
                url: "{{ url('productsOut') }}/" + id + "/edit",
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    $('#modal-form').modal('show');
                    $('.modal-title').text('Edit Product Out Record');
                    
                    $('#id').val(data.id);
                    $('#date').val(data.date);
                    $('#item').val(data.item);
                    $('#quantity').val(data.quantity);
                },
                error: function() {
                    alert("Data not found");
                }
            });
        }

        function deleteData(id) {
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            if (confirm('Are you sure?')) {
                $.ajax({
                    url: "{{ url('productsOut') }}/" + id,
                    type: "POST",
                    data: {'_method': 'DELETE', '_token': csrf_token},
                    success: function() {
                        table.ajax.reload();
                        alert('Record deleted successfully');
                    },
                    error: function() {
                        alert('Error deleting record');
                    }
                });
            }
        }

        $(function() {
            $('#modal-form form').validator().on('submit', function(e) {
                if (!e.isDefaultPrevented()) {
                    var id = $('#id').val();
                    var url = save_method == 'add' 
                        ? "{{ url('productsOut') }}" 
                        : "{{ url('productsOut') }}/" + id;

                    $.ajax({
                        url: url,
                        type: "POST",
                        data: $('#form-item').serialize(),
                        success: function() {
                            $('#modal-form').modal('hide');
                            table.ajax.reload();
                            alert('Data saved successfully');
                        },
                        error: function() {
                            alert('Error saving data');
                        }
                    });
                    return false;
                }
            });
        });
    </script>
@endsection
