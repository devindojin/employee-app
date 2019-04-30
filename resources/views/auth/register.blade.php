@extends('layouts.main')

@section('title', 'Register')

@section('content')
<div class="col-xs-12">
    <div class="login_wrapper">
        <form method="POST" action="{{ route('register') }}" class="form-signin">
            @csrf
            <h3 class="title">Inscrivez-vous</h3>
            <h4>Créez votre espace pour bénéficier de nos services:<br><br>CV enregistré, création de vos alertes, visibilité de vos candidatures </h4>
            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required placeholder="Votre email">
            @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif
            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Votre mot de passe">
            @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
            @endif
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
            <button type="submit" class="btn btn-lg btn-default">
                Je crée mon compte
            </button>
            <div class="display_flex other_option">   
                <label class="checkbox ">
                    <input type="checkbox" value="remember-me" id="rememberMe" name="rememberMe">
                    Recevoir par email des informations sur L'emploi et les formations de la part des partenaires d'Emploi Paysagiste
                </label>
            </div>
            <hr>
            <h4 class="title">Protection de vos donnees personnelles</h4>
            <h5>Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum</h5>
        </form>
    </div>
</div> 
@endsection
