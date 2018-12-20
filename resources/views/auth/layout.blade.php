<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login</title>
        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="{{url('adminFrontEnd/bootstrap/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{url('adminFrontEnd/font-awesome/css/font-awesome.min.css')}}">
		<link rel="stylesheet" href="{{url('adminFrontEnd/css/form-elements.css')}}">
        <link rel="stylesheet" href="{{url('adminFrontEnd/css/style.css')}}">
    </head>
    <?php  $background  = 'adminFrontEnd/img/backgrounds/1.jpg'?>
    <body style="background:url('{{url($background)}}')no-repeat ;background-color:rgba(0, 0, 0, 0.5);">
    	@yield('content')
    <footer>
    	<div class="container">
    		<div class="row">
    			
    			<div class="col-sm-8 col-sm-offset-2">
    				<div class="footer-border"></div>
    				<p>All Rights Reserved<a href="#" target="_blank"><strong> </strong></a> 
    				<i class="fa fa-smile-o"></i></p>
    			</div>
    			
    		</div>
    	</div>
    </footer>
    <!-- Javascript -->
    <script src="{{url('adminFrontEnd/js/jquery-1.11.1.min.js')}}"></script>
    <script src="{{url('adminFrontEnd/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{url('adminFrontEnd/js/jquery.backstretch.min.js')}}"></script>
    <script src="{{url('adminFrontEnd/js/jquery.validate.min.js')}}"></script>
    <script src="{{url('adminFrontEnd/js/additional-methods.min.js')}}"></script>
    <script src="{{url('adminFrontEnd/js/validation.js')}}"></script>
 </body>
