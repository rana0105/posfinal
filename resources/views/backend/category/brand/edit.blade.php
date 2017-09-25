@extends('layouts.app')
@section('content')
	<div class="col-md-8 col-md-offset-2">
	    <div class="panel">
	        <div class="panel-heading">
                <div class="panel-title text-left">
                    <h3 class="title">Brand update information</h3>
                    <hr />
                </div>
            </div>
            <div class="container">
            	{!! Form::model( $brand, ['route' => ['brands.update', $brand->id], 'files' => true, 'method' => 'PUT']) !!}
            	{{-- <form action="{{ route('companies.store') }}" method="POST"> --}}
						{{ csrf_field() }}
                        <div class="row main">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label for="name" class="cols-sm-2 control-label">Brand Name</label>
                                    <div class="cols-sm-10">
                                        <input type="text" name="name" id="name" class="form-control"  value="{{ $brand->name }}" />
                                      
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
							<input type="submit"  value="Update" class="btn btn-success">
							<a href="{{ URL::route('brands.index') }}" class="btn btn-warning btn-responsive">Cancel</a>
						</div>

                {{-- </form> --}}
                {!! Form::close() !!}
            </div>
	    </div>	
    </div>
@endsection