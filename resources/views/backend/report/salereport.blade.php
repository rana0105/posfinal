@extends('layouts.app')

@section('content')
	<div class="col-md-12">
    	<div class="panel-heading">
           	<div class="panel-title text-left">
                <h3 class="title">Sales Report</h3>
                <hr/>
                	<div class="col-xs-4 col-sm-4 col-md-4">
		                <div class="form-group {{ $errors->has('out_name') ? ' has-error' : '' }}">
		                    <label for="out_name" class="cols-sm-2 control-label">Outlet</label>
		                    <div class="cols-sm-6">
		                        <select class="form-control saleoutlet" id="saleoutlet" name="saleoutlet" >
		                        <option>--Select--</option>
		                        @foreach($outlet as $out)
		                        	<option value="{{ $out->id }}">
		                        	{{ $out->out_name }}
		                        	</option>
	                        	@endforeach
		                        </select>
		                      <small class="text-danger">{{ $errors->first('out_name') }}</small>
		                     </div>
		                </div>
		            </div>
		            <div class="col-xs-4 col-sm-4 col-md-4">
		                <div class="form-group {{ $errors->has('counter') ? ' has-error' : '' }}">
		                    <label for="counter" class="cols-sm-2 control-label">Counter No.</label>
		                    <div class="cols-sm-6">
		                        <select class="form-control counter" name="counter" id="counter">
							       <option value="">--Select Counter No.--</option>
							       <option value="One">One</option>
							       <option value="Two">Two</option>
							       <option value="Three">Three</option>
							       <option value="Four">Four</option>
							       <option value="Five">Five</option>
							       <option value="Six">Six</option>
							       <option value="Seven">Seven</option>
							       <option value="Eight">Eight</option>
							       <option value="Nine">Nine</option>
							       <option value="Ten">Ten</option>
							    </select>
		                      <small class="text-danger">{{ $errors->first('counter') }}</small>
		                     </div>
		                </div>
		            </div>
                	<div class="col-xs-4 col-sm-4 col-md-4">
		                <div class="form-group {{ $errors->has('date') ? ' has-error' : '' }}">
		                    <label for="date" class="cols-sm-2 control-label">From Date</label>
		                    <div class="cols-sm-6">
		                        <input type="date" name="dform" id="dform" class="form-control"/>
		                      <small class="text-danger">{{ $errors->first('date') }}</small>
		                     </div>
		                </div>
		            </div>
		            <div class="col-xs-4 col-sm-4 col-md-4">
		                <div class="form-group {{ $errors->has('date') ? ' has-error' : '' }}">
		                    <label for="date" class="cols-sm-2 control-label">To Date</label>
		                    <div class="cols-sm-6">
		                        <input type="date" name="dto" id="dto" class="form-control" />
		                      <small class="text-danger">{{ $errors->first('date') }}</small>
		                     </div>
		                </div>
		            </div>
		            <div class="col-xs-4 col-sm-4 col-md-4" style="margin-top: 0;">
			            <div class="form-group">
			            	<label for="date" class="cols-sm-2 control-label"></label>
		                    <div class="cols-sm-6">

							<input type="submit"  value="Submit" class="btn btn-success ssubmit" id="pur-report">
							</div>
						</div>
					</div>
					<table class="table table-striped table-responsive" >
                	<thead>
            			<th>ID</th>
            			<th>Date</th>
            			<th>Total Amount</th>
            			<th>Total Discount</th>
            			<th>Due</th>
            			<th>Created Invoice</th>
            		</thead>
                	<tbody id="datashow">
						 @foreach($sales as $sale)
						 	<tr class="pur-amount">
								<td>{{ $sale->id }}</td>
								<td>{{ date("Y-m-d", strtotime($sale->created_at)) }}</td>
								<td>{{ $sale->stotal_amount }}</td>
								<td>{{ $sale->st_discount }}</td>
								<td>{{ $sale->sdue }}</td>
								<td>{{ $sale->users->name }}</td>
							</tr>
						@endforeach
                	</tbody>
                </table>
                <div class="text-center" style="margin-bottom: 3%;">
	            {{ $sales->links() }}
	    		</div>
            </div>  
        </div>
    </div>
    
@endsection