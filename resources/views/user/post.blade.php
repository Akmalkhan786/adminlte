@extends('user.app')
@section('bg-img', '/uploads/post/'.$post->image)
@section('title', $post->title)
@section('sub-heading', $post->sub_title)

@section('main-content')
    <!-- Post Content -->
    <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                <small>Created at {{$post->created_at ? $post->created_at : 'No date'}}</small><br>
                    <h4 class="pull-right"><i class="fa fa-folder-open-o"></i> Categories <br>
                        @foreach($post->categories as $category)
                            <small style="margin-right: 20px">
                                <a href="Category/{{$category->slug}}"> {{$category->name}}</a>
                            </small>
                        @endforeach
                    </h4>
                    {!!htmlspecialchars_decode($post->body)!!}
                    <h3><i class="fa fa-tags"></i> Tag Cloud</h3>
                        @foreach($post->tags as $tag)
                        <a href="tag/{{$tag->slug}}"> <small class="pull-left tag-style">
                                {{$tag->name}}
                            </small> </a>
                        @endforeach
                </div>
            </div>
        </div>
    </article>

    <hr>

@endsection