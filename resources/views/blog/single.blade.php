@extends('main')

@section('title', "| $post->title")

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <img src="{{ asset("images/" . $post->image) }}" height="auto" width="100%" />
            <h2><strong>Post: </strong>{{ $post->title }}</h2>
            <p>Text: {{ $post->body }}</p>
            <hr/>
            <p>Posted In: {{ $post->category->name }}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h3 class="comments-title">
                <span class="glyphicon glyphicon-comment"></span>
                {{ $post->comments()->count() }} Comments
            </h3>
            @foreach($post->comments as $comment)
                <div class="comment">
                    <div class="author-info">
                        <img src="{{ "https://www.gravatar.com/avatar/" . md5(strtolower(trim($comment->email))) }}" class="author-image">
                        <div class="author-name">
                            <h4>{{ $comment->name }}</h4>
                            <p class="author-time">{{ $comment->created_at }}</p>
                        </div>
                    </div>
                    <div class="comment-content">
                        {{ $comment->comment }}
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="row">
        <div class="comment-form col-md-8 col-md-offset-2">
            {{ Form::open(['route' => ['comments.store', $post->id], 'method' => 'POST']) }}
                <div class="row">
                    <div class="col-md-6">
                        {{ Form::label('name', 'Name') }}
                        {{ Form::text('name', null, ['class' => 'form-control']) }}
                    </div>
                    <div class="col-md-6">
                        {{ Form::label('email', 'Email') }}
                        {{ Form::text('email', null, ['class' => 'form-control']) }}
                    </div>
                    <div class="col-md-12">
                        {{ Form::label('comment', 'Comment') }}
                        {{ Form::textarea('comment', null, ['class' => 'form-control']) }}

                        {{ Form::submit('Add Comment', ['class' => 'btn btn-success btn-block btn-h1-spacing']) }}
                    </div>
                </div>
            {{ Form::close() }}
        </div>
    </div>

@endsection
