@extends('includes.layout')

@section('header')
@include('includes.header')
@endsection

@section('main')
    @if(!Auth::check())
    <form class="form" style="position:relative; display:block; z-index:0;" method="POST" action="{{ route('resetPSW') }}">
        
        @csrf
        @if ($errors->any())
            <span class="form_errors" role="alert">
                <strong>{{ $errors->first() }}</strong>
            </span>
        @endif

        <div class="fieldset">
            <input id="email" type="email" placeholder="email" name="email" required>
        </div>

        <button type="submit">Envoyé un mail de réinitialisation</button>
    </form>
    @else
        <p class="already_log">Utilisateur connecté</p>
    @endif
@endsection
