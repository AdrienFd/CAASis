@extends('includes.layout')

@section('header')
@include('includes.header')
@endsection

@section('main')


<div id="subscribe" class="form" style="display : block;">
    <form id="subscribe" method="POST" action="{{ route('register') }}">
        @csrf
        <h3>S'enregistrer</h3>
        <div class="fieldset">
            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                value="{{ old('email') }}" required>

        </div>

        <div class="fieldset">
            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                name="password" required>
        </div>

        <div class="fieldset">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
        </div>

            <button type="submit" id="contact-submit">Inscription</button>
    </form>
</div>
@endsection
