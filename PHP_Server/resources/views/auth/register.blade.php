@extends('includes.layout')

@section('header')
@include('includes.header')
@endsection

@section('main')

<div id="subscribe" class="form" style="display : block;">
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <h3>S'enregistrer</h3>
        <div class="fieldset">
            <input id="email_register" type="email" class="" name="email" placeholder="email" required>
            <p id="email_register_error" class="form_errors"></p>
        </div>

        <div class="fieldset">
            <input id="password_register" type="password" class="" name="password" placeholder="mot de passe" required>
            <p id="password_register_error" class="form_errors"></p>
        </div>

        <div class="fieldset">
            <input id="password_confirm" type="password" class="" name="password_confirmation" placeholder="répéter mot de passe" required>
            <p id="password_confirm_error" class="form_errors"></p>
        </div>

        <div>
            <select id="inscription_location" class="form_lists">
                <option value="">D'où venez vous ?</option>
                <option value="Aix-en-Provence">Aix-en-Provence</option>
                <option value="Angoulême">Angoulême</option>
                <option value="Arras">Arras</option>
                <option value="Bordeaux">Bordeaux</option>
                <option value="Brest">Brest</option>
                <option value="Caen">Caen</option>
                <option value="Châteauroux">Châteauroux</option>
                <option value="Dijon">Dijon</option>
                <option value="Grenoble">Grenoble</option>
                <option value="La rochelle">La rochelle</option>
                <option value="Le Mans">Le Mans</option>
                <option value="Lille">Lille</option>
                <option value="Lyon">Lyon</option>
                <option value="Montpellier">Montpellier</option>
                <option value="Nancy">Nancy</option>
                <option value="Nantes">Nantes</option>
                <option value="Nice">Nice</option>
                <option value="Orléans">Orléans</option>
                <option value="Paris Nanterre">Paris Nanterre</option>
                <option value="Pau">Pau</option>
                <option value="Reims">Reims</option>
                <option value="Rouen">Rouen</option>
                <option value="Saint-Nazaire">Saint-Nazaire</option>
                <option value="Strasbourg">Strasbourg</option>
                <option value="Toulouse">Toulouse</option>
            </select>
        </div>

        <button type="submit" id="register-submit">Inscription</button>
    </form>
</div>
@endsection

@section('scripts')
<script src="{{asset('js/form_inscription.js')}}"></script>
@endsection