@extends('layouts.app')

@section('content')
	<div class="col-md-12">
	    <div class="panel">
	        <div class="panel-heading">
           	<div class="panel-title text-left">
                <h3 class="title">Outlet</h3>
                <hr/>
                <form action="{{ url('reportoutlet') }}" method="POST" files="true" target="blank">
                {{ csrf_field() }}
                <div class="row">
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
                </div>
                	
                <div class="row">
                	<div class="col-md-2">
		               <button type="submit" class="btn btn-primary btn-block">Submit</button>
		            </div>
                </div>     
                </form>
                	
            </div>  
        </div>
	    </div>
    </div>

    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading">
           	<div class="panel-title text-left">
                <h3 class="title">Outlet and Counter</h3>
                <hr/>
                <form action="{{ url('salereportoutlet') }}" method="POST" files="true" target="blank">
                {{ csrf_field() }}
                <div class="row">
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
                </div>
                	
                <div class="row">
                	<div class="col-md-2">
		               <button type="submit" class="btn btn-primary btn-block">Submit</button>
		            </div>
                </div>     
                </form>
                	
            </div>  
        </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading">
           	<div class="panel-title text-left">
                <h3 class="title">Show Invoice</h3>
                <hr/>
                <form action="{{ url('showInvoice') }}" method="POST" files="true" target="blank">
                {{ csrf_field() }}
                <div class="row">
                	<div class="col-xs-4 col-sm-4 col-md-4">
		                <div class="form-group {{ $errors->has('out_name') ? ' has-error' : '' }}">
		                    <label for="out_name" class="cols-sm-2 control-label">Input Slae No.</label>
		                    <div class="cols-sm-6">
		                        <input type="text" class="form-control saleoutlet" name="saleid" placeholder="Input Sale Id/No...">
		                      <small class="text-danger">{{ $errors->first('out_name') }}</small>
		                     </div>
		                </div>
		            </div>
                </div>            	
                <div class="row">
                	<div class="col-md-2" style="margin-bottom: 3%">
		               <button type="submit" class="btn btn-primary btn-block">Submit</button>
		            </div>
                </div>     
                </form>
                	
            </div>  
        </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading">
           	<div class="panel-title text-left">
                <h3 class="title">Date Wise Total Sale Report</h3>
                <hr/>
                <form action="{{ url('saleAmount') }}" method="POST" files="true" target="blank">
                {{ csrf_field() }}
                <div class="row">
		            <div class="col-xs-4 col-sm-4 col-md-4">
		                <div class="form-group {{ $errors->has('date') ? ' has-error' : '' }}">
		                    <label for="date" class="cols-sm-2 control-label">From Date</label>
		                    <div class="cols-sm-6">
		                        <input type="date" name="datefrom" class="form-control"/>
		                      <small class="text-danger">{{ $errors->first('date') }}</small>
		                     </div>
		                </div>
		            </div>
		            <div class="col-xs-4 col-sm-4 col-md-4">
		                <div class="form-group {{ $errors->has('date') ? ' has-error' : '' }}">
		                    <label for="date" class="cols-sm-2 control-label">To Date</label>
		                    <div class="cols-sm-6">
		                        <input type="date" name="dateto" class="form-control" />
		                      <small class="text-danger">{{ $errors->first('date') }}</small>
		                     </div>
		                </div>
		            </div>
                </div>            	
                <div class="row">
                	<div class="col-md-2" style="margin-bottom: 3%">
		               <button type="submit" class="btn btn-primary btn-block">Submit</button>
		            </div>
                </div>     
                </form>
                	
            </div>  
        </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading">
           	<div class="panel-title text-left">
                <h3 class="title">Date Wise Outlet Report</h3>
                <hr/>
                <form action="{{ url('saleOutlet') }}" method="POST" files="true" target="blank">
                {{ csrf_field() }}
                <div class="row">
                	<div class="col-xs-4 col-sm-4 col-md-4">
		                <div class="form-group {{ $errors->has('out_name') ? ' has-error' : '' }}">
		                    <label for="out_name" class="cols-sm-2 control-label">Outlet</label>
		                    <div class="cols-sm-6">
		                        <select class="form-control saleoutlet" name="outlet" >
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
		                        <input type="date" name="datefrom" class="form-control"/>
		                      <small class="text-danger">{{ $errors->first('date') }}</small>
		                     </div>
		                </div>
		            </div>
		            <div class="col-xs-4 col-sm-4 col-md-4">
		                <div class="form-group {{ $errors->has('date') ? ' has-error' : '' }}">
		                    <label for="date" class="cols-sm-2 control-label">To Date</label>
		                    <div class="cols-sm-6">
		                        <input type="date" name="dateto" class="form-control" />
		                      <small class="text-danger">{{ $errors->first('date') }}</small>
		                     </div>
		                </div>
		            </div>
                </div>            	
                <div class="row">
                	<div class="col-md-2" style="margin-bottom: 3%">
		               <button type="submit" class="btn btn-primary btn-block">Submit</button>
		            </div>
                </div>     
                </form>
                	
            </div>  
        </div>
        </div>
    </div>
@endsection