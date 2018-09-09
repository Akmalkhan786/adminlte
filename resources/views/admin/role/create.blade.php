@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Role Create
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row for-form-margins">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Roles</h3>
                        </div>
                        @include('inc.messages')
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" action="{{route('role.store')}}" method="post">
                            @csrf
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Posts Permissions</label>
                                        @foreach($permissions as $permission)
                                            @if($permission->for == 'post')
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="permissions[]" value="{{$permission->id}}">{{$permission->name}}
                                                    </label>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="col-md-4">
                                        <label>Users Permissions</label>
                                        @foreach($permissions as $permission)
                                            @if($permission->for == 'user')
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="permissions[]" value="{{$permission->id}}">{{$permission->name}}
                                                    </label>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="col-md-4">
                                        <label>Other Permissions</label>
                                        @foreach($permissions as $permission)
                                            @if($permission->for == 'other')
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="permissions[]" value="{{$permission->id}}">{{$permission->name}}
                                                    </label>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary btn-lg"><span class="fa fa-upload"></span> Submit</button>
                                <a href="{{route('role.index')}}" class="btn btn-warning btn-lg"><span class="fa fa-backward"></span> Back</a>
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