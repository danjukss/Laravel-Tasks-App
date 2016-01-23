@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Pievienot uzdevumu</div>

                
				  <div class="panel-body">
				   	<form class="form-horizontal" method="POST" action="{{ url('/tasks') }}">
				   	{!! csrf_field() !!}
				   	<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">Uzdevums</label>

                        <div class="col-md-7">
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">

                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">Apraks</label>

                        <div class="col-md-7">
                            <textarea class="form-control" name="description" rows="4">{{ old('description') }}</textarea>

                            @if ($errors->has('description'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-7 col-md-offset-3">
                            <input type="submit" class="btn btn-primary" value="Pievienot!">
                        </div>
                    </div>
				   	</form>
				  </div>
				
            </div>
        </div>
    </div>
	</div>
@endsection