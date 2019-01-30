@extends('includes.layout')

@section('header')
    @include('includes.header')
@endsection

@section('main')
<!-- button to get the table with all participant of that event -->
@if(session('statut') == "Student Desk Member")
<a href="{{Route('listParticipant', ['name' => $name,  'id' => $id ]) }}" class="read_more">Liste participants</a>
@endif

<a href="{{Route('download', ['name' => $name,  'id' => $id ]) }}" class="read_more">Dowload</a>

<!-- is user is connected he can add a picture to this event -->
@if(Auth::check())
<button type="button" name="add" onclick="open_popup()">+</button>


<div class="form" id="addImg">
    <form method="post" action="{{ route('addImage')}}"  enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id_event" value="{{ $event->id_manifestation }}" required>

        <div class="fieldset">
            <input type="text" name="title" required>
        </div>
        <div class="fieldset">
            <input type="file" name="file" required>
        </div>

        <button type="submit">Upload</button>
        <button name="close" type="button" onclick="close_popup()">Fermer</button>
        
    </form>
</div>
@endif

<!-- the event data display -->
<div class="presentation">
    <h2>Programmé le : {{ $event->manifestation_date }}</h2>
    <div class="first_bloc">
  
        <!-- for each img in imgs put the img in the bar of img-->
        <div class="image_list" style="float: left; width: 20%; height: 50vh; max-height:400px;">
        @foreach($imgs as $img)
            <img id="{{$img->id_img}}" src="{{$img->img_url}}" alt="<?php echo explode('$',$img->img_name)[0] ?>" onclick="switch_img('{{$img->img_url}}')" style="width: 100%; height: 100px; object-fit: cover; margin-right: 5px;">   
        @endforeach
        </div>

        <!-- if imgs is 'not null' pût the first pic in the big div -->
        <div class="images" style="float: left; width: 80%; height: 50vh; max-height:400px;">
        @if($imgs != [])
            <img class="main_img" id="{{$imgs[0]->id_img}}" src="{{$imgs[0]->img_url}}" alt="<?php echo explode('$',$imgs[0]->img_name)[0] ?>"  style="width: 100%; height: 100%; object-fit: cover;  margin-left: 5px;">
            <form action="" method="">
            @csrf
            <button type="button" >like</button>
            <button type="button" >unlike</button>
            <button type="button" >commenter</button>
            </form>
        <!-- else put default picture -->
        @else
        <img src="{{ asset('img/index.png') }}" alt="CASSIS LOGO">
        @endif        
        </div>

        <!-- if user is asn't voted for the idea display the vote button -->
        @if(Auth::check())
        @if(!isset($participated))
        <form method="post" action="{{ route('participate') }}">
            @csrf
            <button name="id_event" type="submit" value="{{ $event->id_manifestation }}" class="read_more">Participer!</button>
        </form>
        @endif
        @endif

        
        <div class="event_description">
            <h2>PRESENTATION</h2>
            <p>{{ $event->manifestation_description }}</p>
            <div class="event_price">{{ $event->manifestation_price }} Euros</div>
        </div>
    </div>

    <div class="last_comment">
        <h2>LAST COMMENT</h2>
        <div class="comment_img1">
            <h3>Auteur: BDE_MEMBER</h3>
            Lorem, ipsum dolor sit amet consectetur adipisicing elit.
            Eaque totam est aliquid minus. Excepturi quos cupiditate velit
            tempore iste, rerum maiores eum quaerat, neque nam obcaecati dolorem inventore, consequuntur laboriosam?
        </div>

        <div class="comment_img2">
            <h3>Auteur: BDE_MEMBER</h3>
            Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Qui voluptatem obcaecati consequuntur quasi explicabo sed asperiores necessitatibus nobis ipsam beatae. Ad,
            et natus.
            Molestias provident tempore quia accusamus, assumenda repudiandae.
        </div>

        <div class="comment_img3">
            <h3>Auteur: BDE_MEMBER</h3>
            Lorem, ipsum dolor sit amet consectetur adipisicing elit.
            Eaque totam est aliquid minus. Excepturi quos cupiditate velit
            tempore iste, rerum maiores eum quaerat, neque nam obcaecati dolorem inventore, consequuntur laboriosam?
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{asset('js/popup_addimg.js')}}"></script>
<script src="{{asset('js/event_management.js')}}"></script>
@endsection
