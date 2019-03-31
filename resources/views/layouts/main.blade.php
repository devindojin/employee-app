<!DOCTYPE html>
<html lang="en">

<head>
    <title>Tueetor</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!---Stylesheet Start-----> 
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" /> 
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}" />
    <!---Stylesheet END-----> 
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">


</head>

<body>
<div class="layout">
@include('layouts.header')
<div class="container-fluid">
<div class="row">
@yield('content')
@include('layouts.footer')
</div>
</div>
</div>
<!----Script Start----->
<script src="{{ asset('js/jquery-1.11.0.min.js') }}"></script> 
<script src="{{ asset('js/bootstrap.min.js') }}"></script> 
<script>
   $('#menu_toggle').click(function(e){ 
	    e.stopPropagation();
	    $('.sidenav ').toggleClass('openMenu');
	});

	$('.sidenav').click(function(e){
	    e.stopPropagation();
	});
	$('.close_menu').click(function(e){
	   $('.sidenav').removeClass('openMenu');
	});
	$('body,html').click(function(e){
	   $('.sidenav').removeClass('openMenu');
	});
</script>
<!----Script END----->
</body>
</html>