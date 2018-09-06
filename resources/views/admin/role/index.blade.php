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
                            <a class="btn btn-success btn-lg pull-right" href="{{route('role.create')}}"><span class="fa fa-plus"></span> Add Role</a>
                            <h3 class="box-title">All Roles</h3>
                        </div>
                    </div>
                </div>
                @include('inc.messages')
                <!-- /.box-header -->
                <div class="box-body">
                    @if(count($roles) > 0)
                        <table id="example1" class="table table-bordered table-striped">
                            <thead class="bg-primary">
                            <tr>
                                <th>S.No</th>
                                <th>Role Name</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            @foreach($roles as $key => $role)
                                <tbody>
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td>{{$role->name}}</td>
                                    <td>{{$role->created_at ? $role->created_at->diffForHumans() : 'No date'}}</td>
                                    <td>{{$role->updated_at ? $role->updated_at->diffForHumans() : 'No date'}}</td>
                                    <td><a href="{{route('role.edit', $role->id)}}" class="btn btn-warning btn-flat"><span class="glyphicon glyphicon-edit"></span></a>
                                        <form id="delete-form-{{$role->id}}" style="display: none;" action="{{route('role.destroy', $role->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        <a href="" onclick="
                                                      if (confirm('Are you sure, To delete this record?')){
                                                          event.preventDefault();
                                                          document.getElementById('delete-form-{{$role->id}}').submit();
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
                                <th>Role Name</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                        </table>
                    @else
                        <p class="lead">No role found</p>
                    @endif
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
    <script>
        $(function () {
            $('#example1').DataTable()
            $('#example2').DataTable({
                'paging'      : true,
                'lengthChange': false,
                'searching'   : false,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : false
            })
        })
    </script>
@endsection