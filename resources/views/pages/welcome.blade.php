@extends('main')

@section('title', '| Homepage')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron">
                <h1>Welcome to My Blog!</h1>
                <p class="lead">Thank you so much for visiting. This is my test website built with Laravel. Please read my popular post!</p>
                <p><a class="btn btn-primary btn-lg" href="#" role="button">Popular Post</a></p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">

            @foreach($posts as $post)

                <div class="post">
                    <h3>{{ $post->title }}</h3>
                    <p>{{ $post->body }}</p>
                    <a href="{{ url('blog', $post->slug) }}" class="btn btn-default btn-sm">Read More</a>
                </div>

            @endforeach

        </div>

        <div class="col-md-4">
            @include('partials._sidebar')
        </div>
    </div>
@endsection
