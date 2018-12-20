{{-- Side Navigation --}}
<div class="col-md-2">
    <div class="sidebar content-box" style="display: block;">
        <ul class="nav">
            <!-- Main menu -->
            <li class="current"><a href="{{url('admin/')}}"><i class="glyphicon glyphicon-home"></i>
                    {{trans('admin.dashboard')}}</a></li>
            <li class="submenu">
                <a href="#">
                    <i class="glyphicon glyphicon-list"></i>{{trans('admin.clients')}}
                    <span class="caret pull-right"></span>
                </a>
                <!-- Sub menu -->
                <ul>
                     <li><a href="{{url('admin/client')}}">{{trans('admin.show_clients')}}</a></li>
                    <li><a href="{{url('admin/client/create')}}">{{trans('admin.addClient')}}</a></li>
                </ul>
            </li>
            <li class="submenu">
                <a href="#">
                    <i class="glyphicon glyphicon-list"></i>{{trans('admin.services')}}
                    <span class="caret pull-right"></span>
                </a>
                <!-- Sub menu -->
                <ul>
                     <li><a href="{{url('admin/service')}}">{{trans('admin.show_services')}}</a></li>
                    <li><a href="{{url('admin/service/create')}}">{{trans('admin.addService')}}</a></li>
                </ul>
            </li>
            <li class="">
                <a  href="" data-toggle="modal" data-target="#logout">
                    <i class="fa fa-power-off">&nbsp;</i>{{trans('admin.logout')}}
                </a>
            </li>
        </ul>
    </div>
</div>

  <!-- Modal for logout -->
  <div class="modal fade" id="logout" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">{{trans('admin.logout')}}</h4>
        </div>
         {!! Form::open(['method'=>'post','route'=>['Adminlogout']])!!}
        <div class="modal-body">
          <p>{{trans('admin.want_logout')}}</p>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-info" data-dismiss="modal">{{trans('admin.close')}}</button>
        {!! Form::submit(trans('admin.yes'),['class'=>'btn btn-danger'])!!}
        </div>
      </div>
       {!! Form::close()!!}
    </div>
  </div>


