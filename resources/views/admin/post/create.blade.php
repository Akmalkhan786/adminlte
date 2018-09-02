@extends('admin.layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{asset('admin/bower_components/select2/dist/css/select2.min.css')}}">
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Post Create
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Titles</h3>
                        </div>
                        @include('inc.messages')
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="box-body">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" class="form-control" id="title" name="title" placeholder="Enter title">
                                    </div>
                                    <div class="form-group">
                                        <label for="sub_title">Sub Title</label>
                                        <input type="text" name="sub_title" class="form-control" id="sub_title" placeholder="Sub title">
                                    </div>
                                    <div class="form-group">
                                        <label for="slug">Slug</label>
                                        <input type="text" name="slug" class="form-control" id="slug" placeholder="slug">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="pull-right">
                                            <label for="image">Image</label>
                                            <input type="file" id="image" name="image">
                                        </div>
                                    </div>
                                    <div class="checkbox pull-left">
                                        <label>
                                            <input type="checkbox" name="status"> Publish
                                        </label>
                                    </div><br><br>
                                    <div class="form-group" style="margin-top: 20px">
                                        <label>Select Tags</label>
                                        <select name="tags[]" class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select a State" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                            @foreach($tags as $tag)
                                                <option value="{{$tag->id}}">{{$tag->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Select Categories</label>
                                        <select name="categories[]" class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select a State" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
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
                          style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                </div>
                            </div>
                            <div class="box-footer">
                                <button type="submit" name="submit" class="btn btn-primary btn-lg"><span class="fa fa-upload"></span> Submit</button>
                                <a class="btn btn-warning btn-lg" href="{{route('post.index')}}"><span class="fa fa-backward"></span> Back</a>
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
    <!-- /.content-wrapper -->
@endsection
@section('scripts')
    <script src="{{asset('admin/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
    <script>
        $(function () {
           $('.select2').select2();
        });
    </script>
    <script>
        $(function () {
            $('.textarea').wysihtml5();
        });
    </script>
@endsection