@extends('layouts.master')

@section('top')
    <link rel="stylesheet" href="{{ asset('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header">
            <h3 class="box-title">Blunt Needles Records</h3>
        </div>

        <div class="box-header">
            <a onclick="addForm()" class="btn btn-success"><i class="fa fa-plus"></i> Add Blunt Needle</a>
            <a href="{{ route('blunt-needles.export.pdf') }}" class="btn btn-danger">
                <i class="fa fa-file-pdf-o"></i> Export PDF
            </a>
            <a href="{{ route('blunt-needles.export.excel') }}" class="btn btn-primary">
                <i class="fa fa-file-excel-o"></i> Export Excel
            </a>
        </div>

        <div class="box-body">
            <table id="blunt-needles-table" class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Date</th>
                        <th>EPF</th>
                        <th>Job Number</th>
                        <th>Section</th>
                        <th>Needle Type</th>
                        <th>Needle Size</th>
                        <th>Machine</th>
                        <th>Embedded</th>
                        <th>New Type</th>
                        <th>New Size</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>

    @include('blunt_needles.form')
@endsection

@section('bot')
    <script src="{{ asset('assets/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/validator/validator.min.js') }}"></script>

    <script>
        var table = $('#blunt-needles-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('bluntNeedles.data') }}",
            columns: [
                { data: 'id', name: 'id' },
                { data: 'date', name: 'date' },
                { data: 'employee_epf', name: 'employee_epf' },
                { data: 'job_number', name: 'job_number' },
                { data: 'section', name: 'section' },
                { data: 'needle_type', name: 'needle_type' },
                { data: 'needle_size', name: 'needle_size' },
                { data: 'machine_number', name: 'machine_number' },
                { data: 'was_embedded', name: 'was_embedded' },
                { data: 'new_needle_type', name: 'new_needle_type' },
                { data: 'new_needle_size', name: 'new_needle_size' },
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ]
        });

        function addForm() {
            save_method = 'add';
            $('#form-item')[0].reset();
            $('#was_embedded').prop('checked', false);
            $('input[name=_method]').val('POST');
            $('#modal-form').modal('show');
            $('.modal-title').text('Add Blunt Needle Record');
        }

        function editForm(id) {
            save_method = 'edit';
            $('input[name=_method]').val('PATCH');
            $('#form-item')[0].reset();
            
            $.ajax({
                url: "{{ url('blunt-needles') }}/" + id + "/edit",
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    $('#modal-form').modal('show');
                    $('.modal-title').text('Edit Blunt Needle Record');
                    
                    $('#id').val(data.id);
                    $('#date').val(data.date);
                    $('#employee_epf').val(data.employee_epf);
                    $('#job_number').val(data.job_number);
                    $('#section').val(data.section);
                    $('#needle_type').val(data.needle_type);
                    $('#needle_size').val(data.needle_size);
                    $('#machine_number').val(data.machine_number);
                    $('#was_embedded').prop('checked', data.was_embedded);
                    $('#new_needle_type').val(data.new_needle_type);
                    $('#new_needle_size').val(data.new_needle_size);
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
                    url: "{{ url('blunt-needles') }}/" + id,
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
                        ? "{{ url('blunt-needles') }}" 
                        : "{{ url('blunt-needles') }}/" + id;

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