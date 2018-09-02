@extends('user.app')
@section('bg-img', Storage::disk('local')->url($post->image))
@section('title', $post->title)
@section('sub-heading', $post->sub_title)

@section('main-content')
    <!-- Post Content -->
    <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                <small>Created at {{$post->created_at ? $post->created_at->diffForHumans() : 'No date'}}</small><br>
                    {!!htmlspecialchars_decode($post->body)!!}
                </div>
            </div>
        </div>
    </article>

    <hr>

@endsection