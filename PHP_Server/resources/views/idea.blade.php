@extends('includes.layout')

@section('header')
@include('includes.header')
@endsection

@section('main')

<div class="ideaBox_content">

    <?php $i=0; ?>
    @if(Auth::check())
        <button name="add" type="button" onclick="open_popup()">+</button>
    
        <div class="form" id="addIdea">
            <form method="post" action="{{ route('add') }}" >
                @csrf
                <h3>Ajouter idée</h3>
                <div class="fieldset">
                    @if ($errors->has('email') || $errors->has('password'))
                        <p class="form_errors" role="alert">Aucun compte n'est associé à cet email ou aucun enreigstrement ne correspond au couple email / mot de passe entré</p>
                    @endif
                    <input type="email" class="" name="email" placeholder="email" required autofocus>
                </div>
                <div class="fieldset">
                    <input type="password" class="" name="password" placeholder="mot de passe" required>
                </div>
                <button name="submit" type="submit">Connexion</button>
                <button name="close" type="button" onclick="close_popup()">Fermer</button>
            </form>
        </div>
    @endif

    @foreach($manifestations as $row)
        <div class="idea">
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

            @if(Auth::check())
                @if(!$voted[$i])
                <form method="post" action="{{ route('vote') }}">
                    @csrf
                    <button name="id" type="submit" value="{{ $row->id_manifestation }}" class="button votes">Vote!</button>
                </form>
                @endif
            @endif

            <div class="button count"> {{ $votes[$i] }} </div>
        </div>
        <?php $i++; ?>
    @endforeach
    {{$manifestations->links()}}
</div>
@endsection

@section('scripts')
<script src="{{asset('js/popup_addidea.js')}}"></script>
@endsection