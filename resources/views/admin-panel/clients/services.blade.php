@extends('admin-panel.layout.structure')
@section('content')
	<div class="row" style="margin: 0 10%;">
	  <div class="col-lg-12">
      <section class="panel" >
      <header class="panel-heading">{{trans('admin.Add_client_Services')}}</header>
      <div class="panel-body">
    			<form action="{{route('services',$client_id)}}" method="POST">
    				{!! csrf_field()!!}
    				<input type="checkbox" name="youtube" value="youtube"><i class="fa fa-youtube"></i><br>
    				<input type="checkbox" name="facebook" value="facebook"><i class="fa fa-facebook"></i><br>
    				<input type="checkbox" name="twitter" value="twitter"><i class="fa fa-twitter"></i><br>
    				<input type="checkbox" name="instagram" value="instagram"><i class="fa fa-instagram"></i><br>
    				<input type="submit" name="submit" value="done" class="btn btn-success">
    			</form>
        </div>
    </section>
	  </div>
	</div>
@endsection
