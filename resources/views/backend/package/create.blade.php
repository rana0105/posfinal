@extends('layouts.app')
@section('content')
	<div class="col-md-12 col-offset-1">
	    <div class="panel">
	        <div class="panel-heading">
	           	<div class="panel-title text-left">
	                <h3 class="title">Package Create for Product</h3>
	                <hr />
	            </div>
            </div>
    	    <form action="{{ route('packages.store') }}" method="POST" files="true">
				{{ csrf_field() }}
	            <div class="row main">
	            	<div class="col-md-9">
			            <div class="col-xs-6 col-sm-6 col-md-6">
			                <div class="form-group {{ $errors->has('date') ? ' has-error' : '' }}">
			                    <label for="date" class="cols-sm-2 control-label">Date</label>
			                    <div class="cols-sm-10">
			                        <input type="date" name="date" id="date" class="form-control"  placeholder="Date..."/>
			                      <small class="text-danger">{{ $errors->first('date') }}</small>
			                     </div>
			                </div>
			            </div>
			            <div class="col-xs-6 col-sm-6 col-md-6">
			                <div class="form-group {{ $errors->has('pakage_name') ? ' has-error' : '' }}">
			                    <label for="pakage_name" class="cols-sm-2 control-label">Package Name</label>
			                    <div class="cols-sm-10">
			                        <input type="text" name="pakage_name" id="pakage_name" class="form-control"  placeholder="Enter Package Name.." required="" />
			                      <small class="text-danger">{{ $errors->first('pakage_name') }}</small>
			                     </div>
			                </div>
			            </div>
						<div class="form-group">
			            	<label for="product" class="cols-sm-2 control-label">Add Product</label>
			                <div class="col-lg-12 col-sm-12">
						       	<table class="table table-responsive table-bordered">
						       		<thead>
						       			<th>Product Type</th>
						       			<th>Quantity</th>
						       			<input type="hidden" id="ppro" value="{{$product}}">
										<th style="text-align: center;"><a  class="btn btn-success btn-sm pacAdd"  href="javascript:void(0)" ><i class="fa fa-plus-square fa-lg" aria-hidden="true"></i></a></th>
						       		</thead>
						       		<tbody>
						       			<tr>
						       				<td style="width: 250px;">
						       					<select class="livesearch form-control"  name="pname[]" style="height: 34px;">
			                                    	<option value="0" disabled="trform-controlue" selected="ture">--Select--</option>
					                            	@foreach($product as $products)
					                            		<option value="{{ $products->id }}">{{ $products->name }}
					                            		</option>
					                            	@endforeach
			                        		    </select>
						       				</td>
						       				<td><input type="text" name="pqtn[]" class="form-control pqtn"></td>
						       				<td><a href="javascript:void(0)" class="btn btn-danger btn-sm remove"><i class="fa fa-times fa-lg" aria-hidden="true"></i></a></td>
						       			</tr>
						       		</tbody>
					       		</table>
				       		</div>
			       		</div>
		       		</div>
		       		<div class="col-md-3">
		       			<h5 style="text-align: center;"><b>Package Price</b></h5>
			       		<table class="table table-responsive table-bordered">
				       		<tfoot>
				       				<td><input type="text" name="pat_price" id="pat_price" value="" class="form-control pat_price"></td>
				       		</tfoot>
				       	</table>
				    </div>
			    </div>
				    <div class="form-group" style="margin-bottom: 2%; margin-left: 2%">
						<input type="submit"  value="Submit" class="btn btn-success">
						<a href="{{ URL::route('packages.index') }}" class="btn btn-warning btn-responsive">Cancel</a>
					</div>
			</form>
	    </div>
	</div>
@endsection
