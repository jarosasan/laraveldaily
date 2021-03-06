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
                            <h3 class="box-title">Create new Company</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" method="post" action="{{ route('companies.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="name">Company name</label>
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Company" value="{{ old('name') }}">
                                    @if($errors->has('name'))
                                        <small class="text-danger">
                                            {{ $errors->first('name') }}
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
                                    <label for="website">Web site</label>
                                    <input type="text" name="website" class="form-control" id="website" placeholder="Web site" value="{{ old('website') }}">
                                    @if($errors->has('website'))
                                        <small class="text-danger">
                                            {{ $errors->first('website') }}
                                        </small>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="logo">Add Logo</label>
                                    <input type="file" name="logo" id="logo">
                                    @if($errors->has('logo'))
                                        <small class="text-danger">
                                            {{ $errors->first('logo') }}
                                        </small>
                                    @endif
                                </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a class="btn btn-success" role="button" href="{{route('companies.index')}}">Cancel</a>
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



@endsection
