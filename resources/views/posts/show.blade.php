@extends('main')

@section('title', '| View Post')

@section('content')

    <div class="row">
        <div class="col-md-8">
            <h1>{{ $post->title }}</h1>
            <p class="lead">{{ $post->body }}</p>

            <hr/>

            <div class="tags">
                @foreach($post->tags as $tag)
                    <span class="label label-default margin-right-10">
                        {{ $tag->name }}
                    </span>
                @endforeach
            </div>
        </div>

        <div class="col-md-4">
            <div class="well">
                <dl class="dl-horizontal">
                    <label>Url:</label>
                    <p><a href="{{ route('blog.single', $post->slug) }}">{{ url($post->slug) }}</a></p>
                </dl>

                <dl class="dl-horizontal">
                    <label>Category:</label>
                    <p>{{ $post->category->name }}</p>
                </dl>

                <dl class="dl-horizontal">
                    <label>Created At:</label>
                    <p>{{ date('d-m-Y ia', strtotime($post->created_at)) }}</p>
                </dl>

                <dl class="dl-horizontal">
                    <label>Last Updated:</label>
                    <p>{{ date('j M, Y H:ia', strtotime($post->updated_at)) }}</p>
                </dl>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        {!! Html::linkRoute('posts.edit', 'Edit', array($post->id), array('class' => 'btn btn-primary btn-block')) !!}
                    </div>
                    <div class="col-md-6">
                        {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'delete']) !!}
                            {{ Form::submit('Delete', ['class' => 'btn btn-block btn-danger']) }}
                        {!! Form::close() !!}
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        {{ Html::linkRoute('posts.index', 'Show all Posts', [], ['class' => 'btn btn-default btn-block btn-h1-spacing'])  }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
