@extends('layouts.app')

@section('content')
	<div class="col-md-10 col-md-offset-1">
	    <div class="panel">
	        <div class="panel-heading">
                   <div class="panel-title text-left">
                        <h3 class="title">Customer Information Update</h3>
                        <hr />
                    </div>
                </div>
        	{!! Form::model( $product, ['route' => ['products.update', $product->id], 'files' => true, 'method' => 'PUT']) !!}
        	{{-- <form action="{{ route('companies.store') }}" method="POST"> --}}
					{{ csrf_field() }}
						<div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group {{ $errors->has('p_name') ? ' has-error' : '' }}">
                                <label for="p_name" class="cols-sm-2 control-label">Product Name</label>
                                <div class="cols-sm-10">
                                    <input type="text" name="p_name" id="p_name" class="form-control"  value="{{ $product->name }}" />
                                  <small class="text-danger">{{ $errors->first('p_name') }}</small>
                                 </div>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group {{ $errors->has('code') ? ' has-error' : '' }}">
                                <label for="code" class="cols-sm-2 control-label">Product Code</label>
                                <div class="cols-sm-10">
                                    <input type="text" name="code" id="code" class="form-control"  value="{{ $product->code }}"/>
                                  <small class="text-danger">{{ $errors->first('code') }}</small>
                                 </div>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="cols-sm-2 control-label">Bar Code</label>
                                <div class="cols-sm-10">
                                    <input type="text" name="bar_code" id="bar_code" class="form-control"  value="{{ $product->bar_code }}"/>
                                  <small class="text-danger">{{ $errors->first('bar_code') }}</small>
                                 </div>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group {{ $errors->has('c_name') ? ' has-error' : '' }}">
                                <label for="c_name" class="cols-sm-2 control-label">Category</label>
                                <div class="cols-sm-10">
                                    {{ Form::select('procategory_id', $procategories , null, ["class" => 'form-control'])}}
                                    <small class="text-danger">{{ $errors->first('c_name') }}</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group {{ $errors->has('b_name') ? ' has-error' : '' }}">
                                <label for="b_name" class="cols-sm-2 control-label">Brand</label>
                                <div class="cols-sm-10">
                                    {{ Form::select('brand_id', $brands , null, ["class" => 'form-control'])}}
                                    <small class="text-danger">{{ $errors->first('b_name') }}</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group {{ $errors->has('pur_price') ? ' has-error' : '' }}">
                                <label for="pur_price" class="cols-sm-2 control-label">Purchase Price</label>
                                <div class="cols-sm-10">
                                    <input type="text" name="pur_price" id="pur_price" class="form-control"  value="{{ $product->pur_price }}"/>
                                  <small class="text-danger">{{ $errors->first('pur_price') }}</small>
                                 </div>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group {{ $errors->has('cost') ? ' has-error' : '' }}">
                                <label for="cost" class="cols-sm-2 control-label">Cost</label>
                                <div class="cols-sm-10">
                                    <input type="text" name="cost" id="cost" class="form-control"  value="{{ $product->cost }}"/>
                                  <small class="text-danger">{{ $errors->first('cost') }}</small>
                                 </div>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group {{ $errors->has('tax') ? ' has-error' : '' }}">
                                <label for="tax" class="cols-sm-2 control-label">Tax</label>
                                <div class="cols-sm-10">
                                    <input type="text" name="tax" id="tax" class="form-control"  value="{{ $product->tax }}"/>
                                  <small class="text-danger">{{ $errors->first('tax') }}</small>
                                 </div>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group {{ $errors->has('discount') ? ' has-error' : '' }}">
                                <label for="discount" class="cols-sm-2 control-label">Discount</label>
                                <div class="cols-sm-10">
                                    <input type="text" name="discount" id="discount" class="form-control"  value="{{ $product->discount }}"/>
                                  <small class="text-danger">{{ $errors->first('discount') }}</small>
                                 </div>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group {{ $errors->has('quantity') ? ' has-error' : '' }}">
                                <label for="quantity" class="cols-sm-2 control-label">Quantity</label>
                                <div class="cols-sm-10">
                                    <input type="text" name="quantity" id="quantity" class="form-control"  value="{{ $product->quantity }}"/>
                                  <small class="text-danger">{{ $errors->first('quantity') }}</small>
                                 </div>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group {{ $errors->has('sale_price') ? ' has-error' : '' }}">
                                <label for="sale_price" class="cols-sm-2 control-label">Sale Price</label>
                                <div class="cols-sm-10">
                                    <input type="text" name="sale_price" id="sale_price" class="form-control"  value="{{ $product->sale_price }}"/>
                                  <small class="text-danger">{{ $errors->first('sale_price') }}</small>
                                 </div>
                            </div>
                        </div>
                        
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group {{ $errors->has('image') ? ' has-error' : '' }}">
                                <label for="image" class="cols-sm-2 control-label">Image</label>
                                <div class="cols-sm-10">
                                    <input type="file" name="image" id="image" class="form-control"/>
                                    <img src="{{asset('upload_file/resize_images/')}}/{{ $product->image }}" alt="" height="50" width="50" class="img-thumbnail" style ="margin-top:7px" style="float:right">
                                  <small class="text-danger">{{ $errors->first('image') }}</small>
                                 </div>
                            </div>
                        </div>
                        {{-- <div class="col-xs-6 col-sm-6 col-md-6">
                        	<div class="form-group">
						       {{ Form::label('status','Status *')}} <br/>
						         @if($product->status == '1')
						           {{Form::radio('status', '1', true, ['checked' => 'checked']) }} Product 
						           {{Form::radio('status', '0', false) }} Package
						           @else
						           {{Form::radio('status', '1', false) }}  Product 
						           {{Form::radio('status', '0', true, ['checked' => 'checked']) }} Package  
						         @endif
						    </div>
                        </div>  --}}
                    <div class="form-group" style="margin-left: 2%;">
						<input type="submit"  value="Update" class="btn btn-success" style="margin-bottom: 50px;">
						<a href="{{ URL::route('products.index') }}" class="btn btn-warning btn-responsive" style="margin-bottom: 50px;">Cancel</a>
					</div>

            {{-- </form> --}}
            {!! Form::close() !!}
	    </div>
            	
    </div>
@endsection