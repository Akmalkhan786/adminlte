@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Dashboard
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3>{{$categoryCount}}</h3>

                            <p>Categories</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-folder"></i>
                        </div>
                        <a href="{{route('category.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>{{$tagCount}}</h3>

                            <p>Tags</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-network"></i>
                        </div>
                        <a href="{{route('tag.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>{{$userCount}}</h3>

                            <p>User Registrations</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="{{route('user.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>{{$postCount}}</h3>

                            <p>Posts</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-ios-paper-outline"></i>
                        </div>
                        <a href="{{route('post.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
        <!-- /.content -->
            <div class="box">
                <div class="box-header">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="box-title">Active Users</h3>
                        </div>
                    </div>
                </div>
            @include('inc.messages')
            <!-- /.box-header -->
                <div class="box-body">
                    @if(count($users) > 0)
                        <table id="example1" class="table table-bordered table-striped table-hover">
                            <thead class="bg-light-blue-gradient">
                            <tr>
                                <th>S.No</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Assigned Roles</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            @foreach($users as $key => $user)
                                <tbody>
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>
                                        @if($user->image)
                                            <img src="/uploads/user/{{$user->image}}" alt="{{$user->image}}" height="50">
                                        @else
                                            <p>No image</p>
                                        @endif
                                    </td>
                                    <td>
                                        @foreach($user->roles as $role)
                                            {{$role->name}},
                                        @endforeach
                                    </td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->phone}}</td>
                                    <td>
                                        @if($user->status == 0)
                                            <span class="badge bg-red">Not Active</span>
                                        @else
                                            <span class="badge bg-green">Active</span>
                                        @endif
                                    </td>
                                    <td>{{$user->created_at ? $user->created_at->diffForHumans() : 'No date'}}</td>
                                    <td>{{$user->updated_at ? $user->updated_at->diffForHumans() : 'No date'}}</td>
                                    <td><a href="{{route('user.edit', $user->id)}}" class="btn btn-warning btn-flat"><span class="glyphicon glyphicon-edit"></span></a></td>
                                    <td>
                                        <form id="delete-form-{{$user->id}}" style="display: none;" action="{{route('user.destroy', $user->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        <a href="" onclick="
                                                if (confirm('Are you sure, To delete this record?')){
                                                event.preventDefault();
                                                document.getElementById('delete-form-{{$user->id}}').submit();
                                                } else {
                                                event.preventDefault();
                                                }
                                                " class="btn btn-danger btn-flat"><span class="glyphicon glyphicon-trash"></span></a>
                                    </td>
                                </tr>
                                </tbody>
                            @endforeach
                            <tfoot class="bg-success">
                            <tr>
                                <th>S.No</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Assigned Roles</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </tfoot>
                        </table>
                    @else
                        <p class="lead">No tag found</p>
                    @endif
                </div>
                <div class="row">
                    <div class="col-xs-offset-1">
                        {{$users->links()}}
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.row -->
        </section>
    </div>
@endsection