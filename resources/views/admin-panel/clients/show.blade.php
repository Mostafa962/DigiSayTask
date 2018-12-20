@extends('admin-panel.layout.structure')
@section('content')
<div class="box">
  <div class="box-header">
    <h3 class="box-title">{{$title}}</h3>
  </div>
  <div class="row" style="margin: 0 10%;"> 
  <div class="col-lg-12">
      <section class="panel">
        @if(session()->has('clientAdded'))
          <div class="alert alert-success">
            <button type='button' class='close' data-dismiss='alert'>&times;</button>
            <center><strong>{{session()->get('clientAdded')}}</strong></center>
          </div>
        @elseif(session()->has('clientDeleted'))
          <div class="alert alert-success">
            <button type='button' class='close' data-dismiss='alert'>&times;</button>
            <center><strong>{{session()->get('clientDeleted')}}</strong></center>
          </div>
        @elseif(session()->has('clientUpdated'))
          <div class="alert alert-success">
            <button type='button' class='close' data-dismiss='alert'>&times;</button>
            <center><strong>{{session()->get('clientUpdated')}}</strong></center>
          </div>
       @endif
      </section>
  </div>
</div>
  <div class="box">
		      {!! $dataTable->table(['class'=>'dataTable table table-striped table-hover table-bordered'],true)!!}
  </div>
</div>
  @push('js')
    {!! $dataTable->scripts() !!}
  @endpush
@endsection
