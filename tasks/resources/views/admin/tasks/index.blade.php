@extends('layouts.admin')

@section('content')
	<div id="content" class="content">
	  <!-- begin breadcrumb -->
	  <ol class="breadcrumb pull-right">
	    <li><a href="javascript:;">Uzdevumi</a></li>
	    <li><a href="javascript:;">Page Options</a></li>
	    <li class="active">Blank Page</li>
	  </ol>
	  <!-- end breadcrumb -->
	  <!-- begin page-header -->
	  <h1 class="page-header">Uzdevumu saraksts <small>Šeit tu vari pārvaldīt uzdevumus</small></h1>
	  <!-- end page-header -->
	  


	  <!-- Page Content Here -->  
	  <!-- begin panel -->
	<div class="panel panel-inverse">
	  <div class="panel-heading">
	    <div class="panel-heading-btn">
	      <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
	      <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
	      <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
	      <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
	    </div>
	    <h4 class="panel-title">Uzdevumu saraksts</h4>
	  </div>
	  <div class="panel-body">

	  @if (Session::has('task_delete'))
        <div class="alert alert-success" role="alert">{{ Session::get('task_delete') }}</div>
      @endif

       @if (Session::has('task_create'))
        <div class="alert alert-success" role="alert">{{ Session::get('task_create') }}</div>
      @endif

	    <table class="table table-bordered">
	    	<thead>
                <tr>
                    <th>#</th>
                    <th>Uzdevumus</th>
                    <th>Laiks</th>
                    <th>Pievienoja</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
	    	 <tbody>
	    @foreach($tasks as $task)
	    	<tr>
                    <td>{{ $task->id }}</td>
                    <td><a href="">{{ $task->name }}</a></td>
                    <td>{{ $task->created_at }}</td>
                    <td>{{ $task->user->name }} {{ $task->user->lastname }}</td>
                    <td>
                    	<a href="{{ url('admin/tasks') }}/{{ $task->id }}/edit" class="btn btn-primary m-r-5 m-b-5">Labot</a>
                    </td>
                    
                    <td>
	                    {{ Form::model($task, ['method' => 'DELETE', 'action' => ['Admin\AdminTasksController@destroy', $task->id]]) }}
	                    	{{ Form::submit('Dzēst', ['class' => 'btn btn-danger m-r-5 m-b-5']) }}
	                    {{ Form::close() }}
                    </td>
                </tr>
	    @endforeach
	    	</tbody>       
        </table>
	  </div>
	</div>
	<!-- end panel -->
	</div>
<!-- end #content -->

@endsection