@extends('layouts.app')
	@section('content')
			<div class="col-md-10 col-offset-2">
            	<div class="panel-heading">
                   <div class="panel-title text-left">
                        <h3 class="title">Package Category created</h3>
                        <hr />
                    </div>
                </div>
                	<form action="{{ route('paccates.store') }}" method="POST">
							{{ csrf_field() }}
	                        <div class="row main">
	                            <div class="col-xs-6 col-sm-6 col-md-6">
	                                <div class="form-group {{ $errors->has('pac_name') ? ' has-error' : '' }}">
	                                    <label for="pac_name" class="cols-sm-2 control-label">Package Category Name</label>
	                                    <div class="cols-sm-10">
	                                        <input type="text" name="pac_name" id="pac_name" class="form-control"  placeholder="Package Category Name..."/>
	                                      <small class="text-danger">{{ $errors->first('pac_name') }}</small>
	                                     </div>
	                                </div>
	                            </div>
	                           
	                        </div>
	                        <div class="form-group">
								<input type="submit"  value="Submit" class="btn btn-success">
								<a href="{{ URL::route('paccates.index') }}" class="btn btn-warning btn-responsive">Cancel</a>
							</div>
	                </form>
            	</div>
			</div>
	@endsection
