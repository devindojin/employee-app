@extends('layouts.main')

@section('title', 'Home')

@section('content')

<div class="col-xs-12 header-section">
<p>Le spécialiste du recrutement paysager</p>
</div>
<div class="col-xs-12 margin-top-20">
    <div class="action_block text-center">
    @guest
      <a class="btn hm-btn" href="{{ route('login') }}">Espace Candidat</a>
    @else
        <a class="btn hm-btn" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
            Deconnexion
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    @endguest
    </div>
</div>
<div class="col-xs-12 margin-top-20">
    <div class="action_block text-center">
      <a class="btn hm-btn" href="">Espace Recruteur</a>
    </div>
</div>

<div class="col-xs-12">
    <p class="home-heading">N'attendez plus pour changer d'emploi!</p>
    
    <div class="action_block text-center">
      <a class="btn hm-btn" href="">Postulez aux offres</a>
    </div>
</div>

<div class="col-xs-12">
    <p class="home-heading">
        Le site dédié  aux metiers du paysage
    </p>

    <p>
        Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum 
    </p>
</div>

<div class="col-xs-12 margin-top-20">
    <div class="col-xs-3"><p><b>2.2K</b><br>Shares</p></div>
    <div class="col-xs-3 hm-fb"></div>
    <div class="col-xs-3 hm-lkin"></div>
    <div class="col-xs-3 hm-plus"></div>
</div>
@endsection