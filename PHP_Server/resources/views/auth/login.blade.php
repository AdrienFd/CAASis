@extends('includes.layout')

@section('header')
@include('includes.header')
@endsection

@section('main')

    @if(!Auth::check())
        <div class="form" style="display:block; position:relative; z-index:0">
            <form method="POST" action="{{ route('authenticate') }}">
                @csrf

                <h3>Se connecter</h3>

                @if($errors->any())
                    <h4 class="form_errors">{{$errors->first()}}</h4>
                @endif

                <div class="fieldset">               
                    <input id="email" type="email" class="" name="email" placeholder="email" required>
                </div>

                <div class="fieldset">
                    <input id="password" type="password" class="" name="password" placeholder="mot de passe" required>
                </div>

                <button name="submit" type="submit" id="contact-submit">Connexion</button>
                <a href="{{ route('register') }}" class="form_link">S'inscrire</a>
                <a href="{{ route('resetPSW') }}" class="form_link">Mot de passe oublié ?</a>

            </form>
        </div>
    @else
        @if($errors->any())
            <p class="already_log">{{$errors->first()}}</p>
        @endif
        <p class="already_log">Utilisateur connecté</p>
    @endif

@endsection
