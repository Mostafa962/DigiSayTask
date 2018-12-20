<script src="https://code.jquery.com/jquery.js"></script>
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
 <!-- Datatable -->
 <link rel="stylesheet" href="{{url('adminFrontEnd')}}/datatables.net-bs/css/dataTables.bootstrap.min.css">
<script src="{{url('adminFrontEnd')}}/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{url('adminFrontEnd')}}/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="{{url('adminFrontEnd')}}/datatables.net-bs/js/dataTables.buttons.min.js"></script>
<script src="{{url('')}}/vendor/datatables/buttons.server-side.js"></script>
<script>
    $(document).ready(function () {
        $(".submenu > a").click(function (e) {
            e.preventDefault();
            var $li = $(this).parent("li");
            var $ul = $(this).next("ul");

            if ($li.hasClass("open")) {
                $ul.slideUp(350);
                $li.removeClass("open");
            } else {
                $(".nav > li > ul").slideUp(350);
                $(".nav > li").removeClass("open");
                $ul.slideDown(350);
                $li.addClass("open");
            }
        });
    });
</script>
<script src="{{url('adminFrontEnd/js/jquery.validate.min.js')}}"></script>
<script src="{{url('adminFrontEnd/js/additional-methods.min.js')}}"></script>
<script src="{{url('adminFrontEnd/js/validation.js')}}"></script>
@stack('js')
@stack('css')

</body>
</html>