@extends('layouts.master')

@section('top')
    <link rel="stylesheet" href="{{ asset('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header">
            <h3 class="box-title">Extra Needles Records</h3>
        </div>

        <div class="box-header">
            <a onclick="addForm()" class="btn btn-success"><i class="fa fa-plus"></i> Add Record</a>
            <a href="{{ route('extra-needles.export.pdf') }}" class="btn btn-danger">
                <i class="fa fa-file-pdf-o"></i> Export PDF
            </a>
            <a href="{{ route('extra-needles.export.excel') }}" class="btn btn-primary">
                <i class="fa fa-file-excel-o"></i> Export Excel
            </a>
        </div>

        <div class="box-body">
            <table id="extra-needles-table" class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Retrieved Date</th>
                        <th>Needle Type</th>
                        <th>Needle Size</th>
                        <th>Machine Number</th>
                        <th>Submitted EPF</th>
                        <th>Section (Submitted)</th>
                        <th>Delivery Date</th>
                        <th>Retrieved EPF</th>
                        <th>Section (Retrieved)</th>
                        <th>New Machine</th>
                        <th>Unique ID</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>

    @include('extra_needles.form')
@endsection

@section('bot')
    <script src="{{ asset('assets/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/validator/validator.min.js') }}"></script>

    <script>
        var table = $('#extra-needles-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('extraNeedles.data') }}",
            columns: [
                { data: 'id', name: 'id' },
                { data: 'retrieved_date', name: 'retrieved_date' },
                { data: 'needle_type', name: 'needle_type' },
                { data: 'needle_size', name: 'needle_size' },
                { data: 'machine_number', name: 'machine_number' },
                { data: 'submitted_epf', name: 'submitted_epf' },
                { data: 'section_submitted', name: 'section_submitted' },
                { data: 'delivery_date', name: 'delivery_date' },
                { data: 'retrieved_epf', name: 'retrieved_epf' },
                { data: 'section_retrieved', name: 'section_retrieved' },
                { data: 'new_machine_number', name: 'new_machine_number' },
                { data: 'unique_identifier', name: 'unique_identifier' },
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ]
        });

        function addForm() {
            save_method = 'add';
            $('#form-item')[0].reset();
            $('input[name=_method]').val('POST');
            $('#modal-form').modal('show');
            $('.modal-title').text('Add Extra Needle Record');
        }

        function editForm(id) {
            save_method = 'edit';
            $('input[name=_method]').val('PATCH');
            $('#form-item')[0].reset();
            
            $.ajax({
                url: "{{ url('extra-needles') }}/" + id + "/edit",
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    $('#modal-form').modal('show');
                    $('.modal-title').text('Edit Extra Needle Record');
                    
                    $('#id').val(data.id);
                    $('#retrieved_date').val(data.retrieved_date);
                    $('#needle_type').val(data.needle_type);
                    $('#needle_size').val(data.needle_size);
                    $('#machine_number').val(data.machine_number);
                    $('#submitted_epf').val(data.submitted_epf);
                    $('#section_submitted').val(data.section_submitted);
                    $('#delivery_date').val(data.delivery_date);
                    $('#retrieved_epf').val(data.retrieved_epf);
                    $('#section_retrieved').val(data.section_retrieved);
                    $('#new_machine_number').val(data.new_machine_number);
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
                    url: "{{ url('extra-needles') }}/" + id,
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
                        ? "{{ url('extra-needles') }}" 
                        : "{{ url('extra-needles') }}/" + id;

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