@extends('layouts.app')
	@section('content')
		<div class="col-md-10 col-md-offset-1">
		    <div class="panel">
		        <div class="panel-heading">
               <div class="panel-title text-left">
                    <h3 class="title">Supplier created</h3>
                    <hr />
                </div>
            </div>
            	<form action="{{ route('suppliers.store') }}" method="POST" enctype="multipart/form-data" files="true">
						{{ csrf_field() }}
                        <div class="row main">
                            <div class="col-md-10 col-md-offset-1">
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
                                    <div class="form-group {{ $errors->has('company_name') ? ' has-error' : '' }}">
                                        <label for="company_name" class="cols-sm-2 control-label">Company Name</label>
                                        <div class="cols-sm-10">
                                            <input type="text" name="company_name" id="company_name" class="form-control"  placeholder="Company Name..."/>
                                          <small class="text-danger alert">{{ $errors->first('company_name') }}</small>
                                         </div>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group {{ $errors->has('supplier_name') ? ' has-error' : '' }}">
                                        <label for="supplier_name" class="cols-sm-2 control-label">Supplier Name</label>
                                        <div class="cols-sm-10">
                                            <input type="text" name="supplier_name" id="supplier_name" class="form-control"  placeholder="Supplier Name..."/>
                                          <small class="text-danger alert">{{ $errors->first('supplier_name') }}</small>
                                         </div>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label for="email" class="cols-sm-2 control-label">Email</label>
                                        <div class="cols-sm-10">
                                            <input type="email" name="email" id="email" class="form-control"  placeholder="Email..."/>
                                          <small class="text-danger alert">{{ $errors->first('email') }}</small>
                                         </div>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
                                        <label for="phone" class="cols-sm-2 control-label">Phone number</label>
                                        <div class="cols-sm-10">
                                            <input type="text" name="phone" id="phone" class="form-control"  placeholder="Phone number..."/>
                                          <small class="text-danger alert">{{ $errors->first('phone') }}</small>
                                         </div>
                                    </div>
                                </div>
                            
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group {{ $errors->has('p_image') ? ' has-error' : '' }}">
                                        <label for="p_image" class="cols-sm-2 control-label">Image</label>
                                        <div class="cols-sm-10">
                                            <input type="file" name="p_image" id="p_image" class="form-control"/>
                                          <small class="text-danger alert">{{ $errors->first('p_image') }}</small>
                                         </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group" style="margin-left: 10%;">
							<input type="submit"  value="Submit" class="btn btn-success">
							<a href="{{ URL::route('suppliers.index') }}" class="btn btn-warning btn-responsive">Cancel</a>
						</div>
                </form>
		    </div>
    	</div>
	@endsection
