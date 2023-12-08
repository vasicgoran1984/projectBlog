@extends('main')

@section('title', '| All Tags')

@section('stylesheets')
    {!! Html::style('css/parsley.css') !!}
@endsection

@section('content')

    {!! Form::model($tag, array('route' => array('tags.update', $tag->id), 'data-parsley-validate', 'method' => 'PUT')) !!}

    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '120')) !!}

    {!! Form::submit('Update Tag', array('class' => 'btn btn-primary btn-md btn-block', 'style' => 'margin-top: 20px;')) !!}
    {!! Form::close() !!}

@endsection

@section('scripts')
    {!! Html::script('js/parsley.min.js') !!}
@endsection
