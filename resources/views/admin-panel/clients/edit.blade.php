@extends('admin-panel.layout.structure')
@section('content')
<div class="row" style="margin: 0 10%;">
  <div class="col-lg-12">
    <section class="panel" >
      <header class="panel-heading">{{trans('admin.edit_client')}}</header>
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
                 {!! Form::model($client,['method'=>'PATCH','route' =>['client.update',$client->id],'files' => true,'class'=>'client']) !!}
                <!-- Client Title -->
                <div class="form-group">
                {!!Form::label('title',trans('admin.title'), ['class' => 'col-lg-2'])!!}
                  <div class="col-lg-12">
                    {!! Form::text('title',old('title'),['class' => 'form-control',])!!}
                  </div>
                </div>
                <!-- Client Description -->
                <div class="form-group">
                  {!!Form::label('description',trans('admin.description'), ['class' => 'col-lg-2'])!!}
                  <div class="col-lg-12">
                    {!! Form::textarea('description',old('description'),array('class'=>'form-control', 
                    'rows' =>6, 'cols' => 50,)) !!}
                  </div>
                </div> 
               <!-- Client Status -->
                <div class="form-group">
                  {!!Form::label('status',trans('admin.status'), ['class' => 'col-lg-2'])!!}
                  <div class="col-lg-12">
                      {!! Form::text('status',old('status'),['class' => 'form-control',])!!}
                  </div>
                </div>
               <!-- Client Phone -->
                <div class="form-group">
                    {!!Form::label('phone',trans('admin.phone'), ['class' => 'col-lg-2'])!!}
                    <div class="col-lg-12">
                      {!! Form::text('contact_phone',old('contact_phone'),['class' => 'form-control',])!!}
                    </div>
                </div>
                
                <!-- Contract Start Date -->
                <div class="form-group">
                  {!!Form::label('contract_start',trans('admin.contract_start'), ['class' => 'col-lg-4'])!!}
                  <div class="col-lg-12">
                    {!! Form::date('contract_start',old('contract_start'),['class' => 'form-control'])!!}
                  </div>
                </div>
                <!-- Contract End Date -->
                <div class="form-group">
                  {!!Form::label('contract_end',trans('admin.contract_end'), ['class' => 'col-lg-4'])!!}
                  <div class="col-lg-12">
                    {!! Form::date('contract_end',old('contract_end'),['class' => 'form-control'])!!}
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
