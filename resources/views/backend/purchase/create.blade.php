@extends('layouts.app')
@section('content')
	<div class="col-md-12 col-offset-1">
	    <div class="panel">
	        	<div class="panel-heading">
           	<div class="panel-title text-left">
                <h3 class="title">Purchase Product</h3>
                <hr />
            </div>
		</div>
            <!--</div>-->
            <!--<div class="col-md-12">-->
            	<form action="{{ route('purchases.store') }}" method="POST" files="true">
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
        		            <div class="col-xs-6 col-sm-6 col-md-6">
        		                <div class="form-group {{ $errors->has('supplier_name') ? ' has-error' : '' }}">
        		                    <label for="supplier_name" class="cols-sm-2 control-label">Supplier</label>
        		                    <div class="cols-sm-10">
        		                        <select class="form-control" name="supplier_name">
        		                        	<option value="0" disabled="true" selected="ture">--Select--</option>
        		                        	@foreach($suppliers as $supplier)
        		                        		<option value="{{ $supplier->id }}">{{ $supplier->supplier_name }}
        		                        		</option>
        		                        	@endforeach
        		            		    </select> 
        		                        <small class="text-danger">{{ $errors->first('supplier_name') }}</small>
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
        					       			<th>Unit Price</th>
        					       			<th>PP Discount</th>
        					       			<th>Vat %</th>
        					       			<th>Sub Total</th>
        					       			<input type="hidden" id="pro" value="{{$product}}">
        									<th style="text-align: center;"><a  class="btn btn-success btn-sm addRow"  href="javascript:void(0)" ><i class="fa fa-plus-square fa-lg" aria-hidden="true"></i></a></th>
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
        					       				<td><input type="text" name="u_price[]" class="form-control u_price"></td>
        					       				<td><input type="text" name="in_dis[]" class="form-control in_dis"></td>
        					       				<td><input type="text" name="vat[]" class="form-control vat"></td>
        					       				<td><input type="text" name="s_total[]" class="form-control s_total"></td>
        					       				<td><a href="javascript:void(0)" class="btn btn-danger btn-sm remove"><i class="fa fa-times fa-lg" aria-hidden="true"></i></a></td>
        					       			</tr>
        					       		</tbody>
        				       		</table>
        			       		</div>
        		       		</div>
        	       		</div>
        	       		<div class="col-md-3">
        	       		<h5 style="text-align: center;"><b>Total Amount</b></h5>
        		       		<table class="table table-responsive table-bordered">
        			       		<tfoot>
        							<tr>
        			       				<td>Total</td>
        			       				<td><b class="total" id="total"></b></td>
        			       			</tr>
        			       			<tr>
        			       				<td>Total Discount</td>
        			       				<td><b class="discount"><input type="text" name="discount" class="form-control discount" id="discount_input"></b></td>
        			       			</tr>
        			       			<tr>
        			       				<td>Net Total</td>
        			       				<td><input type="text" readonly="" name="ntotal" id="ntotal" value="" class="form-control ntotal"></td>
        			       			</tr>
        			       			<tr>
        			       				<td>Payment</td>
        			       				<td><b class="payment"><input type="text" name="payment" class="form-control" id="payment_input"></b></td>
        			       			</tr>
        			       			<tr>
        			       				<td>Due</td>
        			       				<td><input type="text" name="due" readonly="" class="form-control due"></td>
        			       			</tr>
        			       		</tfoot>
        			       	</table>
        			    </div>
        		    </div>
        		    <div class="form-group" style="margin-left: 2%">
        				<input type="submit"  value="Submit" class="btn btn-success">
        				<a href="{{ URL::route('purchases.index') }}" class="btn btn-warning btn-responsive">Cancel</a>
        			</div>
        		</form>
	    </div>
	</div>
@endsection
