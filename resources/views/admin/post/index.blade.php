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
                            {{--@can('posts.create', Auth::user())--}}
                                <a class="btn btn-success btn-lg pull-right" href="{{route('post.create')}}"><span class="fa fa-plus"></span> Add Post</a>
                            {{--@endcan--}}
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
                                <th>Image</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                {{--@can('posts.update', Auth::user())--}}
                                    <th>Edit</th>
                                {{--@endcan--}}
                                {{--@can('posts.delete', Auth::user())--}}
                                    <th>Delete</th>
                                {{--@endcan--}}
                                {{--<th>Delete</th>--}}
                            </tr>
                            </thead>
                            @foreach($posts as $key => $post)
                                <tbody>
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td>{{ substr($post->title, 0, 3) }}...</td>
                                    <td>{{substr($post->sub_title, 0, 3)}}...</td>
                                    <td>{{$post->slug}}</td>
                                    <td>
                                        @if($post->image)
                                            <img height="50" src="/uploads/post/{{$post->image}}">
                                        @else
                                            <p>No image</p>
                                        @endif
                                    </td>
                                    <td>
                                        @if($post->status == 0)
                                            <span class="badge bg-red">Not Active</span>
                                        @else
                                            <span class="badge bg-green">Active</span>
                                        @endif
                                    </td>
                                    <td>{{$post->created_at ? $post->created_at : 'No date'}}</td>
                                    <td>{{$post->updated_at ? $post->updated_at : 'No date'}}</td>
                                    {{--@can('posts.update', Auth::user())--}}
                                        <td><a class="btn btn-warning btn-flat" href="{{route('post.edit', $post->id)}}"><span class="glyphicon glyphicon-edit"></span></a></td>
                                    {{--@endcan--}}
                                    {{--@can('posts.delete', Auth::user())--}}
                                     <td>   <form style="display: none;" id="delete-form-{{$post->id}}" action="{{route('post.destroy', $post->id)}}" method="post">
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
                                    {{--@endcan--}}
                                </tr>
                                </tbody>
                            @endforeach
                            <tfoot class="bg-warning">
                            <tr>
                                <th>S.No</th>
                                <th>Title</th>
                                <th>Sub Title</th>
                                <th>Slug</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                {{--@can('posts.update', Auth::user())--}}
                                    <th>Edit</th>
                                {{--@endcan--}}
                                {{--@can('posts.delete', Auth::user())--}}
                                    <th>Delete</th>
                                {{--@endcan--}}
                                {{--<th>Delete</th>--}}
                            </tr>
                            </tfoot>
                        </table>
                    @else
                        <p class="lead">No post found</p>
                    @endif
                </div>
                <div class="row">
                    <div class="col-md-offset-1">
                        {{$posts->links()}}
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