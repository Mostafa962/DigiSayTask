<!DOCTYPE html>
<html>
<head>
    <title>{{trans('admin.PageTitle')}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
    <link rel="stylesheet" href="{{url('adminFrontEnd/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('adminFrontEnd/font-awesome/css/font-awesome.min.css')}}">
    <link href="{{url('adminFrontEnd/css/admin-panel.css')}}" rel="stylesheet" type="text/css" >
    <link rel="stylesheet" media="screen" href="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>
<div class="header">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <!-- Logo -->
                <div class="logo">
                    <a href="{{url('admin')}}"><img src="{{asset('adminFrontEnd/img/logo.PNG')}}" height="50px" width="50"></a>
                </div>
            </div>
            <div class="col-lg-2 ">
                <div class="navbar navbar-inverse" role="banner">
                    <nav class=" navbar-right" role="navigation">
                        <ul class="nav navbar-nav">
                            <li class="dropdown">
                                <a href="" class="dropdown-toggle" data-toggle="dropdown">
                                   <i class="fa fa-globe"></i><b
                                            class="caret"></b></a>
                                <ul class="dropdown-menu animated fadeInUp">
                                    <li><a href="{{url('admin/lang/en')}}"><i class="fa fa-flag">English</i></a></li>
                                    <li><a href="{{url('admin/lang/ar')}}"><i class="fa fa-flag">عربي</i></a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="navbar navbar-inverse" role="banner">
                    <nav class="navbar-left" role="navigation">
                        <ul class="nav navbar-nav">
                            <li class="dropdown">
                                <a href="" class="dropdown-toggle" data-toggle="dropdown">
                                    {{auth()->guard('admin')->user()->name}}<b
                                            class="caret"></b></a>
                                <ul class="dropdown-menu animated fadeInUp">
                                    <li><a href="#">{{trans('admin.web')}}</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>