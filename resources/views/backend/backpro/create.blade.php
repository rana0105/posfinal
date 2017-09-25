@extends('layouts.app')
@section('content')
	<div class="col-md-10 col-md-offset-1">
	    <div class="panel">
	        <div class="panel-heading">
           	<div class="panel-title text-left">
                <h3 class="title">Return Product</h3>
                <hr />
            </div>
		</div>
    	    <form action="{{ route('backproducts.store') }}" method="POST" files="true">
			{{ csrf_field() }}
            <div class="row main">
            	<div class="col-md-9">
            		<div class="col-xs-6 col-sm-6 col-md-6">
		                <div class="form-group {{ $errors->has('date') ? ' has-error' : '' }}">
		                    <label for="date" class="cols-sm-2 control-label">Date</label>
		                    <div class="cols-sm-10">
		                        <input type="date" name="date" id="date" class="form-control"  placeholder="Product Name..."/>
		                      <small class="text-danger">{{ $errors->first('date') }}</small>
		                     </div>
		                </div>
		            </div>
					<div class="form-group">
		            	{{-- <label for="product" class="cols-sm-2 control-label">Back Product</label> --}}
		                <div class="col-lg-12 col-sm-12">
					       	<table class="table table-responsive table-bordered">
					       		<thead>
					       			<th>Product Type</th>
					       			<th>Quantity</th>
					       			{{-- <th>Unit Price</th> --}}
					       			<input type="hidden" id="bpro" value="{{$product}}">
									<th style="text-align: center;"><a  class="btn btn-success btn-sm addRowback"  href="javascript:void(0)" ><i class="fa fa-plus-square fa-lg" aria-hidden="true"></i></a></th>
					       		</thead>
					       		<tbody>
					       			<tr>
					       				<td style="width: 250px;">
					       					<select class="livesearch form-control"  name="name[]" style="height: 34px;">
		                                    	<option value="0" disabled="trform-controlue" selected="ture">--Select--</option>
				                            	@foreach($product as $products)
				                            		<option value="{{ $products->id }}">{{ $products->name }}
				                            		</option>
				                            	@endforeach
		                        		    </select>
					       				</td>
					       				<td><input type="text" name="qtn[]" class="form-control qtn"></td>
					       				{{-- <td><input type="text" name="u_price[]" class="form-control u_price"></td> --}}
					       				<td><a href="javascript:void(0)" class="btn btn-danger btn-sm remove"><i class="fa fa-times fa-lg" aria-hidden="true"></i></a></td>
					       			</tr>
					       		</tbody>
				       		</table>
			       		</div>
		       		</div>
	       		</div>
		    </div>
		    <div class="form-group" style="margin-left: 2%">
				<input type="submit"  value="Submit" class="btn btn-success" style="margin-bottom: 3%">
			</div>
		</form>
	    </div>
	</div>
@endsection
