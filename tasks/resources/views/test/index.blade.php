@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Test</div>

                
				  <div class="panel-body">
				   {!! Form::open() !!}
				   
				   {!! Form::close() !!}
				  </div>
				
            </div>
        </div>
    </div>
</div>
@stop