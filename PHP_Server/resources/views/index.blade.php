@extends('includes.layout')

@section('header')
    <button href="#navPanel" class="menu_button">&#x2630</button>
    
    @include('includes.navbar')

    <!-- Background image -->
    <div id="bg"></div>
@endsection

@section('main')
<!-- Container of the 2 sections -->
<div class="container">

<!-- WebSite's description -->
<div class="section left">
    <h2>Description</h2>
    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fuga eum nihil suscipit dolorum!Blanditiisnisi quidelectus veniam expedita, possimus ad eius exercitationem voluptates numquam molestiae, quae, asitcupiditate.Lorem ipsum dolor sit amet consectetur adipisicing elit. Et accusamus hic, nobis nihil dictaerror?</p>

    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam autem eius ullam. Pariatur voluptate culpa illum. Soluta, natus, aut nemo dolor dolorum, quos quasi facere repellat modi fugiat ut quod.</p>
    
    </div>
    <!-- Location image, to replace with the google map's api -->
    <div class="section right">
        <h2>Locations</h2>
        <img src="/img/location.png">
    </div>
</div>
@endsection
