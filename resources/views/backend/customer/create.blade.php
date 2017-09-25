@extends('layouts.app')
@section('content')
	<div class="row">
    	<div class="col-md-10 col-md-offset-1">
		    <div class="panel">
		        <div class="panel-heading">
                   <div class="panel-title text-left">
                        <h3 class="title">Customer created</h3>
                        <hr />
                    </div>
                </div>
                <!--<div class="container">-->
                    <form action="{{ route('customers.store') }}" method="POST" enctype="multipart/form-data" files="true">
						{{ csrf_field() }}
                        <div class="row main">
                            <div class="col-md-10 col-md-offset-1">
                                {{-- @if (count($errors) > 0)
	                        	<div class="alert alert-danger">
							    	<strong>Whoops!</strong> There were some problems with your input.<br><br>
										<ul>
											@foreach ($errors->all() as $error)
												<li>{{ $error }}</li>
											@endforeach
										</ul>
								</div>
        						@endif --}}
        						<div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group {{ $errors->has('type_name') ? ' has-error' : '' }}">
                                        <label for="type_name" class="cols-sm-2 control-label">Customer type</label>
                                        <div class="cols-sm-10">
                                            <select class="form-control" name="type_name">
                                            	<option value="0" disabled="true" selected="ture">--Select--</option>
        		                            	@foreach($type as $typ)
        		                            		<option value="{{ $typ->id }}">{{ $typ->type_name }}
        		                            		</option>
        		                            	@endforeach
                                		    </select> 
                                            <small class="text-danger alert">{{ $errors->first('type_name') }}</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label for="name" class="cols-sm-2 control-label">Name</label>
                                        <div class="cols-sm-10">
                                            <input type="text" name="name" id="name" class="form-control"  placeholder="Name..."/>
                                          <small class="text-danger alert">{{ $errors->first('name') }}</small>
                                         </div>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group {{ $errors->has('shop_name') ? ' has-error' : '' }}">
                                        <label for="shop_name" class="cols-sm-2 control-label">Shop Name</label>
                                        <div class="cols-sm-10">
                                            <input type="text" name="shop_name" id="shop_name" class="form-control"  placeholder="Shop Name..."/>
                                          <small class="text-danger alert">{{ $errors->first('shop_name') }}</small>
                                         </div>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label for="email" class="cols-sm-2 control-label">Email</label>
                                        <div class="cols-sm-10">
                                            <input type="email" name="email" id="email" class="form-control"  placeholder="Email..."/>
                                          <small class="text-danger alert">{{ $errors->first('email') }}</small>
                                         </div>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
                                        <label for="phone" class="cols-sm-2 control-label">Phone number</label>
                                        <div class="cols-sm-10">
                                            <input type="text" name="phone" id="phone" class="form-control"  placeholder="Phone number..."/>
                                          <small class="text-danger alert">{{ $errors->first('phone') }}</small>
                                         </div>
                                    </div>
                                </div>
                            
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group {{ $errors->has('Customerimage') ? ' has-error' : '' }}">
                                        <label for="image" class="cols-sm-2 control-label">Image</label>
                                        <div class="cols-sm-10">
                                            <input type="file" name="image" id="image" class="form-control"/>
                                          <small class="text-danger alert">{{ $errors->first('image') }}</small>
                                         </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="form-group" style="margin-left: 10%;">
							<input type="submit"  value="Submit" class="btn btn-success">
							<a href="{{ URL::route('customers.index') }}" class="btn btn-warning btn-responsive">Cancel</a>
						</div>
                    </form>
                <!--</div>-->
		    </div>
    	</div>
	</div>
@endsection
