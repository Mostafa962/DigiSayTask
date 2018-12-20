@extends('admin-panel.layout.structure')
@section('content')
<div class="row" style="margin: 0 10%;">
  <div class="col-lg-12">
    <section class="panel" >
      <header class="panel-heading">Edit Service</header>
      <div class="panel-body">
          <!-- show validation errors messages -->
          <div class="col-lg-12">
                @if(count($errors) > 0)
                  <div class="alert alert-danger">
                    <ul>
                          @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                          @endforeach
                    </ul>
                  </div>
                @endif
          </div>
          <div class="form" >
                 {!! Form::model($service,['method'=>'PATCH','route' =>['service.update',$service->id],'files' => true,'class' => 'services']) !!}
                <!-- Service Title -->
                <div class="form-group">
                  {!!Form::label('title',trans('admin.title'), ['class' => 'col-lg-2'])!!}
                  <div class="col-lg-12">
                    {!! Form::text('title',old('title'),['class' => 'form-control',])!!}
                  </div>
                </div>
                <!-- Service Type -->
                <div class="form-group">
                  {!!Form::label('type',trans('admin.service_type'), ['class' => 'col-lg-2'])!!}

                  <div class="col-lg-12">
                    {!! Form::text('type',old('type'),['class' => 'form-control',])!!}
                  </div>
                </div>
               <!-- user id -->
               <!-- I make user id is the client id , id don't understande what main datetype of user id  -->
                <div class="form-group">
                  {!!Form::label('user_id',trans('admin.user_id'), ['class' => 'col-lg-2'])!!}
                    <div class="col-lg-12">
                        {!! Form::select('client_id',$clients,old('client_id'),['class' => 'form-control','required'=>'required'])!!}
                    </div>
                </div>
                <!-- Service Link -->
                <div class="form-group">
                  {!!Form::label('link',trans('admin.service_link'), ['class' => 'col-lg-2'])!!}
                  <div class="col-lg-12">
                    {!! Form::text('link',old('link'),['class' => 'form-control',])!!}
                  </div>
                </div>
                <!-- Service Description -->
                <div class="form-group">
                  {!!Form::label('description',trans('admin.description'), ['class' => 'col-lg-2'])!!}
                  <div class="col-lg-12">
                    {!! Form::textarea('description', old('description'),array('class'=>'form-control', 
                    'rows' =>6, 'cols' => 50,)) !!}
                  </div>
                </div> 
                <!-- Submit Button -->
                <div class="form-group">
                  <div class="col-lg-12">
                    {!! Form::submit(trans('admin.save'),['class' => 'form-control btn btn-primary'])!!}
                  </div>
                </div>                     
                {!!FORM::close()!!}
          </div>
      </div>
    </section>
  </div>
</div>
@endsection
