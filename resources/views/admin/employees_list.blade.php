@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Employees
            </h1>
        </section>
        <!-- Main content -->
        <section class="col-12">
            <div class="row">
                <div class="col-md-12">
                    <a role="button" class="btn btn-primary" href="{{route('employees.create')}}">Add new Employee</a>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Companies table</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Company</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Created</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($employees as $employee)
                                <tr>
                                    <td>{{$employee->first_name}}</td>
                                    <td>{{$employee->last_name}}</td>
                                    <td>{{$employee->company->name}}</td>
                                    <td>{{$employee->email}}</td>
                                    <td>{{$employee->phone}}</td>
                                    <td>{{$employee->created_at}}</td>
                                    <td>
                                        <form action="{{route('employees.destroy', $employee->id)}}" method="post">
                                            <a role="button" class="btn btn-success" href="{{route('employees.edit', $employee->id)}}">Edit</a>
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>

                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <div class="col">
                <div class="pagination">
                    {{ $employees->links() }}
                </div>
            </div>
        </section><!-- /.content -->
    </div>
    <!-- DataTables -->
    {{--<script src="{{asset('/bower_components/jquery/dist/jquery.min.js')}}"></script>--}}
    {{--<script src="{{asset('/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>--}}
    {{--<script src="{{asset('/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>--}}
    {{--<script src="{{asset('/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>--}}
    {{--<script src="{{asset('/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>--}}
    {{--<script src="{{asset('/bower_components/fastclick/lib/fastclick.js')}}"></script>--}}

    <!-- page script -->
    <script>
        $(function () {
            $('#example2').DataTable({
                'paging'      : false,
                'lengthChange': false,
                'searching'   : false,
                'ordering'    : true,
                'info'        : false,
                'autoWidth'   : false
            })
        })
    </script>
@endsection
