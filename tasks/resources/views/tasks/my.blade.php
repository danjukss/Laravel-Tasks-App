@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Uzdevumu saraksts</div>

                
				  <div class="panel-body">
				   <ul class="list-group">  
				   	@foreach($tasks as $task)
				   		<li class="list-group-item">{{ $task->name }} 
				   		<small>
				   			<i>- {{ $task->created_at }} 
					   			@if(!Auth::guest() && Auth::user()->id == $task->user->id || !Auth::guest() && Auth::user()->is('admin')) 
					   				<a href="{{ url('/tasks/edit') }}/{{ $task->id }}">Labot</a> | <a href="{{ url('/tasks/delete') }}/{{ $task->id }}">Dzest</a>
					   			@endif
				   			</i>
				   		</small><br>
				   		<small>{{ str_limit($task->description, 400) }}</small>
				   		</li>
				   	@endforeach
					</ul>
				  </div>
				
            </div>
        </div>
    </div>
</div>
@endsection