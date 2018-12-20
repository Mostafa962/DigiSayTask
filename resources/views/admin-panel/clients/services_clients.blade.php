@extends('admin-panel.layout.structure')
@section('content')
<div class="box">
  <div class="box-header">
    <strong>Client Title:</strong> {{$client->title}}<br>
    his Services:
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
  <div class="box">
@if(count($services)==0)
  <div class="row">
      <div class="col-lg-5 alert alert-info">
          <center><strong>Client Does not have eny services</strong></center>
      </div>
  </div>
@else
  <div class="row">
    <div class="col-lg-12">
      <section class="panel">

        <table class="table table-bordered table-striped table-advance table-hover">
          <tbody>
            <tr>
              <th style="text-align: center;">Title</th>
              <th style="text-align: center;">Type</th>
              <th style="text-align: center;">Link</th>
              <th style="text-align: center;">Description</th>
              <th style="text-align: center;">Edit</th>
              <th style="text-align: center;">Delete</th>
            </tr>
         @foreach($services as $service)
            <tr>
              <td>{{$service->title}}</td>
              <td>{{$service->type}}</td>
              <td>{{$service->link}}</td>
              <td>{{$service->description}}</td>
              <td><!-- edit service -->
                  <a href="{{url('admin/service/'.$service->id.'/edit')}}" class="btn btn-info"><i class="fa fa-edit"></i></a>
              </td>
             <td><!-- delete book temprory-->
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#del_client"><i class="fa fa-trash"></i></button>
            <!-- Modal -->
            <div class="modal fade" id="del_client" role="dialog">
              <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">{{trans('admin.delete_service')}}</h4>
                  </div>
                   {!! Form::open(['method'=>'DELETE','route'=>['service.destroy',$service->id]])!!}
                  <div class="modal-body">
                    <p>{{trans('admin.delete_this_service')}}</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal">{{trans('admin.close')}}</button>
                    {!! Form::submit(trans('admin.yes'),['class'=>'btn btn-danger'])!!}
                  </div>
                    {!! Form::close()!!}
                </div>
                
              </div>
            </div>
             </td>
            </tr>
        @endforeach             
          </tbody>
        </table>
      </section>
    </div>
  </div>
@endif  
  </div>
</div>
@endsection
