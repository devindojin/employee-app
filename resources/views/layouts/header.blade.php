<nav class="top_bar"> 
	<div class="navbar-header">
		<a class="navbar-brand" id="menu_toggle" href="javascript:void(0)">
			<span><img src="{{ asset('images/menu.png') }}" width="20"></span>
		</a>
	</div>
	<div class="title">
		<h2 class="no_margin page_title">emploi paysagiste</h2>  
	</div>
	<div class="top_bar_right">
    	<img src="{{ asset('images/avatar.jpg') }}" class="user_pic">
	</div>

	<div id="sideNav" class="sidenav scrollbar">
		<span class="close_menu"><i class="fa fa-times"></i></span>

		<div class="user_block">
			<div class="user_detail">
				<h2 class="user_name">@if(Auth::check()) {{Auth::user()->name.' '.Auth::user()->last_name }} @else @endif</h2>
				<img src="{{ asset('images/avatar.jpg') }}" class="user_pic" />
				<h3 class="user_email">@if(Auth::check()) {{Auth::user()->email }} @else @endif</h3>
			</div>
		</div>
		<ul class="menu_list list-unstyled">
			<li><a href="#">Mon CV</a></li>
			<li><a href="#">Mes alertes mail</a></li>
			<li><a href="#">Mes offres</a></li>
			<li><a href="#">Mes cadidatures</a></li>
			<li><a href="#">Mon compte</a></li>
			@guest
			@else
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
</nav>