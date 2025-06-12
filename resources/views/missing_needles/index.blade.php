@extends('layouts.master')

@section('top')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header">
            <h3 class="box-title">Missing Needles Records</h3>
        </div>

        <div class="box-header">
            <a onclick="addForm()" class="btn btn-success"><i class="fa fa-plus"></i> Add Missing Needle</a>
            <a href="{{ route('missing-needles.export.pdf') }}" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i>
                Export PDF</a>
            <a href="{{ route('missing-needles.export.excel') }}" class="btn btn-primary"><i class="fa fa-file-excel-o"></i>
                Export Excel</a>
        </div>

        <div class="box-body">
            <table id="missing-needles-table" class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Date</th>
                        <th>EPF</th>
                        <th>Section</th>
                        <th>Broken Time</th>
                        <th>Release Time</th>
                        <th>Request Letter</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>

    @include('missing_needles.form')
@endsection

@section('bot')
    <script>
        function asset(path) {
            return '{{ asset('') }}' + path;
        }
    </script>
    <!-- DataTables -->
    <script src="{{ asset('assets/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <!-- Validator -->
    <script src="{{ asset('assets/validator/validator.min.js') }}"></script>

    <script type="text/javascript">
        // var table = $('#missing-needles-table').DataTable({
        //     processing: true,
        //     serverSide: true,
        //     ajax: {
        //         url: "{{ route('missingNeedles.data') }}",
        //         type: "GET"
        //     },
        //     columns: [{
        //             data: 'id',
        //             name: 'id'
        //         },
        //         {
        //             data: 'date',
        //             name: 'date'
        //         },
        //         {
        //             data: 'employee_epf',
        //             name: 'employee_epf'
        //         },
        //         {
        //             data: 'section',
        //             name: 'section'
        //         },
        //         {
        //             data: 'broke_time',
        //             name: 'broke_time'
        //         },
        //         {
        //             data: 'release_time',
        //             name: 'release_time'
        //         },
        //         {
        //             data: 'request_letter',
        //             name: 'request_letter'
        //         },
        //         {
        //             data: 'action',
        //             name: 'action',
        //             orderable: false,
        //             searchable: false
        //         }
        //     ],
        //     error: function(xhr, error, thrown) {
        //         console.log('DataTables error:', xhr, error, thrown);
        //         alert('An error occurred while loading the data. Please check console for details.');
        //     }
        // });


        // function addForm() {
        // save_method = "add";
        // $('input[name=_method]').val('POST');
        // $('#modal-form').modal('show');
        // $('#modal-form form')[0].reset();
        // $('.modal-title').text('Add Missing Needle Record');
        // }
        var table = $('#missing-needles-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('missingNeedles.data') }}",
                type: "GET"
            },
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'date',
                    name: 'date'
                },
                {
                    data: 'employee_epf',
                    name: 'employee_epf'
                },
                {
                    data: 'section',
                    name: 'section'
                },
                {
                    data: 'broke_time',
                    name: 'broke_time'
                },
                {
                    data: 'release_time',
                    name: 'release_time'
                },
                {
                    data: 'request_letter',
                    name: 'request_letter',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                }
            ],
            error: function(xhr, error, thrown) {
                console.log('DataTables error:', xhr, error, thrown);
                alert('An error occurred while loading the data. Please check console for details.');
            }
        });

        function addForm() {
            save_method = 'add';
            $('#form-item')[0].reset();
            $('input[name=_method]').val('POST');
            $('#form-item').attr('action', '/missing-needles');
            $('#modal-form').modal('show');
            $('.modal-title').text('Add Missing Needle Record');
        }


        // function editForm(id) {
        // save_method = 'edit';
        // $('input[name=_method]').val('PATCH');
        // $('#modal-form form')[0].reset();
        // $.ajax({
        // url: "{{ url('missing-needles') }}" + '/' + id + "/edit",
        // type: "GET",
        // dataType: "JSON",
        // success: function(data) {
        // $('#modal-form').modal('show');
        // $('.modal-title').text('Edit Missing Needle Record');

        // $('#id').val(data.id);
        // $('#date').val(data.date);
        // $('#employee_epf').val(data.employee_epf);
        // $('#section').val(data.section);
        // $('#broke_time').val(data.broke_time);
        // $('#release_time').val(data.release_time);
        // },
        // error : function() {
        // alert("Nothing Data");
        // }
        // });
        // }

        // Update your editForm function
        function editForm(id) {
            save_method = 'edit';
            $('input[name=_method]').val('PATCH');
            $('#form-item')[0].reset();
            $('#current-file').html(''); // Clear previous file info

            $.ajax({
                url: "/missing-needles/" + id + "/edit",
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    $('#modal-form').modal('show');
                    $('.modal-title').text('Edit Missing Needle Record');

                    $('#id').val(data.id);
                    $('#date').val(data.date);
                    $('#employee_epf').val(data.employee_epf);
                    $('#section').val(data.section);
                    $('#broke_time').val(data.broke_time);
                    $('#release_time').val(data.release_time);

                    // Show current file if exists
                    if (data.request_letter) {
                        $('#current-file').html(
                            '<small>Current file: <a href="' +
                            asset('storage/' + data.request_letter) +
                            '" target="_blank">View File</a></small>'
                        );
                    }
                },
                error: function() {
                    alert("Data not found");
                }
            });
        }

        // // Update your form submission handler
        // $(function() {
        //     $('#modal-form form').validator().on('submit', function(e) {
        //         e.preventDefault();

        //         if (!e.isDefaultPrevented()) {
        //             var id = $('#id').val();
        //             var url = save_method == 'add' ? "{{ url('missing-needles') }}" :
        //                 "{{ url('missing-needles') }}/" + id;
        //             var formData = new FormData(this);

        //             $.ajax({
        //                 url: url,
        //                 type: "POST",
        //                 data: formData,
        //                 contentType: false,
        //                 processData: false,
        //                 success: function(data) {
        //                     $('#modal-form').modal('hide');
        //                     table.ajax.reload();
        //                     swal({
        //                         title: 'Success!',
        //                         text: data.message,
        //                         type: 'success',
        //                         timer: '1500'
        //                     });
        //                 },
        //                 error: function(xhr) {
        //                     var errorMessage = xhr.responseJSON ? xhr.responseJSON.message :
        //                         'An error occurred';
        //                     swal({
        //                         title: 'Oops...',
        //                         text: errorMessage,
        //                         type: 'error',
        //                         timer: '1500'
        //                     });
        //                 }
        //             });
        //         }
        //     });
        // });

        function deleteData(id) {
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                cancelButtonColor: '#d33',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then(function() {
                $.ajax({
                    url: "{{ url('missing-needles') }}" + '/' + id,
                    type: "POST",
                    data: {
                        '_method': 'DELETE',
                        '_token': csrf_token
                    },
                    success: function(data) {
                        table.ajax.reload();
                        swal({
                            title: 'Success!',
                            text: data.message,
                            type: 'success',
                            timer: '1500'
                        })
                    },
                    error: function() {
                        swal({
                            title: 'Oops...',
                            text: data.message,
                            type: 'error',
                            timer: '1500'
                        })
                    }
                });
            });
        }

        $(function() {
            $('#modal-form form').validator().on('submit', function(e) {
                if (!e.isDefaultPrevented()) {
                    var id = $('#id').val();
                    if (save_method == 'add') url = "{{ url('missing-needles') }}";
                    else url = "{{ url('missing-needles') . '/' }}" + id;

                    var formData = new FormData($(this)[0]);

                    $.ajax({
                        url: url,
                        type: "POST",
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(data) {
                            $('#modal-form').modal('hide');
                            table.ajax.reload();
                            swal({
                                title: 'Success!',
                                text: data.message,
                                type: 'success',
                                timer: '1500'
                            });
                        },
                        error: function(data) {
                            swal({
                                title: 'Oops...',
                                text: data.responseJSON.message,
                                type: 'error',
                                timer: '1500'
                            });
                        }
                    });
                    return false;
                }
            });
        });
    </script>
@endsection
