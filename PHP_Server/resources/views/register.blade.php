@extends('includes.layout')

@section('header')
@include('includes.header')
@endsection

@section('main')


<form method="post">
    <input type="member_email" name="email" placeholder="Email">
    <input type="password" name="password" placeholder="Password">
    <input type="password" name="password_confirmation" placeholder="Password (confirmation)">

</form>
@endsection
