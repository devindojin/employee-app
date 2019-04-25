<!DOCTYPE html>
<html lang="en">

<head>
    <title>Tueetor</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!---Stylesheet Start-----> 
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" /> 
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}" />

    <link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!---Stylesheet END-----> 
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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

	// upload-cv
	$("#uploadCv").change(function() {
		$( "#saveCv" ).trigger( "click" );
	});

	// step 1 and step 2
	$("#still_in_office").click(function () {
		if(document.getElementById('still_in_office').checked) {
		    $(".from-date-sec").hide();
		} else {
		    $(".from-date-sec").show();
		}
	});


	// Numeric only control handler
	jQuery.fn.ForceNumericOnly =
	function()
	{
	    return this.each(function()
	    {
	        $(this).keydown(function(e)
	        {
	            var key = e.charCode || e.keyCode || 0;
	            // allow backspace, tab, delete, enter, arrows, numbers and keypad numbers ONLY
	            // home, end, period, and numpad decimal
	            return (
	                key == 8 || 
	                key == 9 ||
	                key == 13 ||
	                key == 46 ||
	                key == 110 ||
	                key == 190 ||
	                (key >= 35 && key <= 40) ||
	                (key >= 48 && key <= 57) ||
	                (key >= 96 && key <= 105));
	        });
	    });
	};

	$("#lph_From_mo,#lph_From_yr,#lph_To_mo,#lph_To_yr").ForceNumericOnly();

	$("#birth_date").datepicker();


	$('.selectCat').on('change', function() {
	  var url = "{{ route('jobs') }}/1/20/";
	  var cat = this.value;
	  window.location = url + cat;
	});
</script>
<!----Script END----->
</body>
</html>