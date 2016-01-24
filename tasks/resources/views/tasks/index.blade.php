@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Uzdevumu saraksts</div>

                
				  <div class="panel-body">
				   <ul class="list-group">
				   	@if (Session::has('delete_task'))
						<div class="alert alert-success" role="alert">{{ Session::get('delete_task') }}</div>
				   	@endif

				  
				   	@foreach($tasks as $task)
				   		<li class="list-group-item">{{ $task->name }} 
				   		<small>
				   			<i>- pievienoja - {{ $task->user->name }} - {{ $task->created_at }} 
					   			@if(!Auth::guest() && Auth::user()->id == $task->user->id || !Auth::guest() && Auth::user()->is('admin')) 
					   				<a href="{{ url('/tasks') }}/{{ $task->id }}/edit">Labot</a> | 

					   				<div style="float: right;">
					   					{!! Form::open(['method' => 'DELETE', 'url' => 'tasks/'.$task->id]) !!}
					   						{!! Form::submit('Delete!', ['class' => 'btn btn-danger']) !!}
					   					{!! Form::close() !!}
									</div> 

					   				<div style="clear: both;"></div>
					   			@endif
				   			</i>
				   		</small><br>
				   		<small>{{ str_limit($task->description, 400) }}</small>
				   		</li>
				   	@endforeach
					</ul>

					{!! $tasks->links() !!}
				  </div>
				
            </div>
        </div>
    </div>
</div>
@stop