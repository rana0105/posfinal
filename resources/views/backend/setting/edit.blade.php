@extends('layouts.app')

@section('content')
	<div class="col-md-10 col-md-offset-1">
	    <div class="panel">
	        <div class="panel-heading">
                   <div class="panel-title text-left">
                        <h3 class="title">Setting Update</h3>
                        <hr />
                    </div>
                </div>
        	{!! Form::model( $setting, ['route' => ['settings.update', $setting->id], 'files' => true, 'method' => 'PUT']) !!}
        	{{-- <form action="{{ route('companies.store') }}" method="POST"> --}}
					{{ csrf_field() }}
						<div class="row main">
						    <div class="col-md-10 col-md-offset-1">
	                            <div class="col-xs-6 col-sm-6 col-md-6">
	                                <div class="form-group {{ $errors->has('shop_name') ? ' has-error' : '' }}">
	                                    <label for="shop_name" class="cols-sm-2 control-label">Shop Name</label>
	                                    <div class="cols-sm-10">
	                                        <input type="text" name="shop_name" id="shop_name" class="form-control"  value="{{ $setting->shop_name }}"/>
	                                      <small class="text-danger">{{ $errors->first('shop_name') }}</small>
	                                     </div>
	                                </div>
	                            </div>
	                            <div class="col-xs-6 col-sm-6 col-md-6">
	                                <div class="form-group {{ $errors->has('curen') ? ' has-error' : '' }}">
	                                    <label for="curen" class="cols-sm-2 control-label">Currency</label>
	                                    <div class="cols-sm-10">
	                                        <input type="text" name="curen" id="curen" class="form-control"  value="{{ $setting->curen }}"/>
	                                      <small class="text-danger">{{ $errors->first('curen') }}</small>
	                                     </div>
	                                </div>
	                            </div>
	                            <div class="col-xs-6 col-sm-6 col-md-6">
	                                <div class="form-group {{ $errors->has('taxvat') ? ' has-error' : '' }}">
	                                    <label for="taxvat" class="cols-sm-2 control-label">Tax/vat %</label>
	                                    <div class="cols-sm-10">
	                                        <input type="text" name="taxvat" id="taxvat" class="form-control"  value="{{ $setting->taxvat }}"/>
	                                      <small class="text-danger">{{ $errors->first('taxvat') }}</small>
	                                     </div>
	                                </div>
	                            </div>
	                            <div class="col-xs-6 col-sm-6 col-md-6">
	                                <div class="form-group {{ $errors->has('copy') ? ' has-error' : '' }}">
	                                    <label for="copy" class="cols-sm-2 control-label">Copyright</label>
	                                    <div class="cols-sm-10">
	                                        <input type="text" name="copy" id="copy" class="form-control"  value="{{ $setting->copy }}"/>
	                                      <small class="text-danger">{{ $errors->first('copy') }}</small>
	                                     </div>
	                                </div>
	                            </div>
                            
	                            <div class="col-xs-6 col-sm-6 col-md-6">
	                                <div class="form-group {{ $errors->has('logo') ? ' has-error' : '' }}">
	                                    <label for="logo" class="cols-sm-2 control-label">Logo</label>
	                                    <div class="cols-sm-10">
	                                        <input type="file" name="logo" id="logo" class="form-control"/>
	                                        <img src="{{asset('upload_file/resize_images/')}}/{{ $setting->logo }}" alt="" height="50" width="50" class="img-thumbnail" style ="margin-top:7px" style="float:right">
	                                      <small class="text-danger">{{ $errors->first('logo') }}</small>
	                                     </div>
	                                </div>
	                            </div>
                            </div>
                        </div>
                    <div class="form-group" style="margin-left: 10%;">
						<input type="submit"  value="Update" class="btn btn-success">
						<a href="{{ URL::route('settings.index') }}" class="btn btn-warning btn-responsive">Cancel</a>
					</div>

            {{-- </form> --}}
            {!! Form::close() !!}
	    </div>	
    </div>
@endsection