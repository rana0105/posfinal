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
    		<div class="container">
    		    <form action="{{ route('customertypes.store') }}" method="POST">
			{{ csrf_field() }}
			<div class="row main">
				<div class="col-xs-6 col-sm-6 col-md-6">
					<div class="form-group {{ $errors->has('type_name') ? 'has-error' : '' }}">
						
						<label for="type_name" class="cols-sm-2 control-label">Type Name</label>
						<div class="cols-sm-10">
							<input type="text" name="type_name" id="type_name" class="form-control" placeholder="Input type name..">
							<small class="text-danger alert">{{ $errors->first('type_name') }}</small>
						</div>
					</div>
				</div>
			</div>
			<div class="form-group">
				<input type="submit" value="Submit" class="btn btn-success">
				<a href="{{ URL::route('customertypes.index') }}" class="btn btn-warning btn-resposive">Cancel</a>
			</div>
		</form>
    		</div>
	    </div>
	</div>
@endsection