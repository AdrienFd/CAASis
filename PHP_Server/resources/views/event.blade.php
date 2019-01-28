@extends('includes.layout')

@section('header')
    @include('includes.header')
@endsection

@section('main')
<div>
<?php
$description = "description_left";
$image = "img_right";
$i=0;
?>

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
            <img src="{{ $url[$i] }}" alt="test">
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
