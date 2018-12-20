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
         {!! Form::open(['method'=>'DELETE','route'=>['service.destroy',$id]])!!}
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
