@extends('includes.layout')

@section('stylesheets')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection


@section('header')
    @include('includes.header')
@endsection

@section('main')
    <!-- button to get the table with all participant of that event -->
    @if(session('statut') == "Student Desk Member")
    <a href="{{Route('listParticipant', ['name' => $name,  'id' => $id ]) }}" class="read_more" style="margin: 15px 10px; float:none; text-align:center">Liste participants</a>
    @endif

    <!-- button to dowload the pictures -->
    @if(session('statut') == "Employee")
    <a href="{{Route('download', ['name' => $name,  'id' => $id ]) }}" class="read_more"  style="margin: 15px 10px; float:none; text-align:center">Téléchargé images</a>
    @endif

    <!-- is user is connected he can add a picture to this event -->
    @if(Auth::check())
    <!--<button type="button" name="add" onclick="open_popup('addImg')">+</button>-->

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
            <button name="close" type="button" onclick="close_popup('addImg')">Fermer</button>
        </form>
    </div>
    @endif


    <div class="presentation">
        <h2>Programmé le : {{ $event->manifestation_date }}</h2>

        <div class="presentation">
            <h2>PRESENTATION</h2>
            <p>{{ $event->manifestation_description }}</p>
        <div>    
            <div class="event_price" style="float : left; margin-top : 3.5px">{{ $event->manifestation_price }} Euros</div>
            
            <!-- if user asn't participate to that event display the participate button -->
            @if(Auth::check())
                @if(!isset($participated))
                <form method="post" action="{{ route('participate') }}">
                    @csrf
                    <button name="id_event" type="submit" value="{{ $event->id_manifestation }}" style="float:right; margin-bottom : 5px;">JE PARTICIPE!</button>
                </form>
                @endif
            @endif
            </div>
        </div>
    </div>

    <!-- the event data display -->
    Q<div class="presentation" style="border-top: 2px solid #111; padding-top: 4px;">


        <div class="first_bloc">
        
            <!-- for each img in imgs put the img in the bar of img-->
            <div class="image_list" style="float: left; width: 20%; height: 50vh; max-height:400px; overflow-x: hidden; overflow-y:scroll">
            <?php $i=0; ?>
            @foreach($imgs as $img)
                <img id="{{$img->id_img}}" src="{{$img->img_url}}" onclick="switch_img('{{$img->id_img}}','{{$img->img_url}}','{{ $likes[$i] }}','{{ $asLike[$i] }}','{{ csrf_token() }}','{{ route('like') }}','{{ Auth::id() }}')" style="width: 100%; height: 100px; object-fit: cover; margin-right: 5px;" alt="<?php echo explode('$',$img->img_name)[0] ?>">   
                <?php $i++; ?>
                @endforeach
            </div>

            <!-- if imgs is 'not null' pût the first pic in the big div -->
            <div class="images" style="float: left; width: 80%; height: 50vh; max-height:400px;">
            @if($imgs != [])
                <img id="main_img" id="{{$imgs[0]->id_img}}" src="{{$imgs[0]->img_url}}" alt="<?php echo explode('$',$imgs[0]->img_name)[0] ?>"  style="width: 100%; height: 100%; object-fit: cover;  margin-left: 5px;">

                @if(Auth::check()) 
                <a id="like" onclick="likeImg('{{$imgs[0]->id_img}}','{{ csrf_token() }}','{{ route('like') }}')" <?php if($asLike[0]==1) echo 'style="display:none;"' ?> class="read_more">J'AIME !</a>
                <a id="add" onclick="open_popup('addImg')" style="margin-left:5px; float:left" class="read_more">AJOUTER UNE IMAGE</a>
                @endif
                Nombre de likes : <div id="display_like">{{ $likes[0] }}</div>
                
            <!-- else put default picture -->
            @else
                <img src="{{ asset('img/index.png') }}" alt="CASSIS LOGO">
                @if(Auth::check())
                <a id="add" onclick="open_popup('addImg')" style="margin-left:5px; float:left" class="read_more">AJOUTER UNE IMAGE</a>
                @endif
            @endif


            
            </div>
        </div>
    </div>

    <!--- comment aera -->
    <div class="presentation">
    <h2>LAST COMMENT</h2>
        <div class="last_comment" style=" height : 500px; overflow-x: hidden; overflow-y:scroll">
            <div class="comment_img3">
                <h3>Auteur: BDE_MEMBER</h3>
                Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                Eaque totam est aliquid minus. Excepturi quos cupiditate velit
                tempore iste, rerum maiores eum quaerat, neque nam obcaecati dolorem inventore, consequuntur laboriosam?
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{asset('js/popup.js')}}"></script>
<!-- Script to change img in the main div -->
<script src="{{asset('js/event_image_ajax.js')}}"></script>
@endsection
