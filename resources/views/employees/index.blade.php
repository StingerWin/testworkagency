@extends('layouts.app')

@section('title', 'Employees')

@section('styles')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
    <style>
        .avatar {
            width: 70px;
            align-items: center;
            justify-content: center;
            border-radius: 70px;
            box-shadow: 0 0 7px #666;
        }

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
                                <h3 class="card-title">Employees</h3>
                            </div>
                            <div class="col-2">
                                <a class="btn btn-success waves-effect" href="{{route('employees.create')}}">Add Employees</a>
                            </div>
                        </div>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="employees" class="table table-bordered table-striped">
                            <thead>
                            <tr class="align-center">
                                <th scope="row">Photo</th>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Date of employment</th>
                                <th>Phone number</th>
                                <th>Email</th>
                                <th>Salary</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tfoot>
                            <tr class="align-center">
                                <th scope="row">Photo</th>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Date of employment</th>
                                <th>Phone number</th>
                                <th>Email</th>
                                <th>Salary</th>
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
                    url: '{{ route('employees.index') }}',
                },
                columns: [
                    { data: 'photo', name: 'photo', orderable: false},
                    { data: 'name', name: 'name'},
                    { data: 'position_name', name: 'position_name'},
                    { data: 'date', name: 'date'},
                    { data: 'phone_number', name: 'phone_number'},
                    { data: 'email', name: 'email'},
                    { data: 'salary', name: 'salary'},
                    { data: 'action', name: 'action', orderable: false},
                ],
                paging: true,
                lengthChange: true,
                searching: true,
                ordering: true,
                order: [[3, 'desc']],
                info: true,
                autoWidth: true,
                //scrollX: true,

            });
        });
    </script>
@endsection
