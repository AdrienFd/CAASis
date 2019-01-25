@extends('includes.layout')

@section('header')
@include('includes.header')
@endsection

@section('main')
<div class="form" style="display:block; position:relative; z-index:-1">
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <h3>Se connecter</h3>
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
@endsection
