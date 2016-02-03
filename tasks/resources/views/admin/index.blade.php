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
      <h1 class="page-header">Administrācijas panelis <small></small></h1>
      <!-- end page-header -->
      

<!--
  http://www.gravatar.com/avatar/8e59f43bff3e38ff88ef7b454e443563?s=47&d=http%3A%2F%2Fwww.techrepublic.com%2Fbundles%2Ftechrepubliccore%2Fimages%2Ficons%2Fstandard%2Ficon-user-default.png
-->
      <!-- begin timeline -->
      <ul class="timeline">
        @foreach($activities as $row)
            <li>
              <!-- begin timeline-time -->
              <div class="timeline-time">
                  <span class="date">{{ Carbon::parse($row->created_at)->diffForHumans() }}</span>
                  <span class="time">{{ Carbon::parse($row->created_at)->toTimeString() }}</span>
              </div>
              <!-- end timeline-time -->
              <!-- begin timeline-icon -->
              <div class="timeline-icon">
                  <a href="javascript:;"><i class="fa fa-list-alt"></i></a>
              </div>
              <!-- end timeline-icon -->
              <!-- begin timeline-body -->
              <div class="timeline-body">
                  <div class="timeline-header">
                      <span class="userimage"><img src="http://www.gravatar.com/avatar/8e59f43bff3e38ff88ef7b454e443563?s=47&d=http%3A%2F%2Fwww.techrepublic.com%2Fbundles%2Ftechrepubliccore%2Fimages%2Ficons%2Fstandard%2Ficon-user-default.png" alt="" /></span>
                      <span class="username"><a href="javascript:;">{{ $row->user->name }} {{ $row->user->lastname }}</a> <small></small></span>
                      <span class="pull-right text-muted">{{ Carbon::parse($row->created_at) }}</span>
                  </div>
                  <div class="timeline-content">
                            <p>
                                @if($row->type == 'task')
                                  <b>Izveidoja uzdevumu:</b> {{ $row->task->name }}
                                @endif

                                @if($row->type == 'profile')
                                  <b>Laboja savu profilu</b>
                                @endif
                            </p>
                  </div>
                  <div class="timeline-footer">

                    @if($row->type == 'task')
                     <a href="{{ url('admin/tasks/') }}/{{ $row->place_id }}/edit"><i class="fa fa-edit fa-fw"></i>Labot</a>
                    @endif

                  </div>
              </div>
              <!-- end timeline-body -->
          </li>
        @endforeach
          <li>
              <!-- begin timeline-icon -->
              <div class="timeline-icon">
                  <a href="javascript:;"><i class="fa fa-spinner"></i></a>
              </div>
              <!-- end timeline-icon -->
              <!-- begin timeline-body -->
              <div class="timeline-body">
                  Loading...
              </div>
              <!-- begin timeline-body -->
          </li>
      </ul>
      <!-- end timeline -->
    </div>
<!-- end #content -->

@endsection