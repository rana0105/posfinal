@extends('layouts.app')

@section('content')
	<div class="col-md-8 col-md-offset-2">
	    <div class="panel">
	        <div class="panel-heading">
                   <div class="panel-title text-left">
                        <h3 class="title">Package Update</h3>
                        <hr />
                    </div>
                </div>
        	{!! Form::model( $product, ['route' => ['packages.update', $product->id], 'files' => true, 'method' => 'PUT']) !!}
				{{ csrf_field() }}
				<div class="row main">
	            	<div class="col-md-9">
			            <div class="col-xs-6 col-sm-6 col-md-6">
			                <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
			                    <label for="name" class="cols-sm-2 control-label">Package Name</label>
			                    <div class="cols-sm-10">
			                        <input type="text" name="name" id="name" readonly="" class="form-control"  value="{{ $product->name }}" />
			                      <small class="text-danger">{{ $errors->first('name') }}</small>
			                     </div>
			                </div>
			            </div>
			            <div class="col-xs-6 col-sm-6 col-md-6">
			                <div class="form-group {{ $errors->has('sale_price') ? ' has-error' : '' }}">
			                    <label for="sale_price" class="cols-sm-2 control-label">Price</label>
			                    <div class="cols-sm-10">
			                        <input type="text" name="sale_price" id="sale_price" readonly="" class="form-control"  value="{{ $product->sale_price }}" />
			                      <small class="text-danger">{{ $errors->first('sale_price') }}</small>
			                     </div>
			                </div>
			            </div>
			            <div class="col-xs-6 col-sm-6 col-md-6" style="margin-bottom: 3%;">
			             {{ Form::label('condition','Status *')}} <br/>
				         @if($product->actinact == '1')
				           {{Form::radio('actinact', '1', true, ['checked' => 'checked']) }} Active 
				           {{Form::radio('actinact', '0', false) }} Inactive
				           @else
				           {{Form::radio('actinact', '1', false) }}  Active 
				           {{Form::radio('actinact', '0', true, ['checked' => 'checked']) }} Inactive  
				         @endif
			            </div>
		       		</div>
			    </div>
                <div class="form-group" style="margin-left: 2%">
					<input type="submit"  value="Update" class="btn btn-success">
					<a href="{{ URL::route('packages.index') }}" class="btn btn-warning btn-responsive">Cancel</a>
				</div>

                {{-- </form> --}}
                {!! Form::close() !!}
	    </div>
            	
            </div>
@endsection