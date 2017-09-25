@extends('layouts.app')
	@section('content')
			<div class="col-md-10 col-md-offset-1">
			    <div class="panel">
			        <div class="panel-heading">
                   <div class="panel-title text-left">
                        <h3 class="title">Setting</h3>
                        <hr />
                    </div>
                </div>
                	<form action="{{ route('settings.store') }}" method="POST" enctype="multipart/form-data" files="true">
							{{ csrf_field() }}
	                        <div class="row main">
		                        <div class="col-md-10 col-md-offset-1">
    	                            {{-- <div class="col-xs-6 col-sm-6 col-md-6">
    	                                <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
    	                                    <label for="name" class="cols-sm-2 control-label">Name</label>
    	                                    <div class="cols-sm-10">
    	                                        <input type="text" name="name" id="name" class="form-control"  placeholder="Name..."/>
    	                                      <small class="text-danger">{{ $errors->first('name') }}</small>
    	                                     </div>
    	                                </div>
    	                            </div> --}}
    	                            <div class="col-xs-6 col-sm-6 col-md-6">
    	                                <div class="form-group {{ $errors->has('shop_name') ? ' has-error' : '' }}">
    	                                    <label for="shop_name" class="cols-sm-2 control-label">Shop Name</label>
    	                                    <div class="cols-sm-10">
    	                                        <input type="text" name="shop_name" id="shop_name" class="form-control"  placeholder="Shop Name..."/>
    	                                      <small class="text-danger">{{ $errors->first('shop_name') }}</small>
    	                                     </div>
    	                                </div>
    	                            </div>
    	                            <div class="col-xs-6 col-sm-6 col-md-6">
    	                                <div class="form-group {{ $errors->has('curen') ? ' has-error' : '' }}">
    	                                    <label for="curen" class="cols-sm-2 control-label">Curency</label>
    	                                    <div class="cols-sm-10">
    	                                        <input type="text" name="curen" id="curen" class="form-control"  placeholder="Curency..."/>
    	                                      <small class="text-danger">{{ $errors->first('curen') }}</small>
    	                                     </div>
    	                                </div>
    	                            </div>
    	                            <div class="col-xs-6 col-sm-6 col-md-6">
    	                                <div class="form-group {{ $errors->has('taxvat') ? ' has-error' : '' }}">
    	                                    <label for="taxvat" class="cols-sm-2 control-label">Tax/Vat %</label>
    	                                    <div class="cols-sm-10">
    	                                        <input type="text" name="taxvat" id="taxvat" class="form-control"  placeholder="Tax/Vat %"/>
    	                                      <small class="text-danger">{{ $errors->first('taxvat') }}</small>
    	                                     </div>
    	                                </div>
    	                            </div>
    
    	                            <div class="col-xs-6 col-sm-6 col-md-6">
    	                                <div class="form-group {{ $errors->has('copy') ? ' has-error' : '' }}">
    	                                    <label for="copy" class="cols-sm-2 control-label">Copyright</label>
    	                                    <div class="cols-sm-10">
    	                                        <input type="text" name="copy" id="copy" class="form-control"  placeholder="Copyright"/>
    	                                      <small class="text-danger">{{ $errors->first('copy') }}</small>
    	                                     </div>
    	                                </div>
    	                            </div>
                                
    	                            <div class="col-xs-6 col-sm-6 col-md-6">
    	                                <div class="form-group {{ $errors->has('Customerimage') ? ' has-error' : '' }}">
    	                                    <label for="logo" class="cols-sm-2 control-label">Logo</label>
    	                                    <div class="cols-sm-10">
    	                                        <input type="file" name="logo" id="logo" class="form-control"/>
    	                                      <small class="text-danger">{{ $errors->first('logo') }}</small>
    	                                     </div>
    	                                </div>
    	                            </div>
	                            </div>
                            </div>
	                       
	                        <div class="form-group" style="margin-left: 10%;">
								<input type="submit"  value="Submit" class="btn btn-success">
								<a href="{{ URL::route('settings.index') }}" class="btn btn-warning btn-responsive">Cancel</a>
							</div>
	                </form>
			    </div>
			</div>
	@endsection
