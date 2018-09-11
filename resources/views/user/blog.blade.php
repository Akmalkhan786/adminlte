@extends('user.app')
@section('bg-img', asset('user/img/home-bg.jpg'))
@section('title', 'Clean Blog')
@section('sub-heading', 'A Blog Theme by Start Bootstrap')
@section('styles')
    <meta name="csrf-token" content="{{csrf_token()}}">
    <style>
       .fa.fa-thumbs-o-up:hover{
            color: red !important;
        }
    </style>
@endsection
@section('main-content')
    <!-- Main Content -->
    <div class="container">
        <div class="row" id="app">
            <div class="col-lg-8 col-md-10 mx-auto">
                <posts
                        v-for="value in blog"
                        :title = value.title
                        :sub_title = value.sub_title
                        :created_at = value.created_at
                        :key = value.index
                        :post-id = value.id
                        :likes = value.likes.length
                        :slug = value.slug
                        login = {{ Auth::check() }}
                ></posts>
                <hr>
                <!-- Pager -->
                <div class="clearfix">
                    {{$posts->links()}}
                </div>
            </div>
        </div>
    </div>

    <hr>
@endsection
@section('scripts')
    <script src="{{asset('js/app.js')}}"></script>
@endsection