@extends('includes.layout')

@section('header')
@include('includes.header')
@endsection

@section('main')

<div class="ideaBox_content" id="top">

    <?php $i=0; ?>
    <!-- if user is connected he can add idea -->
    @if(Auth::check())
    <button type="button" name="add" onclick="open_popup('addIdea')">+</button>

    <div class="form" id="addIdea">
        <form method="post" action="{{ route('addIdea') }}">
            @csrf
            <h3>Ajouter idée</h3>
            <div class="fieldset">
                <input type="text" class="" name="name" placeholder="name" required autofocus>
            </div>
            <div class="fieldset">
                <textarea class="" name="description" placeholder="description" required></textarea>
            </div>
            
            <button name="submit" type="submit">Ajouter l'idée</button>
            <button name="close" type="button" onclick="close_popup('addIdea')">Fermer</button>
        </form>
    </div>

    @endif

    <!-- idea loop generator -->
    @foreach($manifestations as $row)

    <!-- if user is a member of the student desk we allow him to get for each idea a form to put the idea into an event -->
    @if(session('statut') == "Student Desk Member")
    <div class="form" id="{{ $row->id_manifestation }}">
        <form method="post" action="{{ route('moveToEvent') }}">
            @csrf

            <input type="hidden" name="id_idea" value="{{ $row->id_manifestation }}" >
            <input type="hidden" name="id_creator" value="{{ $row->id_member_suggest }}" >

            <div class="fieldset">
                <input type="text" name="name" value="{{ $row->manifestation_name }}" required>
            </div>

            <div class="fieldset">
                <textarea name="desc" required>{{ $row->manifestation_description }}</textarea>
            </div>

            <div class="fieldset">
                <input type="date" name="date" required>
            </div>

            <div class="fieldset" style="transform: translateY(10px)">
                Récurent ?
                <input type="checkbox" name="reccurent" value="Yes" style="transform: translate(70px,-20px)">
            </div>

            <div class="fieldset">
                <input type="number" name="reccurency" placeholder="délai de réccurence">
            </div>

            <div class="fieldset">
                <input type="number" name="price" placeholder="prix">
            </div>

            <button name="id" type="submit" value="" class="">To event</button>
            <button name="close" type="button" onclick="close_popup('{{ $row->id_manifestation }}')">Fermer</button>
        </form>
    </div>
    @endif

    <!-- generate the idea box with the idea name, desc, number of vote vote button ... -->
    <div class="idea">
        <div onclick="open_popup('{{ $row->id_manifestation }}')">
            <div class="idea_name">
                <h2>
                    {{ $row->manifestation_name }}
                </h2>

            </div>

            <div class="idea_author">
                By {{ $row->member_suggest->member_name }} {{ $row->member_suggest->member_firstname }}
            </div>

            <div class="idea_description">
                <p>
                    {{ $row->manifestation_description }}
                </p>
            </div>
        </div>
        <!-- if user is asn't voted for the idea display the vote button -->
        @if(Auth::check())
                @if(!$voted[$i])
                <form method="post" action="{{ route('vote') }}">
                    @csrf
                    <button name="id" type="submit" value="{{ $row->id_manifestation }}" class="button votes">Voter!</button>
                </form>
                @else
                <button name="id" type="button" value="{{ $row->id_manifestation }}" class="button voted">Voté!</button>
                @endif
            @endif

        <div class="button count" onclick="open_popup('{{ $row->id_manifestation }}')"> {{ $votes[$i] }}
        </div>
    </div>

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

<script src="{{asset('js/popup.js')}}"></script>
@endsection
