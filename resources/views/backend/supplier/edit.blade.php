@extends('layouts.app')

@section('content')
	<div class="col-md-10 col-md-offset-1">
	    <div class="panel">
	        <div class="panel-heading">
                   <div class="panel-title text-left">
                        <h3 class="title">Supplier Update Information</h3>
                        <hr />
                    </div>
                </div>
        	{!! Form::model( $supplier, ['route' => ['suppliers.update', $supplier->id], 'files' => true, 'method' => 'PUT']) !!}
        	{{-- <form action="{{ route('companies.store') }}" method="POST"> --}}
					{{ csrf_field() }}
						<div class="row main">
						    <div class="col-md-10 col-md-offset-1">
	                        	<div class="col-xs-6 col-sm-6 col-md-6">
	                                <div class="form-group {{ $errors->has('company_name') ? ' has-error' : '' }}">
	                                    <label for="company_name" class="cols-sm-2 control-label">Company Name</label>
	                                    <div class="cols-sm-10">
	                                        <input type="text" name="company_name" id="company_name" class="form-control"  value="{{ $supplier->company_name }}" />
	                                      <small class="text-danger alert">{{ $errors->first('company_name') }}</small>
	                                     </div>
	                                </div>
	                            </div>
	                            <div class="col-xs-6 col-sm-6 col-md-6">
	                                <div class="form-group {{ $errors->has('supplier_name') ? ' has-error' : '' }}">
	                                    <label for="supplier_name" class="cols-sm-2 control-label">Supplier Name</label>
	                                    <div class="cols-sm-10">
	                                        <input type="text" name="supplier_name" id="supplier_name" class="form-control"  value="{{ $supplier->supplier_name }}"/>
	                                      <small class="text-danger alert">{{ $errors->first('supplier_name') }}</small>
	                                     </div>
	                                </div>
	                            </div>
	                            <div class="col-xs-6 col-sm-6 col-md-6">
	                                <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
	                                    <label for="email" class="cols-sm-2 control-label">Email</label>
	                                    <div class="cols-sm-10">
	                                        <input type="email" name="email" id="email" class="form-control"  value="{{ $supplier->email }}"/>
	                                      <small class="text-danger alert">{{ $errors->first('email') }}</small>
	                                     </div>
	                                </div>
	                            </div>
	                            <div class="col-xs-6 col-sm-6 col-md-6">
	                                <div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
	                                    <label for="phone" class="cols-sm-2 control-label">Phone number</label>
	                                    <div class="cols-sm-10">
	                                        <input type="text" name="phone" id="phone" class="form-control"  value="{{ $supplier->phone }}"/>
	                                      <small class="text-danger alert">{{ $errors->first('phone') }}</small>
	                                     </div>
	                                </div>
	                            </div>
                            
	                            <div class="col-xs-6 col-sm-6 col-md-6">
	                                <div class="form-group {{ $errors->has('p_image') ? ' has-error' : '' }}">
	                                    <label for="p_image" class="cols-sm-2 control-label">Image</label>
	                                    <div class="cols-sm-10">
	                                        <input type="file" name="p_image" id="p_image" class="form-control"/>
	                                        <img src="{{asset('upload_file/resize_images/')}}/{{ $supplier->p_image }}" alt="" height="50" width="50" class="img-thumbnail" style ="margin-top:7px" style="float:right">
	                                      <small class="text-danger alert">{{ $errors->first('p_image') }}</small>
	                                     </div>
	                                </div>
	                            </div>
                            </div>
                        </div>
                    <div class="form-group" style="margin-left: 10%;">
						<input type="submit"  value="Update" class="btn btn-success">
						<a href="{{ URL::route('suppliers.index') }}" class="btn btn-warning btn-responsive">Cancel</a>
					</div>

            {{-- </form> --}}
            {!! Form::close() !!}
	    </div>
    </div>
@endsection