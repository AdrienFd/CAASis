@extends('includes.layout')

@section('header')
@include('includes.header')
@endsection

@section('main')
<!-- form for adding memeber to student desk-->
@if(session('statut') == "Student Desk Member"))

    <!-- display of the first error -->
@if ($errors->any())
    <span class="form_errors" role="alert">
        <strong>{{ $errors->first() }}</strong>
    </span>
    @endif

<form class="form" style="position:relative; display:block; z-index:0;" method="POST" action="{{ route('addMember') }}">
    @csrf
    <!-- email field -->
    <div class="fieldset">
        <input type="email" placeholder="email" name="email" required>
    </div>
    <!-- submit button -->
    <button type="submit">Promouvoir</button>
</form>

<br>

<!-- form for removing memeber to student desk-->
<form class="form" style="position:relative; display:block; z-index:0;" method="POST" action="{{ route('removeMember') }}">
    @csrf
    <!-- email field -->
    <div class="fieldset">
        <input type="email" placeholder="email" name="email" required>
    </div>
    <!-- submit button -->
    <button type="submit">Révoqué</button>
</form>

@else
<p class="already_log">Page résérvé aux membres du BDE</p>
@endif
@endsection
