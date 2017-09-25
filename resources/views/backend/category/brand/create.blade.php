@extends('layouts.app')
	@section('content')
			<div class="col-md-8 col-md-offset-2">
			    <div class="panel">
			        <div class="panel-heading">
                   <div class="panel-title text-left">
                        <h3 class="title">Brand created</h3>
                        <hr />
                    </div>
                </div>
                    <div class="container">
                        <form action="{{ route('brands.store') }}" method="POST">
    							{{ csrf_field() }}
    	                        <div class="row main">
    		                        {{-- @if (count($errors) > 0)
    		                        	<div class="alert alert-danger">
    								    	<strong>Whoops!</strong> There were some problems with your input.<br><br>
    											<ul>
    												@foreach ($errors->all() as $error)
    													<li>{{ $error }}</li>
    												@endforeach
    											</ul>
    									</div>
    								@endif --}}
    	                            <div class="col-xs-6 col-sm-6 col-md-6">
    	                                <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
    	                                    <label for="name" class="cols-sm-2 control-label">Brand Name</label>
    	                                    <div class="cols-sm-10">
    	                                        <input type="text" name="name" id="name" class="form-control"  placeholder="Brand Name..."/>
    	                                      <small class="text-danger alert">{{ $errors->first('name') }}</small>
    	                                     </div>
    	                                </div>
    	                            </div>
    	                           
    	                        </div>
    	                        <div class="form-group">
    								<input type="submit"  value="Submit" class="btn btn-success">
    								<a href="{{ URL::route('brands.index') }}" class="btn btn-warning btn-responsive">Cancel</a>
    							</div>
    	                </form>
                    </div>
			    </div>
        	</div>
	@endsection
