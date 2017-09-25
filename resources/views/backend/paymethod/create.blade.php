@extends('layouts.app')
	@section('content')
		<div class="col-md-8 col-md-offset-2">
		    <div class="panel">
		        <div class="panel-heading">
               <div class="panel-title text-left">
                    <h3 class="title">Payment Method</h3>
                    <hr />
                </div>
            </div>
            	<form action="{{ route('paymethods.store') }}" method="POST" enctype="multipart/form-data" files="true">
						{{ csrf_field() }}
                        <div class="row main">
	                       <div class="col-md-8 col-md-offset-2"> 
	                            <div class="col-xs-6 col-sm-6 col-md-6">
	                                <div class="form-group {{ $errors->has('pay_name') ? ' has-error' : '' }}">
	                                    <label for="pay_name" class="cols-sm-2 control-label">Paymethods Name</label>
	                                    <div class="cols-sm-10">
	                                        <input type="text" name="pay_name" id="pay_name" class="form-control"  placeholder="Paymethods Name..."/>
	                                      <small class="text-danger">{{ $errors->first('pay_name') }}</small>
	                                     </div>
	                                </div>
	                            </div>
	                            <div class="col-xs-6 col-sm-6 col-md-6">
	                                <div class="form-group">
	                                    <label for="status">Status <span class="required">*</span></label>
						                <br />
						                <input id="status" name="status" type="radio" class="" value="1"  />
						                <label for="status" class="">Active</label>

						                <input id="status" name="status" type="radio" class="" value="0"  />
						                <label for="status" class="">Inactive</label>
	                                </div>
	                            </div>
                            </div>
                        </div>
                        <div class="form-group" style="margin: 10%;">
							<input type="submit"  value="Submit" class="btn btn-success">
							<a href="{{ URL::route('paymethods.index') }}" class="btn btn-warning btn-responsive">Cancel</a>
						</div>
                </form>
		    </div>
		</div>
	@endsection
