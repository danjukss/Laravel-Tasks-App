@extends('layouts.admin')

@section('content')
	<div id="content" class="content">
	  <!-- begin breadcrumb -->
	  <ol class="breadcrumb pull-right">
	    <li><a href="{{ url('admin/tasks') }}">Uzdevumi</a></li>
	    <li><a href="javascript:;">Page Options</a></li>
	    <li class="active">Blank Page</li>
	  </ol>
	  <!-- end breadcrumb -->
	  <!-- begin page-header -->
	  <h1 class="page-header">Labot uzdevumu - {{ $tasks->name }}<small></small></h1>
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
	    <h4 class="panel-title">Uzdevums</h4>
	  </div>
	  <div class="panel-body">

	  @if (Session::has('success'))
        <div class="alert alert-success" role="alert">{{ Session::get('success') }}</div>
      @endif

	    <div class="panel-body">
				    {!! Form::model($tasks, ['method' => 'PATCH', 'route' => ['admin.tasks.update', $tasks->id], 'class' => 'form-horizontal']) !!}

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

                    <div class="form-group">
                        <div class="col-md-7 col-md-offset-3">
                        	{!! Form::submit('Labot!', ['class' => 'btn btn-primary']) !!}
                        </div>
                    </div>
				   		
				    {!! Form::close() !!}
				  </div>
	  </div>
	</div>
	<!-- end panel -->
	</div>
<!-- end #content -->

@endsection