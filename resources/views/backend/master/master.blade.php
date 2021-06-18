<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>@yield('title')</title>
	<base href="{{asset('')}}backend/">
	<!-- css -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>	<!--Icons-->
	<script src="js/lumino.glyphs.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link href="{{asset('vendor/harimayco-menu/style.css')}}" rel="stylesheet">
</head>
<body>

        @include('backend.master.header')
        @include('backend.master.sidebar')
        @yield('content')

	<!-- javascript -->
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	{{-- thong ke --}}
	@yield('data')
	{{-- <script src="js/chart-data.js"></script> --}}
	{{-- /thong ke --}}
	@yield('script_product')
	@yield('script-variant')

    <script>
        var menus = {
            "oneThemeLocationNoMenus" : "",
            "moveUp" : "Move up",
            "moveDown" : "Mover down",
            "moveToTop" : "Move top",
            "moveUnder" : "Move under of %s",
            "moveOutFrom" : "Out from under  %s",
            "under" : "Under %s",
            "outFrom" : "Out from %s",
            "menuFocus" : "%1$s. Element menu %2$d of %3$d.",
            "subMenuFocus" : "%1$s. Menu of subelement %2$d of %3$s."
        };
        var arraydata = [];
        var addcustommenur= '{{ route("haddcustommenu") }}';
        var updateitemr= '{{ route("hupdateitem")}}';
        var generatemenucontrolr= '{{ route("hgeneratemenucontrol") }}';
        var deleteitemmenur= '{{ route("hdeleteitemmenu") }}';
        var deletemenugr= '{{ route("hdeletemenug") }}';
        var createnewmenur= '{{ route("hcreatenewmenu") }}';
        var csrftoken="{{ csrf_token() }}";
        var menuwr = "{{ url()->current() }}";

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': csrftoken
            }
        });
    </script>
    <script type="text/javascript" src="{{asset('vendor/harimayco-menu/scripts.js')}}"></script>
    <script type="text/javascript" src="{{asset('vendor/harimayco-menu/scripts2.js')}}"></script>
    <script type="text/javascript" src="{{asset('vendor/harimayco-menu/menu.js')}}"></script>

</body>

</html>
