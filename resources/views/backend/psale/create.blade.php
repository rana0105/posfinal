@extends('layouts.app')
@section('content')
<link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css"
         rel = "stylesheet">

	<div class="col-md-12">
	    <div class="panel">
	        <div class="panel-heading">
               	<div class="panel-title text-left">
                    <h3 class="title">Sale Product</h3>
                    <hr />
                </div>
    		</div>
    		{{-- <div style="margin-right: 10px;">
	       			    <form class="navbar-form navbar-right" role="form" action="{{ url('products-search') }}" method="GET">
	                    <div class="form-group">
	                      <input type="text" class="form-control" placeholder="Input here.." name="search_tag">
	                    </div>
	                    <button type="submit" style="margin-top: -20px;" class="btn btn-primary">Search</button>
	                </form>
	                </div> --}}
    	    <form action="{{ route('psales.store') }}" method="POST" files="true" target="blank">
			{{ csrf_field() }}
            <div class="row">
            	<div class="col-md-7">
            	<div class="row">
		            <div class="col-xs-6 col-sm-6 col-md-6">
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
		            </div>
		       			<div class="col-xs-6 col-sm-6 col-md-6">
		                <div class="form-group {{ $errors->has('s_name') ? ' has-error' : '' }}">
		                    <label for="s_name" class="cols-sm-2 control-label">Search Product with Add</label>
		                    <div class="cols-sm-10">
		                        <select class="form-control livesearch productsearch" name="name" required="">
		                        	<option value="0" disabled="true" selected="ture">--Search Product with Add--</option>
		                        	@foreach($pro as $p)
		                        		<option id="productsearch" value="{{ $p->id }}">{{ $p->name }}
		                        		</option>
		                        	@endforeach
		            		    </select> 
		                        <small class="text-danger">{{ $errors->first('name') }}</small>
		                    </div>
		                </div>
		            </div>
		            <div class="col-xs-6 col-sm-6 col-md-6">
		                <div class="form-group {{ $errors->has('s_name') ? ' has-error' : '' }}">
		                    <label for="s_name" class="cols-sm-2 control-label">Search Package with Add</label>
		                    <div class="cols-sm-10">
		                        <select class="form-control livesearch productsearch" name="name" required="">
		                        	<option value="0" disabled="true" selected="ture">--Search Package with Add--</option>
		                        	@foreach($pacpro as $p)
		                        		<option id="productsearch" value="{{ $p->id }}">{{ $p->name }}
		                        		</option>
		                        	@endforeach
		            		    </select> 
		                        <small class="text-danger">{{ $errors->first('name') }}</small>
		                    </div>
		                </div>
		            </div>
	            </div>
					<div class="form-group">

		            	<label for="product" class="cols-sm-2 control-label">Add Product</label>
		                <div style="height: 300px; border: solid 2px #036d21; overflow-y: auto;">
					       	<table class="table table-responsive table-bordered">
					       		<thead>
					       			<th>Product</th>
					       			<th>Quantity</th>
					       			<th>UnitPrice</th>
					       			<th style="width: 100">Discount</th>
					       			<th>Vat%</th>
					       			<th style="width: 200">Sub Total</th>
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
	       		<div class="col-md-4">
	       			<div class="row">
	       			  <h5 style="text-align: center;"><b>Category of Product</b></h5>
	       				<div class="carousel slide" data-ride="carousel" data-type="multi" data-interval="" id="myCarousel">
					      <div class="carousel-inner">
					      @foreach($procates as $key => $procat)
					        <div class="item{{ $key == 0 ? ' active' : '' }}" style="margin: 1px;">

					          <div class="col-md-2 col-sm-6 col-xs-12">
					          
						          <div class="col-md-2 col-sm-6 col-xs-12 productCat" style="border: solid 2px #036d21; margin: 1px; height: 40px; width: 100px; background-color: #e5e5e5;">
						            <input type="hidden" name="" value="{{$procat->id}}" class="id">
						                    <b>{{ $procat->name }}</b>
			                       </div>
		                      
					          </div>  
					        </div>
					       @endforeach
					      </div>
					      <a class="left carousel-control" href="#myCarousel" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
					      <a class="right carousel-control" href="#myCarousel" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
					    </div>
	       				<div class="col-md-2 packageCat" style="border: solid 2px #036d21; margin: 1px; height: 40px; width: 100px; background-color: #e5e5e5;">
	       					<p class="packageCat"><b>Package</b></p>
	       				</div>
	       			</div>
	       			<div class="showProduct" style="margin-top: 15px;">
		       			@foreach($product as $products)
		       				<div class="col-md-2 productinfo text-center" style="border: solid 2px #036d21; margin: 2px; min-height: 50px;">
		   						<img src="{{asset('upload_file/resize_images/')}}/{{ $products->image }}" alt="" style="height: 40px; width: 40px;" />
								<p><b>{{ $products->sale_price }}</b></p>
								<input type="hidden" name="" value="{{$products->id}}" class="id">
							</div>
	                	@endforeach
	                	@foreach($pacates as $pacat)
                		<div class="col-md-2 text-left productinfo" style="border: solid 2px #036d21; margin: 2px; height: 72px; display:none;">
                			<p><b>{{ $pacat->name }}</b></p>
							<p><b>{{ $pacat->sale_price }}</b></p>
							<input type="hidden" name="" value="{{$pacat->id}}" class="id">
						</div>
						@endforeach
                	</div>
	       		</div>
       		</div>
		    <div class="form-group">
				<input type="submit"  value="Generate Invoice" class="btn btn-success" style="margin-bottom: 30px;">
				<a href="{{ URL::route('psales.create') }}" class="btn btn-warning btn-responsive" style="margin-bottom: 30px;">Reset</a>
			</div>
		</form>
	    </div>
	</div>
@endsection
