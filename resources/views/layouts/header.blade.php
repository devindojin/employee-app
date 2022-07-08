<nav class="top_bar"> 
 <div class="navbar-header">
		<a class="navbar-brand visible-xs" id="menu_toggle" href="javascript:void(0)">
			<span><img src="{{ asset('images/menu.png') }}" width="20"></span>
		</a>
	</div> 
	<div class="title">
		<h2 class="no_margin page_title"><a href="{{env('MENU_HEADER_LINK')}}"><img src="{{ asset('images/logo.png') }}" style="width:175px;padding-top:10px"></a></h2>  
	</div>
	<div class="top_bar_right">
	</div>

@if(Auth::check())
	<div id="sideNav" class="sidenav scrollbar visible-xs">
		<span class="close_menu"><i class="fa fa-times"></i></span>

		<div class="user_block">
			<div class="user_detail">
				<h2 class="user_name">@if(Auth::check()) {{Auth::user()->name.' '.Auth::user()->last_name }} @else @endif</h2>
				<img src="{{ asset('images/avatar.jpg') }}" class="user_pic" />
				<h3 class="user_email">@if(Auth::check()) {{Auth::user()->email }} @else @endif</h3>
			</div>
		</div>
		<ul class="menu_list list-unstyled visible-xs visible-sm">
			<li><a href="{{ route('moncv') }}">Mon compte</a></li>
			@guest
			@else
			    <li><a href="{{env('MENU_ANNONCES')}}">Annonces</a></li>
			    <li><a href="{{env('MENU_FOOTER_DEPOT')}}">Déposez votre Annonce</a></li>
    			<li><a href="{{env('MENU_CANDIDATURE_SPONTANEE')}}">Candidature Spontanée</a></li>
    			<li><a href="{{env('MENU_ACTUALITES')}}">Blog</a></li>

			<li>
				<a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    Deconnexion
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
			</li>
			@endguest
		</ul>
	</div>
	@else

	<div id="sideNav" class="sidenav scrollbar visible-xs">
		<span class="close_menu"><i class="fa fa-times"></i></span>

		<div class="user_block">
			<div class="user_detail">
				<h2 class="user_name">@if(Auth::check()) {{Auth::user()->name.' '.Auth::user()->last_name }} @else @endif</h2>
				<img src="{{ asset('images/avatar.jpg') }}" class="user_pic" />
				<h3 class="user_email">@if(Auth::check()) {{Auth::user()->email }} @else @endif</h3>
			</div>
		</div>
		<ul class="menu_list list-unstyled visible-xs visible-sm">
<ul class="menu_list list-unstyled visible-xs visible-sm">
	<li><a href="{{env('MENU_ESPACECANDIDAT')}}">Connexion/Inscription</a></li>
    <li><a href="{{env('MENU_ANNONCES')}}">Annonces</a></li>
	<li><a href="{{env('MENU_FOOTER_DEPOT')}}">Déposez votre Annonce</a></li>
    <li><a href="{{env('MENU_CANDIDATURE_SPONTANEE')}}">Candidature Spontanée</a></li>
    <li><a href="{{env('MENU_ACTUALITES')}}">Blog</a></li>

</ul>

	@endif
</nav>
<nav class="top_bar hidden-xs hidden-sm" style="list-style-type: none;"> 
	<ul class="list-inline menu_list list-unstyled">
	@if(Auth::check())
			<li style="padding-left:25px">
				<a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    Deconnexion
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
			</li>
 <li><a href="{{env('MENU_ANNONCES')}}">Annonces</a></li>
			    <li><a href="{{env('MENU_FOOTER_DEPOT')}}">Déposez votre Annonce</a></li>
    			<li><a href="{{env('MENU_CANDIDATURE_SPONTANEE')}}">Candidature Spontanée</a></li>
    			<li><a href="{{env('MENU_ACTUALITES')}}">Blog</a></li>
    <li><a href="{{ route('moncv') }}">Mon Compte</a></li>

    @else 
        <li style="padding-left:25px"><a href="https://candidats.emploi-paysagiste.fr/emploi/public/login">Connexion/Inscription</a></li>
 <li><a href="{{env('MENU_ANNONCES')}}">Annonces</a></li>
			    <li><a href="{{env('MENU_FOOTER_DEPOT')}}">Déposez votre Annonce</a></li>
    			<li><a href="{{env('MENU_CANDIDATURE_SPONTANEE')}}">Candidature Spontanée</a></li>
    			<li><a href="{{env('MENU_ACTUALITES')}}">Blog</a></li>
    @endif
</ul>
</nav>