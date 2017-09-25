@extends('layouts.app')
@section('content')
	<div class="col-md-10 col-offset-2">
            	<div class="panel-heading">
                   <div class="panel-title text-left">
                        <h3 class="title">Package Category Update</h3>
                        <hr />
                    </div>
                </div>
                	{!! Form::model( $paccate, ['route' => ['paccates.update', $paccate->id], 'files' => true, 'method' => 'PUT']) !!}
                	{{-- <form action="{{ route('companies.store') }}" method="POST"> --}}
							{{ csrf_field() }}
	                        <div class="row main">
	                            <div class="col-xs-6 col-sm-6 col-md-6">
	                                <div class="form-group">
	                                    <label for="pac_name" class="cols-sm-2 control-label">Package Category Name</label>
	                                    <div class="cols-sm-10">
	                                        <input type="text" name="pac_name" id="pac_name" class="form-control" required="" value="{{ $paccate->pac_name }}" />
	                                      
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                        <div class="form-group">
								<input type="submit"  value="Update" class="btn btn-success">
								<a href="{{ URL::route('paccates.index') }}" class="btn btn-warning btn-responsive">Cancel</a>
							</div>

	                {{-- </form> --}}
	                {!! Form::close() !!}
            </div>
@endsection