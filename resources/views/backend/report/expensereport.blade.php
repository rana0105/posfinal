@extends('layouts.app')

@section('content')
	<div class="col-md-12">
	    <div class="panel">
	        <div class="panel-heading">
           	<div class="panel-title text-left">
                <h3 class="title">Expense Report</h3>
                <hr/>
                	<div class="col-xs-4 col-sm-4 col-md-4">
		                <div class="form-group {{ $errors->has('out_name') ? ' has-error' : '' }}">
		                    <label for="out_name" class="cols-sm-2 control-label">Outlet</label>
		                    <div class="cols-sm-6">
		                        <select class="livesearch form-control exoutlet" id="exoutlet" >
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
		                <div class="form-group {{ $errors->has('date') ? ' has-error' : '' }}">
		                    <label for="date" class="cols-sm-2 control-label">From Date</label>
		                    <div class="cols-sm-6">
		                        <input type="date" name="datform" id="datform" class="form-control"/>
		                      <small class="text-danger">{{ $errors->first('date') }}</small>
		                     </div>
		                </div>
		            </div>
		            <div class="col-xs-4 col-sm-4 col-md-4">
		                <div class="form-group {{ $errors->has('date') ? ' has-error' : '' }}">
		                    <label for="date" class="cols-sm-2 control-label">To Date</label>
		                    <div class="cols-sm-6">
		                        <input type="date" name="datdto" id="datdto" class="form-control" />
		                      <small class="text-danger">{{ $errors->first('date') }}</small>
		                     </div>
		                </div>
		            </div>
		            <div class="col-xs-4 col-sm-3 col-md-2" style="margin-top: 0;">
			            <div class="form-group">
			            	<label for="date" class="cols-sm-2 control-label"></label>
		                    <div class="cols-sm-4">

							<input type="submit"  value="Submit" class="btn btn-primary btn-block exsubmit" id="pur-report">
							</div>
						</div>
					</div>
					<table class="table table-striped table-responsive" >
                	<thead>
            			<th>Outlet</th>
            			<th>Date</th>
            			<th>Total Amount</th>
            		</thead>
                	<tbody id="exdatashow">
						 @foreach($expe as $ex)
						 	<tr class="pur-amount">
								<td>{{ $ex->outlets->out_name }}</td>
								<td>{{ $ex->ex_date }}</td>
								<td>{{ $ex->ex_amount }}</td>
							</tr>
						@endforeach
                	</tbody>
                </table>
                <div class="text-center" style="margin-bottom: 3%;">
	            {{ $expe->links() }}
	    		</div>
            </div>
        </div>
	    </div>
    </div>
@endsection