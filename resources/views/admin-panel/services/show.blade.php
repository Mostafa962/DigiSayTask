@extends('admin-panel.layout.structure')
@section('content')
<div class="box">
  <div class="box-header">
    <h3 class="box-title">{{$title}}</h3>
  </div>
  <div class="row" style="margin: 0 10%;"> 
  <div class="col-lg-12">
      <section class="panel">
      	@if (session()->has('serviceAdded'))
          <div class="alert alert-success">
            <button type='button' class='close' data-dismiss='alert'>&times;</button>
            <center><strong>{{session()->get('serviceAdded')}}</strong></center>
          </div>
        @elseif(session()->has('ServicesDeleted'))
          <div class="alert alert-success">
            <button type='button' class='close' data-dismiss='alert'>&times;</button>
            <center><strong>{{session()->get('ServicesDeleted')}}</strong></center>
          </div>
        @elseif(session()->has('ServiceUpdated'))
          <div class="alert alert-success">
            <button type='button' class='close' data-dismiss='alert'>&times;</button>
            <center><strong>{{session()->get('ServiceUpdated')}}</strong></center>
          </div>
       @endif
      </section>
  </div>
</div>
  <div class="box-body">
		      {!! $dataTable->table(['class'=>'dataTable table table-striped table-hover table-bordered','id'=>'services-table'])!!}
     </div>
</div>
  @push('js')
  <script>

  </script>
    {!! $dataTable->scripts() !!}
  @endpush
@endsection
