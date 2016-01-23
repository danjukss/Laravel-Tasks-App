@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Labot profilu</div>

                
				  <div class="panel-body">

                  @if (Session::has('update_profile'))
                    <div class="alert alert-success" role="alert">{{ Session::get('update_profile') }}</div>
                  @endif
				  
				   	<form class="form-horizontal" method="POST" action="{{ url('/profile') }}/{{ $user->id }}">
				   	{!! csrf_field() !!}
                    {{ method_field('PUT') }}
                    
				   	<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                        <label class="col-md-3 control-label">Vārds</label>

                        <div class="col-md-7">
                            <input type="text" class="form-control" name="name" value="{{ $user->name }}">

                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">Uzvārds</label>

                        <div class="col-md-7">
                            <input type="text" class="form-control" name="lastname" value="{{ $user->lastname }}">

                            @if ($errors->has('lastname'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('lastname') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-7 col-md-offset-3">
                        	<input type="submit" class="btn btn-primary" value="labot">
                        </div>
                    </div>
				   		
				   	</form>
				  </div>
				
            </div>
        </div>
    </div>
	</div>
@endsection