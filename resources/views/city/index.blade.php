@extends('main')

@section('title', '| All Countries')

@section('stylesheets')
    {!! Html::style('css/parsley.css') !!}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-10">
            <h1>All Cities</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <table class="table">
                <thead>
                <th>#</th>
                <th>Country</th>
                <th>State</th>
                <th>City</th>
                <th>Created</th>
                </thead>
                <tbody>
                @foreach ($cities as $city)
                    <tr>
                        <th>{{ $city->id }}</th>
                        <th>{{ $city->state->country->country_name }}</th>
                        <th>{{ $city->state->state_name }}</th>
                        <th>{{ $city->city_name }}</th>
                        <th>{{ date('d/m/Y', strtotime($city->created_at)) }}</th>
                        <th><a href="#" class="btn btn-default btn-sm">View</a> <a href="#" class="btn btn-default btn-sm">Edit</a></th>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="text-center">
                <!-- add paginatino here -->
                {!! $cities->links(); !!}
            </div>
        </div>
        <div class="col-md-3">
            <h3>Add New City</h3>
            <div class="well">
                {!! Form::open(array('route' => 'city.store', 'data-parsley-validate')) !!}

                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('country_name', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '120')) !!}

                {!! Form::submit('New City', array('class' => 'btn btn-primary btn-md btn-block', 'style' => 'margin-top: 20px;')) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    {!! Html::script('js/parsley.min.js') !!}
@endsection
