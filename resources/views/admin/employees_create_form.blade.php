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
                            <h3 class="box-title">Add new Employee</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" method="post" action="{{ route('employees.store') }}">
                            @csrf
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="first_name">First name</label>
                                    <input type="text" name="first_name" class="form-control" id="first_name" placeholder="First name" value="{{ old('first_name') }}">
                                    @if($errors->has('first_name'))
                                        <small class="text-danger">
                                            {{ $errors->first('first_name') }}
                                        </small>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="last_name">Last name</label>
                                    <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Last name" value="{{ old('last_name') }}">
                                    @if($errors->has('last_name'))
                                        <small class="text-danger">
                                            {{ $errors->first('last_name') }}
                                        </small>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" value="{{ old('email') }}">
                                    @if($errors->has('email'))
                                        <small class="text-danger">
                                            {{ $errors->first('email') }}
                                        </small>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone" value="{{ old('phone') }}">
                                    @if($errors->has('phone'))
                                        <small class="text-danger">
                                            {{ $errors->first('phone') }}
                                        </small>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="logo">Company</label>
                                    <select class="form-control" name="company_id">
                                        <option></option>
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
                                <button type="submit" class="btn btn-primary">Submit</button>
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


@endsection
