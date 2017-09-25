@extends('layouts.app')

@section('content')
	<div class="col-md-8 col-md-offset-2">
	    <div class="panel">
	        <div class="panel-heading">
    			<div class="panel-title text-left">
    				<h3 class="title">Created</h>
    				<hr/>
    			</div>
    		</div>
		    <form action="{{ route('excategories.store') }}" method="POST">
			{{ csrf_field() }}
			<div class="row main">
			    <div class="col-md-10 col-md-offset-1">
			        <div class="col-xs-6 col-sm-6 col-md-6">
					<div class="form-group {{ $errors->has('excate_name') ? 'has-error' : '' }}">
						
						<label for="excate_name" class="cols-sm-2 control-label">Expense Category Name</label>
						<div class="cols-sm-10">
							<input type="text" name="excate_name" id="excate_name" class="form-control" placeholder="Input Expense Category name..">
							<small class="text-danger">{{ $errors->first('excate_name') }}</small>
						</div>
					</div>
				</div>
			
				{{-- <div class="col-xs-6 col-sm-6 col-md-6">
					<label for="random-number" class="cols-sm-2 control-label">Ranadom Number Generate</label>
				   <div class="cols-sm-10">
				   		<div class="input-group">
				   			<input id="random-number" type="text" class="form-control" name="" required="" autocomplete="off">
							<span class="input-group-btn">
								<button class="btn btn-primary" id="button" onclick="getElementById('random-number').value=Math.floor(Math.random()*10000)"><i class="icono-gear"></i>Generate
								</button>
							</span>
				   		</div>	
					</div>
				</div> --}}
			    </div>
				
			</div>
			<div class="form-group" style="margin-left: 10%">
				<input type="submit" value="Submit" class="btn btn-success">
				<a href="{{ URL::route('excategories.index') }}" class="btn btn-warning btn-resposive">Cancel</a>
			</div>
		</form>
	    </div>
	</div>
@endsection