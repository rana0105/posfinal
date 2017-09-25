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
        	{!! Form::model( $excate, ['route' => ['excategories.update', $excate->id], 'files' => true, 'method' => 'PUT']) !!}
        	{{-- <form action="{{ route('companies.store') }}" method="POST"> --}}
					{{ csrf_field() }}
                    <div class="row main">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label for="type_name" class="cols-sm-2 control-label">Expense type</label>
                                    <div class="cols-sm-10">
                                        <input type="text" name="excate_name" id="excate_name" class="form-control"  value="{{ $excate->excate_name }}" />
                                      
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group" style="margin-left: 10%">
						<input type="submit"  value="Update" class="btn btn-success">
						<a href="{{ URL::route('excategories.index') }}" class="btn btn-warning btn-responsive">Cancel</a>
					</div>

            {{-- </form> --}}
            {!! Form::close() !!}
	    </div>
            	
    </div>
@endsection