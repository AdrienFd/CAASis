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
                    <input id="email" type="email" class="" name="email" placeholder="email" required autofocus>
                </div>

                <div class="fieldset">
                    <input id="password" type="password" class="" name="password" placeholder="mot de passe" required>
                </div>

                <button name="submit" type="submit" id="contact-submit">Connexion</button>
                <a href="register" class="form_link">S'inscrire</a>

            </form>
        </div>
    @else
        <p class="already_log">Utilisateur connecté</p>
    @endif

@endsection
