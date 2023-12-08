@extends('main')

@section('title', '| All Countries')

@section('stylesheets')
    {!! Html::style('css/parsley.css') !!}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-10">
            <h1>All Countries</h1>
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
                @foreach ($countries as $country)
                    <tr>
                        <th>{{ $country->id }}</th>
                        <th>{{ $country->country_name }}</th>
                        <th>{{ date('d/m/Y', strtotime($country->created_at)) }}</th>
                        <th><a href="#" class="btn btn-default btn-sm">View</a> <a href="#" class="btn btn-default btn-sm">Edit</a></th>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="text-center">
                <!-- add paginatino here -->
                {!! $countries->links(); !!}
            </div>
        </div>
        <div class="col-md-3">
            <h3>Add New Country</h3>
            <div class="well">
                {!! Form::open(array('route' => 'country.store', 'data-parsley-validate')) !!}

                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('country_name', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '120')) !!}

                {!! Form::submit('New Country', array('class' => 'btn btn-primary btn-md btn-block', 'style' => 'margin-top: 20px;')) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    {!! Html::script('js/parsley.min.js') !!}
@endsection
