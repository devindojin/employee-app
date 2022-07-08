<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!---Stylesheet Start-----> 
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" /> 
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}" />
    <link rel="stylesheet" href="https://use.typekit.net/aur8dqt.css">

    <link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!---Stylesheet END-----> 
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="shortcut icon" type="image/png" href="{{ asset('images/favicon.png') }}"/>

	<!-- Facebook Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '2011502212309695');
  fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=2011502212309695&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->
<script>
window['_fs_debug'] = false;
window['_fs_host'] = 'fullstory.com';
window['_fs_org'] = 'NYKS2';
window['_fs_namespace'] = 'FS';
(function(m,n,e,t,l,o,g,y){
    if (e in m) {if(m.console && m.console.log) { m.console.log('FullStory namespace conflict. Please set window["_fs_namespace"].');} return;}
    g=m[e]=function(a,b,s){g.q?g.q.push([a,b,s]):g._api(a,b,s);};g.q=[];
    o=n.createElement(t);o.async=1;o.crossOrigin='anonymous';o.src='https://'+_fs_host+'/s/fs.js';
    y=n.getElementsByTagName(t)[0];y.parentNode.insertBefore(o,y);
    g.identify=function(i,v,s){g(l,{uid:i},s);if(v)g(l,v,s)};g.setUserVars=function(v,s){g(l,v,s)};g.event=function(i,v,s){g('event',{n:i,p:v},s)};
    g.shutdown=function(){g("rec",!1)};g.restart=function(){g("rec",!0)};
    g.log = function(a,b) { g("log", [a,b]) };
    g.consent=function(a){g("consent",!arguments.length||a)};
    g.identifyAccount=function(i,v){o='account';v=v||{};v.acctId=i;g(o,v)};
    g.clearUserCookie=function(){};
})(window,document,window['_fs_namespace'],'script','user');
</script>
<script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5d767171ab6f1000123c8546&product=inline-share-buttons' async='async'></script>
</head>
<body>
<div class="layout">
@include('layouts.header')
<div class="container-fluid">
<div class="row">
@yield('content')

@if(Request::segment(1) != "")
@include('layouts.footer')
@else

@endif
</div>
</div>
</div>
<!----Script Start----->
         <!-- Template Algolia - No Results-->
      <script src="https://cdn.jsdelivr.net/algoliasearch/3.14.5/algoliasearch.min.js"></script>
        <script type="text/html" id="no-results-template">
          <div id="no-results-message">
              <p>Désolé, nous n'avons trouvé aucune annonce pour votre recherche aujourd'hui.</p>
          </div>
      </script>
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
      <script src="https://cdn.jsdelivr.net/instantsearch.js/1.5.1/instantsearch.min.js"></script>
      <script type="text/javascript" src="{{ asset('js/search_algolia.js') }}"></script>

<script async>(function(s,u,m,o,j,v){j=u.createElement(m);v=u.getElementsByTagName(m)[0];j.async=1;j.src=o;j.dataset.sumoSiteId='2a70559be3ccd332bfcd1a08adcac95f70877106bf6962088339899aa8297034';v.parentNode.insertBefore(j,v)})(window,document,'script','//load.sumo.com/');</script>
<script>
	function CheckCV() {
    var value;
    value = document.getElementById("UploadCv").value;
    if (value == "") {
        alert("N'oubliez pas d'entrer votre CV");
        return false;
    };
}
</script>
<!----Script END----->
</body>
</html>