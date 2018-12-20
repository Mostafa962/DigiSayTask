@extends('auth.layout')
@section('content')
<div class="top-content">
    <div class="inner-bg">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 text">
                    <h1><strong>Login or register </strong> to Admin Panel</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-5">
                	<div class="form-box">
                    	<div class="form-top">
                    		<div class="form-top-left">
                    			<h3>already member ?</h3>
                        		<p>Enter username and password to log on:</p>
                    		</div>
                    		<div class="form-top-right">
                    			<i class="fa fa-lock"></i>
                    		</div>
                        </div>
                        <div class="form-bottom">
		                <form role="form" action="{{route('AdminLogin')}}" method="post" id="login" class="login-form">
		                    	    @if(session()->has('error'))
							         <div class="alert alert-danger">
							             {{session('error')}}
							         </div>
							        @endif
							      {!! csrf_field()!!}
		                        <div class="form-group">
		                        	<label class="sr-only" for="form-email">Email</label>
		                        	<input type="email" name="email" placeholder="Email..." class="form-email form-control" id="form-email">
		                        </div>
		                        <div class="form-group">
		                        	<label class="sr-only" for="form-password">Password</label>
		                        	<input type="password" name="password" placeholder="Password..." class="form-password form-control" id="form-password">
		                        </div>
		                        <div class="form-group">
		                            <label class="checkbox">
						                <input type="checkbox" name="rememberme" value="remember-me"> <span style="color:#fff">Remember me</span> 
						                <span class="pull-right"> <a href="{{route('forgotPass')}}"> Forgot Password?</a></span>
						     	   </label>
						     	 </div>
		                        <button type="submit" class="btn">Login in!</button>
		                    </form>
	                    </div>
                    </div>
                </div>
                <div class="col-sm-1 middle-border"></div>
                <div class="col-sm-1"></div>
                <div class="col-sm-5">
                	<div class="form-box">
                		<div class="form-top">
                    		<div class="form-top-left">
                    			<h3>Sign up now</h3>
                        		<p>Fill in the form below to get instant access:</p>
                    		</div>
                    		<div class="form-top-right">
                    			<i class="fa fa-pencil"></i>
                    		</div>
                        </div>
                        <div class="form-bottom">
		                    <form role="form" action="{{route('AdminRegister')}}" method="post" class="registration-form" id="registration">
		                    	 {!! csrf_field()!!}
		                    	<div class="form-group">
		                    		<label class="sr-only" for="form-full-name">Full name</label>
		                        	<input type="text" name="name" placeholder="Full Name ..." class=" form-control" id="form-first-name">
								</div>
		                        <div class="form-group">
		                        	<label class="sr-only" for="form-email">Email</label>
		                        	<input type="email" name="email" placeholder="Email..." class="form-email form-control" id="_email">
		                        	@if($errors->has('email'))
								            <div class="alert alert-danger"  role="alert">
								                <strong>{{ $errors->first('email') }}</strong>
								            </div>
						      		@endif
		                        </div>
                                <div class="form-group">
                                    <label class="sr-only" for="form-password">Password</label>
                                    <input type="password" name="password" placeholder="Password..." class="form-password form-control" id="formpassword">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="form-password">Password Confirmation</label>
                                    <input type="password" name="password_confirmation" placeholder="Password Confirmation..." class="form-password form-control" id="form-password">
                                </div>
		                        <button type="submit" class="btn">Sign up!</button>
		                    </form>
	                    </div>
                	</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection