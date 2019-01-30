@extends('includes.layout')

@section('header')
@include('includes.header')
@endsection

@section('main')
<!-- declare variable for alterning left and right event style, also a counter for the foreach -->
<?php
$description = "description_left";
$image = "img_right";
$i=0;
?>

<!-- if the user is a member of the SDK then hhe can add an event with the form -->
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

<!-- Loop that create the event of the page -->
@foreach($manifestations as $row)
<!-- alternate between left and right style at each tour of the loop -->
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

<!-- if the user is an employee he can see if the event is approbate or not, if not approbate he can approbate the event-->
@if(session('statut') == "Employee" && is_null($row->id_member_approbator ))
    <div class="form" id="{{ $row->id_manifestation }}">
            <form method="post" action="{{ route('approbateEvent') }}">
                @csrf

                <input type="hidden" name="event" value="{{ $row }}" >

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

    <div style="background-color : rgba(178,34,34,0.5)" onclick="open_approbate({{ $row->id_manifestation }})">
<!-- the user is an employee and the event is already approved -->
@elseif(session('statut') == "Employee")
    <div style="background-color : rgba(173,255,47,0.5)">
<!-- else it's a guest, student or member of student desk, they see the events that are approbate -->
@else
    <div>
@endif

<!-- display of the event -->
<div class="event" style="border-bottom: 1px solid #D3D3D3">
    <div class="{{ $image }}">
        <img src="{{ $url[$i] }}" alt="<?php echo explode('$',$name[$i])[0] ?>">
    </div>

    <div class="{{ $description }}">
        <div class="bloc">
            <h2>{{ $row -> manifestation_name }}</h2>
            <p>{{ $row -> manifestation_description }}</p>
            <a href="{{Route('event', ['name' => $row->manifestation_name,  'id' => $row->id_manifestation]) }}" class="read_more">LIRE LA SUITE</a>
        
            @if(Auth::check())
            @if(!$participated[$i])
                        <form method="post" action="{{ route('participate') }}">
                            @csrf
                            <button name="id_event" type="submit" value="{{ $row->id_manifestation }}">PARTICIPER</button>
                        </form>
            @endif
            @endif

        </div>
    </div>
</div>
</div>

<!-- increment the counter -->
<?php $i++; ?>
@endforeach

<!-- pagination links -->
<div class="pagination_bottom">
        {{$manifestations->links()}}
    </div>
</div>
</div>
@endsection

@section('scripts')
<script src="{{asset('js/approbate.js')}}"></script>
<script src="{{asset('js/popup_addevent.js')}}"></script>
@endsection
