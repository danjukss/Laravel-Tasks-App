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
	    <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Username</th>
                                        <th>Email Address</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Nicky Almera</td>
                                        <td>nicky@hotmail.com</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Edmund Wong</td>
                                        <td>edmund@yahoo.com</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Harvinder Singh</td>
                                        <td>harvinder@gmail.com</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Terry Khoo</td>
                                        <td>terry@gmail.com</td>
                                    </tr>
                                </tbody>
                            </table>
	  </div>
	</div>
	<!-- end panel -->
	</div>
<!-- end #content -->

@endsection