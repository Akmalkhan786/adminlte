@extends('admin.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                User Update
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-8">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">User</h3>
                        </div>
                    @include('inc.messages')
                    <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" action="{{route('user.update', $user->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="box-body">
                                <div class="input-group">
                                    <span class="input-group-addon bg-blue"><span class="glyphicon glyphicon-user"></span></span>
                                    <input type="text" name="name" class="form-control" placeholder="Enter Name" value="@if(old('name')) {{old('name')}} @else {{$user->name}} @endif">
                                </div>
                                <br>
                                <div class="input-group">
                                    <span class="input-group-addon bg-green"><span class="glyphicon glyphicon-envelope"></span></span>
                                    <input type="email" name="email" class="form-control" placeholder="Enter Email" value="@if(old('email')) {{old('email')}} @else {{$user->email}} @endif">
                                </div>
                                <br>
                                <div class="input-group">
                                    <span class="input-group-addon bg-aqua-gradient"><span class="glyphicon glyphicon-phone"></span></span>
                                    <input type="text" name="phone" class="form-control" placeholder="Enter Phone" value="@if(old('phone')) {{old('phone')}} @else {{$user->phone}} @endif">
                                </div>
                                <br>
                                <div class="input-group">
                                    <span class="input-group-addon bg-light-blue-gradient"><span class="glyphicon glyphicon-picture"></span></span>
                                    <input type="file" class="form-control" name="image">
                                </div>
                                <div class="form-group">
                                    <label>Assign Role</label>
                                    <div class="row">
                                        @foreach($roles as $role)
                                            <div class="col-md-3">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="role[]" value="{{$role->id}}"
                                                               @foreach($user->roles as $user_role)
                                                                   @if($user_role->id == $role->id)
                                                                       checked
                                                                    @endif
                                                               @endforeach
                                                        > {{$role->name}}
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
                                            <input id="status" type="checkbox" name="status" @if(old('status') == 1 || $user->status == 1) checked @endif value="1"> Publish
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
                <div class="col-md-4">
                    <img src="/uploads/user/{{$user->image}}" class="img-thumbnail">
                </div>
                <!-- /.col-->
            </div>
            <!-- ./row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection