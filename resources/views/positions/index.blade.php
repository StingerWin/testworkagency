@extends('layouts.app')

@section('title', 'Positions')

@section('styles')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
    <style>
        .btn-icon-wrapper {
            margin-left: -5px;
            margin-bottom: -5px;
        }

        .btn-icon {
            width: 40px;
            height: 40px;
            margin-left: 5px;
            margin-bottom: 5px;
        }
        .btn-icon i {
            width: auto;
            height: auto;
        }
    </style>
@endsection

@section('content')
    <br>
    <section class="content">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-10">
                                <h3 class="card-title">Positions</h3>
                            </div>
                            <div class="col-2">
                                <a class="btn btn-success waves-effect" href="{{route('positions.create')}}">Add Position</a>
                            </div>
                        </div>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="employees" class="table table-bordered table-striped">
                            <thead>
                            <tr class="align-center">
                                <th>Name</th>
                                <th>Last update</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tfoot>
                            <tr class="align-center">
                                <th>Name</th>
                                <th>Last update</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>

@endsection

@section('scripts')
    <!-- DataTables -->
    <script src="{{URL::asset('assets/plugins/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
    <script>
        $(function () {
            $('#employees').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route('positions.index') }}',
                },
                columns: [
                    { data: 'name', name: 'name'},
                    { data: 'updated_at', name: 'updated_at'},
                    { data: 'action', name: 'action', orderable: false},
                ],
                paging: true,
                lengthChange: true,
                searching: true,
                ordering: true,
                info: true,
                autoWidth: true,
                // scrollX: true,

            });
        });
    </script>
@endsection
