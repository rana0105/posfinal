@extends('layouts.app')

@section('content')
	<div class="col-md-10 col-offset-2">
            	<div class="panel-heading">
                   <div class="panel-title text-left">
                        <h3 class="title">Permission</h3>
                        <hr />
                    </div>
                </div>
                	{!! Form::model( $permission, ['route' => ['permissions.update', $permission->id], 'files' => true, 'method' => 'PUT']) !!}
                	{{-- <form action="{{ route('companies.store') }}" method="POST"> --}}
							{{ csrf_field() }}
	                        <div class="row main">
	                            <div class="col-xs-6 col-sm-6 col-md-6">
	                                <div class="form-group">
	                                    <label for="name" class="cols-sm-2 control-label">Permission Name</label>
	                                    <div class="cols-sm-10">
	                                        <input type="text" name="name" id="name" class="form-control"  value="{{ $permission->name }}" />
	                                      
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="col-xs-6 col-sm-6 col-md-6">
	                                <div class="form-group">
	                                    <label for="guard_name" class="cols-sm-2 control-label">Permission</label>
	                                    <div class="cols-sm-10">
	                                        <input type="text" readonly="" name="guard_name" id="guard_name" class="form-control"  value="{{ $permission->guard_name }}" />
	                                      
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="col-xs-6 col-sm-6 col-md-6">
	                                <div class="form-group">
	                                    <label for="display_name" class="cols-sm-2 control-label">Display Name</label>
	                                    <div class="cols-sm-10">
	                                        <input type="text" name="display_name" id="display_name" class="form-control"  value="{{ $permission->display_name }}" />
	                                      
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                        <div class="form-group">
								<input type="submit"  value="Update" class="btn btn-success">
								<a href="{{ URL::route('permissions.index') }}" class="btn btn-warning btn-responsive">Cancel</a>
							</div>

	                {{-- </form> --}}
	                {!! Form::close() !!}
            </div>
@endsection