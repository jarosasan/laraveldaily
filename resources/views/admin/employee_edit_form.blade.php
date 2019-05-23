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
        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Edit Employee profile</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" method="post" action="{{ route('employees.update', $employee->id) }}">
                            @csrf
                            @method('put')
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="first_name">Employee name</label>
                                    <input type="text" name="first_name" class="form-control" id="first_name" placeholder="First name" value="{{ $employee->first_name }}">
                                    @if($errors->has('first_name'))
                                        <small class="text-danger">
                                            {{ $errors->first('first_name') }}
                                        </small>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="last_name">Employee name</label>
                                    <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Last name" value="{{ $employee->last_name  }}">
                                    @if($errors->has('last_name'))
                                        <small class="text-danger">
                                            {{ $errors->first('last_name') }}
                                        </small>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" value="{{ $employee->email  }}">
                                    @if($errors->has('email'))
                                        <small class="text-danger">
                                            {{ $errors->first('email') }}
                                        </small>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="phone">Web site</label>
                                    <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone" value="{{ $employee->phone  }}">
                                    @if($errors->has('phone'))
                                        <small class="text-danger">
                                            {{ $errors->first('phone') }}
                                        </small>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="logo">Add Logo</label>
                                    <select class="form-control" name="company_id">
                                        <option value="{{$employee->company->id}}">{{$employee->company->name }}</option>
                                        @foreach($companies as $company)
                                            <option value="{{$company->id}}">{{$company->name}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('company_id'))
                                        <small class="text-danger">
                                            {{ $errors->first('company_id') }}
                                        </small>
                                    @endif
                                </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a class="btn btn-success" role="button" href="{{route('employees.index')}}">Cancel</a>
                            </div>
                        </form>
                    </div>
                    <!-- /.box -->
                </div>
                <!--/.col (left) -->
            </div>
            <!-- /.row -->
        </section>
    </div>
    <!-- DataTables -->
    <script src="/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="/bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="/dist/js/demo.js"></script>

@endsection
