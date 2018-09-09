@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Permission Update
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Permissions</h3>
                        </div>
                    @include('inc.messages')
                    <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" action="{{route('permission.update', $permission->id)}}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" value="{{$permission->name}}">
                                </div>
                                <div class="form-group">
                                    <label for="for">Permission For</label>
                                    <select name="for" id="for" class="form-control">
                                        <option selected disabled>Select Permission For</option>
                                        <option value="post">Post</option>
                                        <option value="user">User</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary btn-lg"><span class="fa fa-upload"></span> Submit</button>
                                <a href="{{route('permission.index')}}" class="btn btn-warning btn-lg"><span class="fa fa-backward"></span> Back</a>
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
@endsection