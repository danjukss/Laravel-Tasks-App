@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Pievienot uzdevumu</div>

                
				  <div class="panel-body">
                  {!! Form::open(['url' => 'tasks', 'class' => 'form-horizontal']) !!}
				   	<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                        <label class="col-md-3 control-label">Uzdevums</label>

                        <div class="col-md-7">
                            {!! Form::text('name', null, ['class' => 'form-control']) !!}
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
                            {!! Form::textarea('description', null, ['class' => 'form-control', 'rows' => 4]) !!}

                            @if ($errors->has('description'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-7 col-md-offset-3">
                            {!! Form::submit('Pievienot!', ['class' => 'btn btn-primary']) !!}
                        </div>
                    </div>
				   	{!! Form::close() !!}
				  </div>
				
            </div>
        </div>
    </div>
	</div>
@endsection