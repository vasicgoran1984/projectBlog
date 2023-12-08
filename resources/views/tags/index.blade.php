@extends('main')

@section('title', '| All Tags')

@section('stylesheets')
    {!! Html::style('css/parsley.css') !!}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-10">
            <h1>All Tags</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <table class="table">
                <thead>
                <th>#</th>
                <th>Name</th>
                <th></th>
                </thead>
                <tbody>
                @foreach ($tags as $tag)
                    <tr>
                        <th>{{ $tag->id }}</th>
                        <th>{{ $tag->name }}</th>
                        <th>{{ date('d/m/Y', strtotime($tag->created_at)) }}</th>
                        <th><a href="{{ route('tags.show', $tag->id) }}" class="btn btn-default btn-sm">View</a>
                            <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-default btn-sm">Edit</a>
                        </th>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="text-center">
                <!-- add paginatino here -->
            </div>
        </div>
        <div class="col-md-3">
            <h3>Add New Tag</h3>
            <div class="well">
                {!! Form::open(array('route' => 'tags.store', 'data-parsley-validate')) !!}

                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('name', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '120')) !!}

                {!! Form::submit('New Tag', array('class' => 'btn btn-primary btn-md btn-block', 'style' => 'margin-top: 20px;')) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    {!! Html::script('js/parsley.min.js') !!}
@endsection
