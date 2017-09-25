@extends('layouts.app')

@section('content')
	<div class="col-md-10 col-md-offset-1">
	    <div class="panel">
	        <div class="panel-heading">
    			<div class="panel-title text-left">
    				<h3 class="title">Created</h>
    				<hr/>
    			</div>
    		</div>
		    <form action="{{ route('outlets.store') }}" method="POST">
			{{ csrf_field() }}
			<div class="row main">
			    <div class="col-md-10 col-md-offset-1">
    				<div class="col-xs-6 col-sm-6 col-md-6">
    					<div class="form-group {{ $errors->has('outlet_name') ? 'has-error' : '' }}">
    						
    						<label for="outlet_name" class="cols-sm-2 control-label">Outlet Name</label>
    						<div class="cols-sm-10">
    							<input type="text" name="outlet_name" id="outlet_name" class="form-control" placeholder="Input Outlet name..">
    							<small class="text-danger">{{ $errors->first('outlet_name') }}</small>
    						</div>
    					</div>
    				</div>
    				<div class="col-xs-6 col-sm-6 col-md-6">
    					<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    						
    						<label for="name" class="cols-sm-2 control-label">Employee Name</label>
    						<div class="cols-sm-10">
    							<input type="text" name="name" id="name" class="form-control" placeholder="Outlet Manager Name.." required="">
    							<small class="text-danger">{{ $errors->first('name') }}</small>
    						</div>
    					</div>
    				</div>
    				<div class="col-xs-6 col-sm-6 col-md-6">
    					<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
    						
    						<label for="email" class="cols-sm-2 control-label">Email</label>
    						<div class="cols-sm-10">
    							<input type="email" name="email" id="email" class="form-control" placeholder="Input email " required="">
    							<small class="text-danger">{{ $errors->first('email') }}</small>
    						</div>
    					</div>
    				</div>
    				<div class="col-xs-6 col-sm-6 col-md-6">
    					<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
    						
    						<label for="password" class="cols-sm-2 control-label">Password</label>
    						<div class="cols-sm-10">
    							<input type="password" name="password" id="password" class="form-control" placeholder="Input Password " required="">
    							<small class="text-danger">{{ $errors->first('password') }}</small>
    						</div>
    					</div>
    				</div>
    				<div class="col-xs-6 col-sm-6 col-md-6">
    					<div class="form-group {{ $errors->has('outlet_contact') ? 'has-error' : '' }}">
    						
    						<label for="outlet_contact" class="cols-sm-2 control-label">Contact Number</label>
    						<div class="cols-sm-10">
    							<input type="text" name="outlet_contact" id="outlet_contact" class="form-control" placeholder="Input Contact Number..">
    							<small class="text-danger">{{ $errors->first('outlet_contact') }}</small>
    						</div>
    					</div>
    				</div>
    				<div class="col-xs-6 col-sm-6 col-md-6">
    					<div class="form-group {{ $errors->has('outlet_address') ? 'has-error' : '' }}">
    						
    						<label for="outlet_address" class="cols-sm-2 control-label">Outlet Address</label>
    						<div class="cols-sm-10">
    							<input type="text" name="outlet_address" id="outlet_address" class="form-control" placeholder="Input Outlet Address..">
    							<small class="text-danger">{{ $errors->first('outlet_address') }}</small>
    						</div>
    					</div>
    				</div>
    				<div class="col-xs-6 col-sm-6 col-md-6">
    					<div class="form-group">
                            <label for="status">Status <span class="required">*</span></label>
    		                <br />
    		                <input id="status" name="status" type="radio" class="" value="1"  />
    		                <label for="status" class="">Active</label>
    
    		                <input id="status" name="status" type="radio" class="" value="0"  />
    		                <label for="status" class="">Inactive</label>
                        </div>
    				</div>
				</div>
			</div>
			<div class="form-group" style="margin-left: 10%;">
				<input type="submit" value="Submit" class="btn btn-success" style="margin-bottom: 3%;">
				<a href="{{ URL::route('outlets.index') }}" class="btn btn-warning btn-resposive" style="margin-bottom: 3%;">Cancel</a>
			</div>
		</form>
	    </div>
	</div>
@endsection