@extends('includes.layout')

@section('header')
@include('includes.header')
@endsection

@section('main')
<!-- if user is not connected he can register via the form -->
@if(!Auth::check())
<div id="subscribe" class="form" style="display : block;">
    <form method="POST" action="{{ route('subscribe') }}">
        @csrf

        <h3>S'enregistrer</h3>
        @if ($errors->has('check'))
            <p class="form_errors" role="alert">L'inscription requiert l'acceptation des cookies et règles générales</p>
            @endif
        <!-- Email field -->
        <div class="fieldset">
            @if ($errors->has('email'))
            <p class="form_errors" role="alert">L'email est déja utilisée ou ne correspond pas au format demandé</p>
            @endif

            <input id="email_register" type="email" class="" name="email" placeholder="email" required>
            <p id="email_register_error" class="form_errors"></p>
        </div>

        <!-- PSW field -->
        <div class="fieldset">
            @if ($errors->has('password'))
            <p class="form_errors" role="alert">Le mot de passe ne correspond pas au format demandé ou les mots de
                passe ne sont pas les mêmes</p>
            @endif

            <input id="password_register" type="password" class="" name="password" placeholder="mot de passe" required>
            <p id="password_register_error" class="form_errors"></p>
        </div>

        <!-- PSW confirm field -->
        <div class="fieldset">
            <input id="password_confirm" type="password" class="" name="password_confirmation" placeholder="répéter mot de passe"
                required>
            <p id="password_confirm_error" class="form_errors"></p>
        </div>

        <!-- Button & link aera -->
        <div>
            <select id="inscription_location" class="form_lists" name="location">
                <!-- loop that genrate all option with all location -->
                @foreach($locations as $location)
                <option value="{{$location->id_location}}">{{$location->location_name}}</option>
                @endforeach
            </select>
        </div>

        <label>Acceptez-vous le stockage de vos données personnelles ainsi que la réglementation générale ? <a href="{{ route('mention') }}" target="_blank">mention légales</a></label>
        <div class="fieldset">
                <input type="checkbox" name="rules" value="Yes" >
        </div>

        <label>Acceptez-vous l'utilisation des cookies (les cookies sont nécessaires pour l'authentification sur le site) ?</label>
        <div class="fieldset" >
                <input type="checkbox" name="cookie" value="Yes" >
        </div>

        <button type="submit" id="register-submit">Inscription</button>
        <a href="{{ route('login') }}" class="form_link">Se connecter</a>

    </form>
</div>

<!-- if user is connected we display that is connected he can't see the register form -->
@else
<p class="already_log">Utilisateur connecté</p>
@endif

@endsection

@section('scripts')
<script src="{{asset('js/form_inscription.js')}}"></script>
@endsection
