@extends('layouts.app')
@section('content')
<link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css"
         rel = "stylesheet">

	<div class="col-md-12 col-offset-1">
    	<div class="panel-heading">
           	<div class="panel-title text-left">
                <h3 class="title">Sale Package</h3>
                <hr />
            </div>
		</div>
    </div>
    <div class="col-md-12">
    	<form action="{{ route('packagesales.store') }}" method="POST" files="true" target="blank">
			{{ csrf_field() }}
            <div class="row">
            	<div class="col-md-7">
		            {{-- <div class="col-xs-6 col-sm-6 col-md-6">
		                <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
		                    <label for="name" class="cols-sm-2 control-label">Customer</label>
		                    <div class="cols-sm-10">
		                        <select class="form-control livesearch" name="c_name" required="">
		                        	<option value="0" disabled="true" selected="ture">--Select--</option>
		                        	@foreach($customers as $customer)
		                        		<option value="{{ $customer->id }}">{{ $customer->name }}
		                        		</option>
		                        	@endforeach
		            		    </select> 
		                        <small class="text-danger">{{ $errors->first('c_name') }}</small>
		                    </div>
		                </div>
		            </div>
		            <div class="col-xs-6 col-sm-6 col-md-6">
		                <div class="form-group {{ $errors->has('s_name') ? ' has-error' : '' }}">
		                    <label for="s_name" class="cols-sm-2 control-label">Waiter</label>
		                    <div class="cols-sm-10">
		                        <select class="form-control livesearch" name="s_name" required="">
		                        	<option value="0" disabled="true" selected="ture">--Select--</option>
		                        	@foreach($suppliers as $supplier)
		                        		<option value="{{ $supplier->id }}">{{ $supplier->supplier_name }}
		                        		</option>
		                        	@endforeach
		            		    </select> 
		                        <small class="text-danger">{{ $errors->first('s_name') }}</small>
		                    </div>
		                </div>
		            </div> --}}

					<div class="form-group">
		            	<label for="product" class="cols-sm-2 control-label">Add Package</label>
		                <div class="col-lg-12 col-sm-12" style="height: 300px; border: solid 2px #036d21; overflow-y: scroll;">
					       	<table class="table table-responsive table-bordered">
					       		<thead>
					       			<th>Package</th>
					       			<th>Quantity</th>
					       			<th>UnitPrice</th>
					       		</thead>
					       		<tbody class="cahange" id="sale-table">

					       		
                                </tbody>
				       		</table>
				       		
			       		</div>
		       		</div>
		       		<div>
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
	       		<div class="col-md-5">
	       			<div class="row">
	       				@foreach($pacates as $pacat)
			       			<div class="col-md-2 productCat" style="border: solid 2px #ec97ef; margin: 1px; height: 40px; width: 100px; background-color: #76d5e0;">
			       				<input type="hidden" name="" value="{{$pacat->id}}" class="id">
			       				{{ $pacat->pac_name }}
			       			</div>
	       				@endforeach
	       			</div>
	       			{{-- <div class="showProduct" style="margin-top: 15px;">
		       			@foreach($product as $products)
		       				<div class="col-md-2 productinfo text-center" style="border: solid 2px #036d21; margin: 2px; min-height: 50px;">
		   						<img src="{{asset('upload_file/resize_images/')}}/{{ $products->image }}" alt="" style="height: 40px; width: 50px;" />
								<p><b>{{ $products->sale_price }}</b></p>
								<input type="hidden" name="" value="{{$products->id}}" class="id">
							</div>
	                	@endforeach
                	</div> --}}
	       		</div>
	       		
       		</div>
		    <div class="form-group">
				<input type="submit"  value="Generate Invoice" class="btn btn-success" style="margin-bottom: 30px;">
				<a href="{{ URL::route('packagesales.create') }}" class="btn btn-warning btn-responsive" style="margin-bottom: 30px;">Cancel</a>
			</div>
		</form>
	</div>

@endsection
