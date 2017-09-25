@extends('layouts.app')

@section('content')
	<div class="col-md-10 col-offest-2">
	    <div class="panel">
	        <div class="panel-heading">
    			<div class="panel-title text-left">
    				<h3 class="title">Created</h>
    				<hr/>
    			</div>
    		</div>
		    <form action="{{ route('expenses.store') }}" method="POST">
			{{ csrf_field() }}
			<div class="row main">
			    <div class="col-md-10 col-md-offset-1">
    				<div class="col-xs-6 col-sm-6 col-md-6">
    					<div class="form-group {{ $errors->has('ex_number') ? 'has-error' : '' }}">
    						
    						<label for="ex_number" class="cols-sm-2 control-label">Expense Number</label>
    						<div class="cols-sm-10">
    							<input type="text" name="ex_number" id="ex_number" class="form-control" placeholder="Input Expense Number..">
    							<small class="text-danger">{{ $errors->first('ex_number') }}</small>
    						</div>
    					</div>
    				</div>
    				{{-- <div class="col-xs-6 col-sm-6 col-md-6">
    					<label for="random-number" class="cols-sm-2 control-label">Expense Number Ranadom Generate</label>
    				   <div class="cols-sm-10">
    				   		<div class="input-group">
    				   			<input id="random-number" type="text" class="form-control" name="ex_number" required="" autocomplete="off">
    							<span class="input-group-btn">
    								<p class="btn btn-primary" id="button" onclick="getElementById('random-number').value=Math.floor(Math.random()*10000)"><i class="icono-gear"></i>Generate
    								</p>
    							</span>
    				   		</div>	
    					</div>
    				</div> --}}
    				<div class="col-xs-6 col-sm-6 col-md-6">
    					<div class="form-group {{ $errors->has('outlet_id') ? 'has-error' : '' }}">
    						
    						<label for="outlet_id" class="cols-sm-2 control-label">Outlet</label>
    						<div class="cols-sm-10">
    							<select name="outlet_id" id="outlet_id" class="form-control">
    								<option value="">--Select--</option>
    								@foreach($outlet as $out)
    								 <option value="{{ $out->id }}">{{ $out->out_name }}</option>
    								@endforeach
    							</select>
    							<small class="text-danger">{{ $errors->first('outlet_id') }}</small>
    						</div>
    					</div>
    				</div>
    				<div class="col-xs-6 col-sm-6 col-md-6">
    					<div class="form-group {{ $errors->has('excate_id') ? 'has-error' : '' }}">
    						
    						<label for="excate_id" class="cols-sm-2 control-label">Expense Category Name</label>
    						<div class="cols-sm-10">
    							<select name="excate_id" id="excate_id" class="form-control">
    								<option value="">--Select--</option>
    								@foreach($excate as $ex)
    								 <option value="{{ $ex->id }}">{{ $ex->excate_name }}</option>
    								@endforeach
    							</select>
    							<small class="text-danger">{{ $errors->first('excate_id') }}</small>
    						</div>
    					</div>
    				</div>
    				<div class="col-xs-6 col-sm-6 col-md-6">
    					<div class="form-group {{ $errors->has('ex_amount') ? 'has-error' : '' }}">
    						
    						<label for="ex_amount" class="cols-sm-2 control-label">Expense Amount</label>
    						<div class="cols-sm-10">
    							<input type="text" name="ex_amount" id="ex_amount" class="form-control" placeholder="Input Expense Amount..">
    							<small class="text-danger">{{ $errors->first('ex_amount') }}</small>
    						</div>
    					</div>
    				</div>
    				<div class="col-xs-6 col-sm-6 col-md-6">
    					<div class="form-group {{ $errors->has('ex_date') ? 'has-error' : '' }}">
    						
    						<label for="ex_date" class="cols-sm-2 control-label">Expense Date</label>
    						<div class="cols-sm-10">
    							<input type="date" name="ex_date" id="ex_date" class="form-control" placeholder="Expense Date..">
    							<small class="text-danger">{{ $errors->first('ex_date') }}</small>
    						</div>
    					</div>
    				</div>
    				<div class="col-xs-6 col-sm-6 col-md-6">
    					<div class="form-group {{ $errors->has('ex_note') ? 'has-error' : '' }}">
    						
    						<label for="ex_note" class="cols-sm-2 control-label">Expense Reason</label>
    						<div class="cols-sm-10">
    							<textarea name="ex_note" id="ex_note" class="form-control" placeholder="Input Expense Reason.."></textarea>
    							{{-- <input type="text" name="ex_note" id="ex_note" class="form-control" placeholder="Input Expense Reason.."> --}}
    							<small class="text-danger">{{ $errors->first('ex_note') }}</small>
    						</div>
    					</div>
    				</div>
				</div>
			</div>
			<div class="form-group" style="margin-left: 10%">
				<input type="submit" value="Submit" class="btn btn-success">
				<a href="{{ URL::route('expenses.index') }}" class="btn btn-warning btn-resposive">Cancel</a>
			</div>
		</form>
	    </div>
	</div>
@endsection