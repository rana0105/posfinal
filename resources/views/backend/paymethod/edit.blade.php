@extends('layouts.app')

@section('content')
	<div class="col-md-8 col-md-offset-2">
	    <div class="panel">
	        <div class="panel-heading">
                   <div class="panel-title text-left">
                        <h3 class="title">Pyament Method</h3>
                        <hr />
                    </div>
                </div>
        	{!! Form::model( $pay, ['route' => ['paymethods.update', $pay->id], 'files' => true, 'method' => 'PUT']) !!}
					{{ csrf_field() }}
						<div class="row main">
						    <div class="col-md-8 col-md-offset-2">
	                            <div class="col-xs-6 col-sm-6 col-md-6">
	                                <div class="form-group {{ $errors->has('pay_name') ? ' has-error' : '' }}">
	                                    <label for="pay_name" class="cols-sm-2 control-label">Payment Method Name</label>
	                                    <div class="cols-sm-10">
	                                        <input type="text" name="pay_name" id="pay_name" class="form-control"  value="{{ $pay->pay_name }}"/>
	                                      <small class="text-danger">{{ $errors->first('pay_name') }}</small>
	                                     </div>
	                                </div>
	                            </div>
	                            <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
								       {{ Form::label('status','Status *')}} <br/>
								         @if($pay->status == '1')
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
                    <div class="form-group" style="margin-left: 10%;">
						<input type="submit"  value="Update" class="btn btn-success">
						<a href="{{ URL::route('paymethods.index') }}" class="btn btn-warning btn-responsive">Cancel</a>
					</div>
            {!! Form::close() !!}
	    </div>
            	
    </div>
@endsection