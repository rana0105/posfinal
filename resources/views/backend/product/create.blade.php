@extends('layouts.app')
	@section('content')
		<div class="col-md-10 col-md-offset-1">
		    <div class="panel">
		        <div class="panel-heading">
               <div class="panel-title text-left">
                    <h3 class="title">Product created</h3>
                    <hr />
                </div>
            </div>
            	<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" files="true">
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
                                    <div class="form-group {{ $errors->has('p_name') ? ' has-error' : '' }}">
                                        <label for="p_name" class="cols-sm-2 control-label">Product Name</label>
                                        <div class="cols-sm-10">
                                            <input type="text" name="p_name" id="p_name" class="form-control"  placeholder="Product Name..."/>
                                          <small class="text-danger alert">{{ $errors->first('p_name') }}</small>
                                         </div>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group {{ $errors->has('code') ? ' has-error' : '' }}">
                                        <label for="code" class="cols-sm-2 control-label">Product Code</label>
                                        <div class="cols-sm-10">
                                            <input type="text" name="code" id="code" class="form-control"  placeholder="Product Code..."/>
                                          <small class="text-danger alert">{{ $errors->first('code') }}</small>
                                         </div>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label for="name" class="cols-sm-2 control-label">Bar Code</label>
                                        <div class="cols-sm-10">
                                            <input type="text" name="bar_code" id="bar_code" class="form-control"  placeholder="Bar Code..."/>
                                          <small class="text-danger alert">{{ $errors->first('bar_code') }}</small>
                                         </div>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group {{ $errors->has('c_name') ? ' has-error' : '' }}">
                                        <label for="c_name" class="cols-sm-2 control-label">Category</label>
                                        <div class="cols-sm-10">
                                            <select class="form-control" name="c_name">
                                            	<option value="0" disabled="true" selected="ture">--Select--</option>
    			                            	@foreach($procategory as $procategorys)
    			                            		<option value="{{ $procategorys->id }}">{{ $procategorys->name }}
    			                            		</option>
    			                            	@endforeach
    	                        		    </select> 
                                            <small class="text-danger alert">{{ $errors->first('c_name') }}</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group {{ $errors->has('b_name') ? ' has-error' : '' }}">
                                        <label for="b_name" class="cols-sm-2 control-label">Brand</label>
                                        <div class="cols-sm-10">
                                            <select class="form-control" name="b_name">
                                            	<option value="0" disabled="true" selected="ture">--Select--</option>
    			                            	@foreach($brand as $brands)
    			                            		<option value="{{ $brands->id }}">{{ $brands->name }}
    			                            		</option>
    			                            	@endforeach
    	                        		    </select> 
                                            <small class="text-danger alert">{{ $errors->first('b_name') }}</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group {{ $errors->has('pur_price') ? ' has-error' : '' }}">
                                        <label for="pur_price" class="cols-sm-2 control-label">Purchase Price</label>
                                        <div class="cols-sm-10">
                                            <input type="text" name="pur_price" id="pur_price" class="form-control"  placeholder="Purchase Price..."/>
                                          <small class="text-danger alert">{{ $errors->first('pur_price') }}</small>
                                         </div>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group {{ $errors->has('cost') ? ' has-error' : '' }}">
                                        <label for="cost" class="cols-sm-2 control-label">Cost</label>
                                        <div class="cols-sm-10">
                                            <input type="text" name="cost" id="cost" class="form-control"  placeholder="Cost..."/>
                                          <small class="text-danger alert">{{ $errors->first('cost') }}</small>
                                         </div>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group {{ $errors->has('tax') ? ' has-error' : '' }}">
                                        <label for="tax" class="cols-sm-2 control-label">Tax</label>
                                        <div class="cols-sm-10">
                                            <input type="text" name="tax" id="tax" class="form-control"  placeholder="Tax..."/>
                                          <small class="text-danger alert">{{ $errors->first('tax') }}</small>
                                         </div>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group {{ $errors->has('discount') ? ' has-error' : '' }}">
                                        <label for="discount" class="cols-sm-2 control-label">Discount</label>
                                        <div class="cols-sm-10">
                                            <input type="text" name="discount" id="discount" class="form-control"  placeholder="Discount..."/>
                                          <small class="text-danger alert">{{ $errors->first('discount') }}</small>
                                         </div>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group {{ $errors->has('quantity') ? ' has-error' : '' }}">
                                        <label for="quantity" class="cols-sm-2 control-label">Quantity</label>
                                        <div class="cols-sm-10">
                                            <input type="text" name="quantity" id="quantity" class="form-control"  placeholder="Quantity..."/>
                                          <small class="text-danger alert">{{ $errors->first('quantity') }}</small>
                                         </div>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group {{ $errors->has('sale_price') ? ' has-error' : '' }}">
                                        <label for="sale_price" class="cols-sm-2 control-label">Sale Price</label>
                                        <div class="cols-sm-10">
                                            <input type="text" name="sale_price" id="sale_price" class="form-control"  placeholder="Sale Price..."/>
                                          <small class="text-danger alert">{{ $errors->first('sale_price') }}</small>
                                         </div>
                                    </div>
                                </div>
                            
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group {{ $errors->has('image') ? ' has-error' : '' }}">
                                        <label for="image" class="cols-sm-2 control-label">Image</label>
                                        <div class="cols-sm-10">
                                            <input type="file" name="image" id="image"  class="form-control"/>
                                          <small class="text-danger alert">{{ $errors->first('image') }}</small>
                                         </div>
                                    </div>
                                </div>
                                {{-- <div class="col-xs-6 col-sm-6 col-md-6">
                                	<div class="form-group">
    					                <label for="status">Status <span class="required">*</span></label>
    					                <br />
    					                <input id="status" name="status" type="radio" class="" value="1"  />
    					                <label for="tenant_status" class="">Product</label>
    
    					                <input id="status" name="status" type="radio" class="" value="0"  />
    					                <label for="status" class="">Package</label>
    				                </div>
                                </div> --}}
                            </div>
                        </div>
                        <div class="form-group" style="margin-left: 10%;">
							<input type="submit"  value="Submit" class="btn btn-success" style="margin-bottom: 50px;">
							<a href="{{ URL::route('products.index') }}" class="btn btn-warning btn-responsive" style="margin-bottom: 50px;">Cancel</a>
						</div>
                </form>
		    </div>
		</div>
	@endsection
