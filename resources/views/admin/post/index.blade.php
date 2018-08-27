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
                            <a class="btn btn-success btn-lg pull-right" href="{{route('post.create')}}"><span class="fa fa-plus"></span> Add Post</a>
                            <h3 class="box-title">All Posts</h3>
                        </div>
                    </div>
                </div>
            @include('inc.messages')
            <!-- /.box-header -->
                <div class="box-body">
                    @if(count($posts) > 0)
                        <table id="example1" class="table table-bordered table-striped">
                            <thead class="bg-primary">
                            <tr>
                                <th>S.No</th>
                                <th>Title</th>
                                <th>Sub Title</th>
                                <th>Slug</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>
                                {{--<th>Delete</th>--}}
                            </tr>
                            </thead>
                            @foreach($posts as $key => $post)
                                <tbody>
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td>{{$post->title}}</td>
                                    <td>{{$post->sub_title}}</td>
                                    <td>{{$post->slug}}</td>
                                    <td>{{$post->created_at ? $post->created_at->diffForHumans() : 'No date'}}</td>
                                    <td>{{$post->updated_at ? $post->updated_at->diffForHumans() : 'No date'}}</td>
                                    <td><a class="btn btn-warning btn-flat" href="{{route('post.edit', $post->id)}}"><span class="glyphicon glyphicon-edit"></span></a>
                                        <form style="display: none;" id="delete-form-{{$post->id}}" action="{{route('post.destroy', $post->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        <a href="" onclick="
                                                    if(confirm('Are you sure, To delete this record?')){
                                                        event.preventDefault();
                                                        document.getElementById('delete-form-{{$post->id}}').submit();
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
                                <th>Title</th>
                                <th>Sub Title</th>
                                <th>Slug</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>
                                {{--<th>Delete</th>--}}
                            </tr>
                            </tfoot>
                        </table>
                    @else
                        <p class="lead">No post found</p>
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