@extends('admin.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Post Updated
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-9">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Titles</h3>
                        </div>
                    @include('inc.messages')
                    <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" action="{{route('post.update', $post->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="box-body">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" class="form-control" id="title" name="title" placeholder="Enter title" value="{{$post->title}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="sub_title">Sub Title</label>
                                        <input type="text" name="sub_title" class="form-control" id="sub_title" placeholder="Sub title" value="{{$post->sub_title}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="slug">Slug</label>
                                        <input type="text" name="slug" class="form-control" id="slug" placeholder="slug" value="{{$post->slug}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="image">Image</label>
                                        <input type="file" id="image" name="image">
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="status" @if($post->status == 1) checked @endif> Publish
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Blog Body
                                        <small>Simple and fast</small>
                                    </h3>
                                    <!-- tools box -->
                                    <div class="pull-right box-tools">
                                        <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip"
                                                title="Collapse">
                                            <i class="fa fa-minus"></i></button>
                                    </div>
                                    <!-- /. tools -->
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body pad">
                                    <textarea class="textarea" placeholder="Place some text here" name="body"
                                              style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$post->body}}</textarea>
                                </div>
                            </div>
                            <div class="box-footer">
                                <button type="submit" name="submit" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-upload  "></span> Submit</button>
                                <a class="btn btn-warning btn-lg" href="{{route('post.index')}}"><span class="fa fa-backward"></span> Back</a>
                            </div>
                        </form>
                    </div>
                    <!-- /.box -->
                </div>
                <div class="col-md-3">
                    <img src="{{Storage::disk('local')->url($post->image)}}" class="img-thumbnail rounded">
                </div>
                <!-- /.col-->
            </div>
            <!-- ./row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
@section('scripts')
    <script>
        $(function () {
            $('.textarea').wysihtml5();
        });
    </script>
@endsection