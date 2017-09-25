@extends('layouts.app')

@section('content')
	<div class="col-md-12">
	    <div class="panel">
	        <div class="panel-heading">
           	<div class="panel-title text-left">
                <h3 class="title">Purchase Report</h3> 
                <hr/>
                
                	<div class="col-xs-4 col-sm-4 col-md-4">
		                <div class="form-group {{ $errors->has('date') ? ' has-error' : '' }}">
		                    <label for="date" class="cols-sm-2 control-label">From Date</label>
		                    <div class="cols-sm-6">
		                        <input type="date" name="dateform" id="dateform" class="form-control"  placeholder="Product Name..."/>
		                      <small class="text-danger">{{ $errors->first('date') }}</small>
		                     </div>
		                </div>
		            </div>
		            <div class="col-xs-4 col-sm-4 col-md-4">
		                <div class="form-group {{ $errors->has('date') ? ' has-error' : '' }}">
		                    <label for="date" class="cols-sm-2 control-label">To Date</label>
		                    <div class="cols-sm-6">
		                        <input type="date" name="dateto" id="dateto" class="form-control"  placeholder="Product Name..."/>
		                      <small class="text-danger">{{ $errors->first('date') }}</small>
		                     </div>
		                </div>
		            </div>
		            <div class="col-xs-4 col-sm-4 col-md-4" style="margin-top: 0;">
			            <div class="form-group">
			            	<label for="date" class="cols-sm-2 control-label"></label>
		                    <div class="cols-sm-6">

							<input type="submit"  value="Submit" class="btn btn-primary submit" id="pur-report">
							</div>
						</div>
					</div>
					<table class="table table-striped table-responsive" >
                	<thead>
            			<th>Date</th>
            			<th>Total Amount</th>
            			<th>Total Discount</th>
            			<th>Due</th>
            		</thead>
                	<tbody id="showdata">
						 @foreach($purchases as $purchase)
						 	<tr class="pur-amount">
								<td>{{ $purchase->date }}</td>
								<td>{{ $purchase->total_amount }}</td>
								<td>{{ $purchase->t_discount }}</td>
								<td>{{ $purchase->due }}</td>
							</tr>
						@endforeach
                	</tbody>
                </table>
                <div class="text-center" style="margin-bottom: 3%;">
	            {{ $purchases->links() }}
	    		</div>
            </div>
        </div>
	    </div>
    </div>
@endsection