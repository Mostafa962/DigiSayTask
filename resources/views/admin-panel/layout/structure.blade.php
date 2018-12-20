@include('admin-panel.layout.header')
<div class="page-content">
    @if(Session::has('message'))
        <div class="alert alert-info">
            <p>{{ Session::get('message') }}</p>
        </div>
    @endif
    <div class="row">
        @include('admin-panel.layout.sidenav')
        <div class="col-lg-10 display-area">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1">
                    <div class="content-box-large">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div><!--/Display area after sidenav-->
    </div>
</div><!--/Page Content-->
  @include('admin-panel.layout.footer')