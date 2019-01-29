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
            <input type="text" name="name" placeholder="nom" required>
        </div>

        <div class="fieldset">
            <textarea name="desc" placeholder="description" required></textarea>
        </div>

        <div class="fieldset">
            <input type="date" name="date" required>
        </div>

        <div class="fieldset">
            <input type="checkbox" name="reccurent" value="Yes">Récurrent ?<br>
        </div>

        <div class="fieldset">
            <input type="number" name="reccurency" placeholder="fréquence">
        </div>

        <div class="fieldset">
            <input type="number" name="price" placeholder="prix">
        </div>

        <button name="id" type="submit" value="" class="">Ajouter un événement</button>
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

<div class="event">
    <div class="{{ $image }}">
        <img src="{{ $url[$i] }}" alt="{{ $alt[$i] }}">
    </div>
    <div class="{{ $description }}">
        <div class="bloc">
            <h2>{{ $row -> manifestation_name }}</h2>
            <p>{{ $row -> manifestation_description }}</p>
            <a href="{{Route('event', [ 'id' => $row->id_manifestation]) }}" class="read_more">LIRE LA SUITE</a>
        </div>
    </div>
</div>

<?php $i++; ?>
@endforeach

{{$manifestations->links()}}
</div>
@endsection

@section('scripts')
<script src="{{asset('js/popup_addevent.js')}}"></script>
@endsection