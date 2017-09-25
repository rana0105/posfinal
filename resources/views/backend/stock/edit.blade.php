@extends('layouts.app')

@section('content')
	<div class="col-md-8 col-md-offset-2">
	    <div class="panel">
	        <div class="panel-heading">
                   <div class="panel-title text-left">
                        <h3 class="title">Stock</h3>
                        <hr />
                    </div>
                </div>
        	{!! Form::model( $stocks, ['route' => ['stocks.update', $stocks->id], 'files' => true, 'method' => 'PUT']) !!}
        	{{-- <form action="{{ route('companies.store') }}" method="POST"> --}}
			{{ csrf_field() }}
            <div class="row main">
                <div class="col-md-10 col-md-offset-1">
    				<div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="cols-sm-2 control-label">Product</label>
                            <div class="cols-sm-10">
                                {{ Form::select('product_id', $prods , null, ["class" => 'form-control'])}}
                                <small class="text-danger">{{ $errors->first('name') }}</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group {{ $errors->has('quantity') ? ' has-error' : '' }}">
                            <label for="quantity" class="cols-sm-2 control-label">Quantity</label>
                            <div class="cols-sm-10">
                                <input type="text" name="quantity" id="	quantity" class="form-control"  value="{{ $stocks->quantity }}"/>
                              <small class="text-danger">{{ $errors->first('quantity') }}</small>
                             </div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group {{ $errors->has('unit_price') ? ' has-error' : '' }}">
                            <label for="unit_price" class="cols-sm-2 control-label">Unit Price</label>
                            <div class="cols-sm-10">
                                <input type="text" name="unit_price" id="unit_price" class="form-control"  value="{{ $stocks->unit_price }}"/>
                              <small class="text-danger">{{ $errors->first('unit_price') }}</small>
                             </div>
                        </div>
                    </div>
                </div>
            </div>
             	<div class="form-group" style="margin-left: 10%">
					<input type="submit"  value="Update" class="btn btn-success">
					<a href="{{ URL::route('stocks.index') }}" class="btn btn-warning btn-responsive">Cancel</a>
				</div>

            {{-- </form> --}}
            {!! Form::close() !!}
	    </div>
    </div>
@endsection