@extends('layouts.app')

@section('title', 'Create')

@section('content')
<div class="panel">
    <div class="container">
         <div class="row">
        <div class="col-md-3">
            <h3>Create</h3>
        </div>
        <div class="col-md-5 page-action text-right">
            <a href="{{ route('users.index') }}" class="btn btn-default btn-sm"> <i class="fa fa-arrow-left"></i> Back</a>
        </div>
    </div>

        <div class="row">
        <div class="col-md-8" style="margin-bottom: 4%;">
            {!! Form::open(['route' => ['users.store'] ]) !!}
                @include('user._form')
                <!-- Submit Form Button -->
                {!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
    </div>
</div>
@endsection