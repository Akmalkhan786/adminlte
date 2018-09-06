@extends('admin.layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="box">
                <div class="box-header">
                    <div class="row">
                        <div class="col-md-12">
                            <a class="btn btn-success btn-lg pull-right" href="{{route('permission.create')}}"><span class="fa fa-plus"></span> Add Permission</a>
                            <h3 class="box-title">All Permissions</h3>
                        </div>
                    </div>
                </div>
                @include('inc.messages')
                <!-- /.box-header -->
                <div class="box-body">
                    @if(count($permissions) > 0)
                        <table id="example1" class="table table-bordered table-striped">
                            <thead class="bg-primary">
                            <tr>
                                <th>S.No</th>
                                <th>Permission Name</th>
                                <th>Permission For</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            @foreach($permissions as $key => $permission)
                                <tbody>
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td>{{$permission->name}}</td>
                                    <td>{{$permission->for}}</td>
                                    <td>{{$permission->created_at ? $permission->created_at->diffForHumans() : 'No date'}}</td>
                                    <td>{{$permission->updated_at ? $permission->updated_at->diffForHumans() : 'No date'}}</td>
                                    <td><a href="{{route('permission.edit', $permission->id)}}" class="btn btn-warning btn-flat"><span class="glyphicon glyphicon-edit"></span></a>
                                        <form id="delete-form-{{$permission->id}}" style="display: none;" action="{{route('permission.destroy', $permission->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        <a href="" onclick="
                                                      if (confirm('Are you sure, To delete this record?')){
                                                          event.preventDefault();
                                                          document.getElementById('delete-form-{{$permission->id}}').submit();
                                                      } else {
                                                          event.preventDefault();
                                                }
                                                " class="btn btn-danger btn-flat"><span class="glyphicon glyphicon-trash"></span></a>
                                    </td>
                                </tr>
                                </tbody>
                            @endforeach
                            <tfoot class="bg-warning">
                            <tr>
                                <th>S.No</th>
                                <th>Permission Name</th>
                                <th>Permission For</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                        </table>
                    @else
                        <p class="lead">No permission found</p>
                    @endif
                </div>
                <div class="row">
                    <div class="col-md-offset-1">
                        {{$permissions->links()}}
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
@endsection
@section('scripts')
    <script src="{{asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
@endsection