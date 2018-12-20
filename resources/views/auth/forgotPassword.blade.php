@extends('auth.layout')
@section('content')
<div class="top-content">
    <div class="inner-bg">
        <div class="container">
            <div class="row">
            </div>
            <div class="row">
                <div class="col-sm-5">
                	<div class="form-box">
                    	<div class="form-top">
                    		<div class="form-top-left">
                    			<h3>Reset Password</h3>
                        		<p>Enter Your email to send you a link to reset password</p>
                    		</div>
                    		<div class="form-top-right">
                    			<i class="fa fa-lock"></i>
                    		</div>
                        </div>
                        <div class="form-bottom">
		                <form role="form" action="{{route('verifiemail')}}" method="post" id="login" class="login-form">
		                    	    @if(session()->has('success'))
							         <div class="alert alert-danger">
							             {{session('success')}}
							         </div>
                                     @elseif(session()->has('failed'))
                                        <div class="alert alert-danger">
                                         {{session('failed')}}
                                     </div>
							        @endif
							      {!! csrf_field()!!}
		                        <div class="form-group">
		                        	<label class="sr-only" for="form-email">Email</label>
		                        	<input type="email" name="email" placeholder="Email..." class="form-email form-control" id="form-email">
		                        </div>
		                        <div class="form-group">
		                            <label class="checkbox">
						                <span class="pull-right"> <a href="{{route('AdminLogin')}}">Login?</a></span>
						     	   </label>
						     	 </div>
		                        <button type="submit" class="btn">Send Link!</button>
		                    </form>
	                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection