@extends('main')

@section('title', '| Edit Post')

@section('stylesheets')
    {!! Html::style('css/parsley.css') !!}
    {!! Html::style('css/select2.min.css') !!}
@endsection

@section('content')
    <div class="row">
        {!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT', 'files' => true]) !!}
        <div class="col-md-8">
            {{ Form::label('title', 'Title') }}
            {{ Form::text('title', null, ["class" => "form-control"]) }}

            {{ Form::label('slug', 'Slug') }}
            {{ Form::text('slug', null, ["class" => "form-control"]) }}

            {{ Form::label('category_id', 'Category') }}
            {{ Form::select('category_id', $categories, null, ["class" => 'form-control']) }}

            {{ Form::label('tag', 'Tags') }}
            {{ Form::select('tags[]', $tags, null, ['class' => 'form-control select2-multi', 'multiple' => 'multiple']) }}

            {!! Form::label('feature_image', 'Update Image:') !!}
            {!! Form::file('feature_image') !!}

            {{ Form::label('body', 'Body', ["class" => "form-spacing-top"]) }}
            {{ Form::textarea('body', null, ["class" => "form-control"]) }}
        </div>

        <div class="col-md-4">
            <div class="well">
                <dl class="dl-horizontal">
                    <dt>Created At:</dt>
                    <dd>{{ date('d-m-Y ia', strtotime($post->created_at)) }}</dd>
                </dl>

                <dl class="dl-horizontal">
                    <dt>Last Updated:</dt>
                    <dd>{{ date('j M, Y H:ia', strtotime($post->updated_at)) }}</dd>
                </dl>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        {!! Html::linkRoute('posts.show', 'Cancel', array($post->id), array('class' => 'btn btn-danger btn-block')) !!}
                    </div>
                    <div class="col-md-6">
                        {{ Form::submit('Save Changes', ['class' => 'btn btn-block btn-success']) }}
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection

@section('scripts')
    {!! Html::script('js/parsley.min.js') !!}
    {!! Html::script('js/select2.min.js') !!}

    <script>
        $(document).ready(function() {
            $('.select2-multi').select2();
        });
    </script>
@endsection
