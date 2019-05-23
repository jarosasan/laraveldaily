@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Companies
            </h1>
        </section>
        <!-- Main content -->
        <section class="col-12">
            <div class="row">
                <div class="col-md-12">
                    <a role="button" class="btn btn-primary" href="{{route('companies.create')}}">Add new Company</a>
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
                                    <th>Logo</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Web site</th>
                                    <th>Employees</th>
                                    <th>Created</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($companies as $company)
                                <tr>
                                    <td>
                                        <div >
                                        @if($company->logo)
                                                <img src="{{ asset('storage/images/'.$company->logo)}}" class="rounded float-left" style="width:50px; height:50px" alt="img">
                                        @else
                                                <img src="" alt="image">
                                        @endif

                                        </div>
                                    </td>
                                    <td>{{$company->name}}</td>
                                    <td>{{$company->email}}</td>
                                    <td><a href="{{$company->website}}">{{$company->website}}</a></td>
                                    <td>
                                        @if($company->getEmployeesCount() > 0)
                                            <a href="{{route('employees.show', $company->id)}}">{{$company->getEmployeesCount()}}</a>
                                        @else
                                            0
                                        @endif
                                    </td>
                                    <td>{{$company->created_at}}</td>
                                    <td>
                                        <form action="{{route('companies.destroy', $company->id)}}" method="post">
                                            <a role="button" class="btn btn-success" href="{{route('companies.edit', $company->id)}}">Edit</a>
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
                        {{ $companies->links() }}
                    </div>
            </div>
        </section><!-- /.content -->
    </div>
    <!-- DataTables -->
    <script src="{{asset('/bower_components/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
    <script src="{{asset('/bower_components/fastclick/lib/fastclick.js')}}"></script>
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
