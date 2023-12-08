@extends('main')

@section('title', '| Create New Post')

@section('stylesheets')
    {!! Html::style('css/parsley.css') !!}
    {!! Html::style('css/select2.min.css') !!}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Create New Post</h1>
            <hr>
            {!! Form::open(array('route' => 'posts.store', 'data-parsley-validate' => '', 'files' => true)) !!}
            {!! Form::label('title', 'Title:') !!}
            {!! Form::text('title', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '120')) !!}

            {!! Form::label('slug', 'Slug:') !!}
            {!! Form::text('slug', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '60')) !!}

            {!! Form::label('category', 'Category') !!}
            <select class="form-control" name="category_id">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>

            {!! Form::label('tag', 'Tags') !!}
            <select class="form-control js-example-basic-multiple" name="tags[]" multiple="multiple">
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                @endforeach
            </select>

            {!! Form::label('feature_image', 'Upload Image:') !!}
            {!! Form::file('feature_image') !!}

            {!! Form::label('body', 'Post Body:') !!}
            {!! Form::textarea('body', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) !!}

            {!! Form::submit('Create Post', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px;')) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('scripts')
    {!! Html::script('js/parsley.min.js') !!}
    {!! Html::script('js/select2.min.js') !!}

    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>
@endsection


