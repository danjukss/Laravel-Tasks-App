@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Labot profilu</div>

                
				  <div class="panel-body">

                  @if (Session::has('success'))
                    <div class="alert alert-success" role="alert">{{ Session::get('success') }}</div>
                  @endif
				    
                    {!! Form::model($user, ['method' => 'PATCH', 'route' => ['profile.update', $user->id], 'class' => 'form-horizontal']) !!}

                    
				   	<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                        <label class="col-md-3 control-label">Vārds</label>

                        <div class="col-md-7">
                            {!! Form::text('name', null, ['class' => 'form-control']) !!}
                        
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
                            {!! Form::text('lastname', null, ['class' => 'form-control']) !!}

                            @if ($errors->has('lastname'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('lastname') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-7 col-md-offset-3">
                            {!! Form::submit('Labot!', ['class' => 'btn btn-primary']) !!}
                            
                        </div>
                    </div>
				   		
				   	{!! Form::close() !!}
				  </div>
				
            </div>
        </div>
    </div>
	</div>
@endsection