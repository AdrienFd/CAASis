@extends('includes.layout')

@section('header')
@include('includes.header')
@endsection

@section('main')
<!-- form for changing the password display only if user is connected-->
@if(Auth::check())
<div class="form" style="display:block; position:relative; z-index:0">
    <form method="POST" action="{{ route('changePSW') }}">

        @csrf

        <!-- error capture & display -->
        @if ($errors->any())
        <span class="form_errors" role="alert">
            @foreach ($errors->all() as $message)
            <strong>{{ $message }}</strong><br>
            @endforeach
        </span>
        @endif

        <!-- email field -->
        <div class="fieldset">
            <input id="email_register" type="email" placeholder="email" name="email" required>
            <p id="email_register_error" class="form_errors"></p>
        </div>

        <!-- actual password field -->
        <div class="fieldset">
            <input type="password" placeholder="mot de passe actuel" name="actual_password" required>
        </div>

        <!-- new password field -->
        <div class="fieldset">
            <input id="password_register" type="password" placeholder="nouveau mot de passe" name="new_password"
                required>
            <p id="password_register_error" class="form_errors"></p>
        </div>

        <!-- confirm new password field -->
        <div class="fieldset">
            <input type="password" placeholder="répéter nouveau mot de passe" name="new_password_confirmation" required>
        </div>

        <!-- submit button -->
        <button name="submit" type="submit">Changer mot de passe</button>
    </form>
</div>
<!-- if user disconnected display : -->
@else
<p class="already_log">Utilisateur non connecté, pour voir cette page vous devez être connécté</p>
@endif
@endsection

@section('scripts')
<script src="{{asset('js/form_inscription.js')}}"></script>
@endsection
