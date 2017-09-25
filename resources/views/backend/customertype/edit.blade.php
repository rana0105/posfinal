@extends('layouts.app')

@section('content')
	<div class="col-md-8 col-md-offset-2">
	    <div class="panel">
	        <div class="panel-heading">
                   <div class="panel-title text-left">
                        <h3 class="title">Customer type</h3>
                        <hr />
                    </div>
                </div>
            <div class="container">
            	{!! Form::model( $type, ['route' => ['customertypes.update', $type->id], 'files' => true, 'method' => 'PUT']) !!}
            	{{-- <form action="{{ route('companies.store') }}" method="POST"> --}}
						{{ csrf_field() }}
                        <div class="row main">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label for="type_name" class="cols-sm-2 control-label">Customer type</label>
                                    <div class="cols-sm-10">
                                        <input type="text" name="type_name" id="type_name" class="form-control"  value="{{ $type->type_name }}" />
                                      
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
							<input type="submit"  value="Update" class="btn btn-success">
							<a href="{{ URL::route('customertypes.index') }}" class="btn btn-warning btn-responsive">Cancel</a>
						</div>

                {{-- </form> --}}
                {!! Form::close() !!}
            </div>
	    </div>
    </div>
@endsection