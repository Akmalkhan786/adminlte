@extends('admin.layouts.app')

{{--@section('styles')--}}
    {{--<link rel="stylesheet" href="{{asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">--}}
{{--@endsection--}}

@section('content')
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="box">
                <div class="box-header">
                    <div class="row">
                        <div class="col-md-12">
                            <a class="btn btn-success btn-lg pull-right" href="{{route('user.create')}}"><span class="fa fa-plus"></span> Add User</a>
                            <h3 class="box-title">All Users</h3>
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
                                <th>Action</th>
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
                                    <td><a href="{{route('user.edit', $user->id)}}" class="btn btn-warning btn-flat"><span class="glyphicon glyphicon-edit"></span></a>
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
                                <th>Action</th>
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
        <!-- /.content -->
    </div>
@endsection
{{--@section('scripts')--}}
    {{--<script src="{{asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>--}}
    {{--<script src="{{asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>--}}
    {{--<script>--}}
        {{--$(function () {--}}
            {{--$('#example1').DataTable()--}}
            {{--$('#example2').DataTable({--}}
                {{--'paging'      : true,--}}
                {{--'lengthChange': false,--}}
                {{--'searching'   : false,--}}
                {{--'ordering'    : true,--}}
                {{--'info'        : true,--}}
                {{--'autoWidth'   : false--}}
            {{--})--}}
        {{--})--}}
    {{--</script>--}}
{{--@endsection--}}