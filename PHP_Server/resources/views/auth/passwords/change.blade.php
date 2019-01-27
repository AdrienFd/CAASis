@extends('includes.layout')

@section('header')
@include('includes.header')
@endsection

@section('main')

<div class="form" style="display:block; position:relative; z-index:0">
    <form method="POST" action="{{ route('changePSW') }}">
        
        @csrf

        @if ($errors->any())
            <span class="form_errors" role="alert">
            @foreach ($errors->all() as $message)
                <strong>{{ $message }}</strong><br>
            @endforeach
            </span>
        @endif

        <div class="fieldset">
            <input type="email" placeholder="email" name="email" required>
        </div>
        <div class="fieldset">

            <input type="password" placeholder="mot de passe actuel" name="actual_password" required>
        </div>
        <div class="fieldset">
            <input type="password" placeholder="nouveau mot de passe" name="new_password" required>
        </div>
        <div class="fieldset">
            <input type="password" placeholder="répéter nouveau mot de passe" name="new_password_confirmation" required>
        </div>

        <button name="submit" type="submit">Changer mot de passe</button>
    </form>
    </div>

@endsection
