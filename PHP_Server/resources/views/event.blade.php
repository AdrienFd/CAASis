@extends('includes.layout')

@section('header')
@include('includes.header')
@endsection

@section('main')
<?php
$description = "description_left";
$image = "img_right";
$i=0;
?>

@if(session('statut') == "Student Desk Member")
<button type="button" name="add" onclick="open_popup()">+</button>

<div class="form" id="addEvent">
    <form method="post" action="{{ route('addEvent') }}">
        @csrf

        <div class="fieldset">
            <input type="text" name="name" placeholder="name" required>
        </div>

        <div class="fieldset">
            <textarea name="desc" placeholder="description" required></textarea>
        </div>

        <div class="fieldset">
            <input type="date" name="date" required>
        </div>

        <div class="fieldset">
            <input type="checkbox" name="reccurent" value="Yes">Récurent ?<br>
        </div>

        <div class="fieldset">
            <input type="number" name="reccurency" placeholder="délai de réccurence">
        </div>

        <div class="fieldset">
            <input type="number" name="price" placeholder="prix">
        </div>

        <button name="id" type="submit" value="" class="">Ajouter event</button>
        <button name="close" type="button" onclick="close_popup()">Fermer</button>
    </form>
</div>
@endif

@foreach($manifestations as $row)
<?php
    if($description == "description_left" && $image == "img_right"){
        $description = "description_right";
        $image = "img_left";
    }
    else{
        $description = "description_left";
        $image = "img_right";
    }
?>

@if(is_null($row->id_member_approbator ))
<div style="background-color : rgba(173,255,47,0.5)">
@else
<div style="background-color : rgba(178,34,34,0.5)">
@endif
<div class="event" onclick="open_approbate({{ $row->id_manifestation }})">
    <div class="{{ $image }}">
        <img src="{{ $url[$i] }}" alt="{{ $name[$i] }}">
    </div>

    <div class="{{ $description }}">
        <div class="bloc">
            <h2>{{ $row -> manifestation_name }}</h2>
            <p>{{ $row -> manifestation_description }}</p>
            <a href="{{Route('event', ['name' => $row->manifestation_name,  'id' => $row->id_manifestation]) }}" class="read_more">LIRE LA SUITE</a>
        </div>
    </div>
</div>
</div>
@if(session('statut') == "Employee")
<div class="form" id="{{ $row->id_manifestation }}">
        <form method="post" action="approbateEvent">
            @csrf

            <input type="hidden" name="id_event" value="{{ $row->id_manifestation }}" >

            <div class="fieldset">
                <div>{{ $row->manifestation_name }}</div>
            </div>

            <div class="fieldset">
                <div>{{ $row->manifestation_description }}</div>
            </div>

            <button name="id" type="submit" value="" class="">Approbate</button>
            <button name="close" type="button" onclick="close_approbate('{{ $row->id_manifestation }}')">Fermer</button>
        </form>
</div>
@endif
<?php $i++; ?>
@endforeach

{{$manifestations->links()}}
</div>
@endsection

@section('scripts')
<script src="{{asset('js/approbate.js')}}"></script>
<script src="{{asset('js/popup_addevent.js')}}"></script>
@endsection
