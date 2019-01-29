@extends('includes.layout')

@section('header')
@include('includes.header')
@endsection

@section('main')
<!-- form for reseting the password by sending email display only if user is disconnect-->
@if(!Auth::check())
<form class="form" style="position:relative; display:block; z-index:0;" method="POST" action="{{ route('resetPSW') }}">

    @csrf

    <!-- display of the first error -->
    @if ($errors->any())
    <span class="form_errors" role="alert">
        <strong>{{ $errors->first() }}</strong>
    </span>
    @endif

    <!-- email field -->
    <div class="fieldset">
        <input id="email" type="email" placeholder="email" name="email" required>
    </div>

    <!-- submit button -->
    <button type="submit">Envoyé un mail de réinitialisation</button>
</form>
<!-- if user connected display : -->
@else
<p class="already_log">Utilisateur connecté</p>
@endif
@endsection
