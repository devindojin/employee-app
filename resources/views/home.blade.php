@extends('layouts.main')

@section('title', 'Home')

@section('content')
<div class="col-xs-12">
    <div class="login_wrapper">
        <form method="POST" action="{{ route('login') }}" class="form-signin">
            @csrf
            <h3 class="title">Vous êtes déjà membre?</h3>
            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus placeholder="Votre email">
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
            <div class="display_flex other_option">   
                <label class="checkbox ">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    Rester connecté(e)
                </label>
                <label class="checkbox">
                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            Mot de passe oublié?
                        </a>
                    @endif
                </label>
            </div>
            <button type="submit" class="btn btn-lg btn-default">
                Je me connecte
            </button>
            <h4 class="title">vous êtes nouveau?<br>Accédez a tous nos services</h4>
            <a href="{{ route('register') }}" class="btn btn-lg btn-default">Je m'inscris</a>
        </form>
    </div>
</div>
@endsection
