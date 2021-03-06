@extends('admin.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                User Create
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row for-form-margins">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add Admin</h3>
                        </div>
                        @include('inc.messages')
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" action="{{route('user.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="box-body">
                                <div class="input-group">
                                    <span class="input-group-addon bg-blue"><span class="glyphicon glyphicon-user"></span></span>
                                    <input type="text" name="name" class="form-control" placeholder="Enter Name" value="{{old('name')}}">
                                </div>
                                <br>
                                <div class="input-group">
                                    <span class="input-group-addon bg-green"><span class="glyphicon glyphicon-envelope"></span></span>
                                    <input type="email" name="email" class="form-control" placeholder="Enter Email" value="{{old('email')}}">
                                </div>
                                <br>
                                <div class="input-group">
                                    <span class="input-group-addon bg-aqua"><i class="fa fa-key"></i></span>
                                    <input type="password" name="password" class="form-control" placeholder="Enter Password" value="{{old('password')}}">
                                </div>
                                <br>
                                <div class="input-group">
                                    <span class="input-group-addon bg-blue-gradient"><span class="glyphicon glyphicon-ok"></span></span>
                                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Confirm Password">
                                </div>
                                <br>
                                <div class="input-group">
                                    <span class="input-group-addon bg-aqua-gradient"><span class="glyphicon glyphicon-phone"></span></span>
                                    <input type="text" name="phone" class="form-control" placeholder="Enter Phone" value="{{old('phone')}}">
                                </div>
                                <br>
                                <div class="input-group">
                                    <span class="input-group-addon bg-red"><span class="glyphicon glyphicon-picture"></span></span>
                                    <input type="file" class="form-control" name="image">
                                </div>
                                <br>
                                <div class="form-group">
                                    <label>Assign Role</label>
                                    <div class="row">
                                        @foreach($roles as $role)
                                            <div class="col-md-3">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="role[]" value="{{$role->id}}"> {{$role->name}}
                                                    </label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <div class="checkbox">
                                        <label>
                                            <input id="status" type="checkbox" name="status" @if(old('status') == 1) checked @endif value="1"> Publish
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" name="submit" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-upload"></span> Submit</button>
                                <a class="btn btn-warning btn-lg" href="{{route('user.index')}}"><span class="glyphicon glyphicon-backward"></span> Back</a>
                            </div>
                        </form>
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col-->
            </div>
            <!-- ./row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection