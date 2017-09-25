@extends('layouts.app')

@section('content')
<div class="col-md-10 col-md-offset-1">
    <div class="panel">
        <div class="panel-heading">
           <div class="panel-title text-left">
                <h3 class="title">Customer Information Update</h3>
                <hr />
            </div>
        </div>
        	{!! Form::model( $customer, ['route' => ['customers.update', $customer->id], 'files' => true, 'method' => 'PUT']) !!}
        	{{-- <form action="{{ route('companies.store') }}" method="POST"> --}}
        		{{ csrf_field() }}
        		<div class="row main">
        		    <div class="col-md-10 col-md-offset-1">
                    	<div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group {{ $errors->has('type_name') ? ' has-error' : '' }}">
                                <label for="company_name" class="cols-sm-2 control-label">Company Name</label>
                                <div class="cols-sm-10">
                                    {{ Form::select('type_name', $custypes , null, ["class" => 'form-control'])}}
                                  <small class="text-danger alert">{{ $errors->first('type_name') }}</small>
                                 </div>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="cols-sm-2 control-label">Customer Name</label>
                                <div class="cols-sm-10">
                                    <input type="text" name="name" id="name" class="form-control"  value="{{ $customer->name }}"/>
                                  <small class="text-danger alert">{{ $errors->first('name') }}</small>
                                 </div>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group {{ $errors->has('shop_name') ? ' has-error' : '' }}">
                                <label for="shop_name" class="cols-sm-2 control-label">Shop Name</label>
                                <div class="cols-sm-10">
                                    <input type="text" name="shop_name" id="shop_name" class="form-control"  value="{{ $customer->shop_name }}"/>
                                  <small class="text-danger alert">{{ $errors->first('shop_name') }}</small>
                                 </div>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="cols-sm-2 control-label">Email</label>
                                <div class="cols-sm-10">
                                    <input type="email" name="email" id="email" class="form-control"  value="{{ $customer->email }}"/>
                                  <small class="text-danger alert">{{ $errors->first('email') }}</small>
                                 </div>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
                                <label for="phone" class="cols-sm-2 control-label">Phone number</label>
                                <div class="cols-sm-10">
                                    <input type="text" name="phone" id="phone" class="form-control"  value="{{ $customer->phone }}"/>
                                  <small class="text-danger alert">{{ $errors->first('phone') }}</small>
                                 </div>
                            </div>
                        </div>
                    
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group {{ $errors->has('image') ? ' has-error' : '' }}">
                                <label for="image" class="cols-sm-2 control-label">Image</label>
                                <div class="cols-sm-10">
                                    <input type="file" name="image" id="image" class="form-control"/>
                                    <img src="{{asset('upload_file/resize_images/')}}/{{ $customer->image }}" alt="" height="50" width="50" class="img-thumbnail" style ="margin-top:7px" style="float:right">
                                  <small class="text-danger alert">{{ $errors->first('image') }}</small>
                                 </div>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="form-group" style="margin-left: 10%;">
        		<input type="submit"  value="Update" class="btn btn-success">
        		<a href="{{ URL::route('customers.index') }}" class="btn btn-warning btn-responsive">Cancel</a>
        	</div>
        {{-- </form> --}}
            {!! Form::close() !!}
    
    </div>
</div>
@endsection