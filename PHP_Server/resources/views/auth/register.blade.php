@extends('includes.layout')

@section('header')
@include('includes.header')
@endsection

@section('main')

    @if(!Auth::check())
        <div id="subscribe" class="form" style="display : block;">
            <form method="POST" action="{{ route('subscribe') }}">
                @csrf

                <h3>S'enregistrer</h3>

                <div class="fieldset">
                    @if ($errors->has('email'))
                        <p class="form_errors" role="alert">L'email est déja utilisé où ne correspond pas au format demandé</p>
                    @endif
                    
                    <input id="email_register" type="email" class="" name="email" placeholder="email" required>
                    <p id="email_register_error" class="form_errors"></p>
                </div>

                <div class="fieldset">
                    @if ($errors->has('password'))
                        <p class="form_errors" role="alert">Le mot de passe ne correspond pas au format demandé</p>
                    @endif

                    <input id="password_register" type="password" class="" name="password" placeholder="mot de passe" required>
                    <p id="password_register_error" class="form_errors"></p>
                </div>

                <div class="fieldset">
                    <input id="password_confirm" type="password" class="" name="password_confirmation" placeholder="répéter mot de passe" required>
                    <p id="password_confirm_error" class="form_errors"></p>
                </div>

                <div>
                    <select id="inscription_location" class="form_lists" name="location">
                    @foreach($locations as $location)
                        <option value="{{$location->id_location}}">{{$location->location_name}}</option>
                    @endforeach
                    </select>
                </div>

                <button type="submit" id="register-submit">Inscription</button>
                <a href="login" class="form_link">Se connecter</a>

            </form>
        </div>
    @else
        <p class="already_log">Utilisateur connecté</p>
    @endif

@endsection

@section('scripts')
    <script src="{{asset('js/form_inscription.js')}}"></script>
@endsection