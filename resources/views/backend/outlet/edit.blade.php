@extends('layouts.app')

@section('content')
	<div class="col-md-10 col-md-offset-1">
	    <div class="panel">
	        <div class="panel-heading">
                   <div class="panel-title text-left">
                        <h3 class="title">Outlet Update</h3>
                        <hr />
                    </div>
                </div>
        	{!! Form::model( $outlet, ['route' => ['outlets.update', $outlet->id], 'files' => true, 'method' => 'PUT']) !!}
        	{{-- <form action="{{ route('companies.store') }}" method="POST"> --}}
					{{ csrf_field() }}
                    <div class="row main">
                        <div class="col-md-10 col-md-offset-1">
							<div class="col-xs-6 col-sm-6 col-md-6">
								<div class="form-group {{ $errors->has('outlet_name') ? 'has-error' : '' }}">
									
									<label for="outlet_name" class="cols-sm-2 control-label">Outlet Name</label>
									<div class="cols-sm-10">
										<input type="text" name="outlet_name" id="outlet_name" class="form-control" value="{{ $outlet->out_name }}">
										<small class="text-danger">{{ $errors->first('outlet_name') }}</small>
									</div>
								</div>
							</div>
					
							<div class="col-xs-6 col-sm-6 col-md-6">
								<div class="form-group {{ $errors->has('outlet_contact') ? 'has-error' : '' }}">
									
									<label for="outlet_contact" class="cols-sm-2 control-label">Contact Number</label>
									<div class="cols-sm-10">
										<input type="text" name="outlet_contact" id="outlet_contact" class="form-control" value="{{ $outlet->out_contact }}">
										<small class="text-danger">{{ $errors->first('outlet_contact') }}</small>
									</div>
								</div>
							</div>
					
							<div class="col-xs-6 col-sm-6 col-md-6">
								<div class="form-group {{ $errors->has('outlet_address') ? 'has-error' : '' }}">
									
									<label for="outlet_address" class="cols-sm-2 control-label">Outlet Address</label>
									<div class="cols-sm-10">
										<input type="text" name="outlet_address" id="outlet_address" class="form-control" value="{{ $outlet->out_address }}">
										<small class="text-danger">{{ $errors->first('outlet_address') }}</small>
									</div>
								</div>
							</div>
					
							<div class="col-xs-6 col-sm-6 col-md-6">
								<div class="form-group">
							       {{ Form::label('status','Status *')}} <br/>
							         @if($outlet->status == '1')
							           {{Form::radio('status', '1', true, ['checked' => 'checked']) }} Active 
							           {{Form::radio('status', '0', false) }} Inactive
							           @else
							           {{Form::radio('status', '1', false) }}  Active 
							           {{Form::radio('status', '0', true, ['checked' => 'checked']) }} Inactive  
							         @endif
							    </div>
						    </div>
						</div>
					</div>
                    <div class="form-group" style="margin-bottom: 4%; margin-left: 10%;">
						<input type="submit"  value="Update" class="btn btn-success">
						<a href="{{ URL::route('outlets.index') }}" class="btn btn-warning btn-responsive">Cancel</a>
					</div>

            {{-- </form> --}}
            {!! Form::close() !!}
	    </div>
            	
    </div>
@endsection