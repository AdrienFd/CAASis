@extends('includes.layout')

@section('header')
@include('includes.header')
@endsection

@section('main')
<div class="presentation">
    <h2>{{ $article->article_name }}</h2>

    <div class="article">
        <div class="article_img">
            <img src="{{ $article->image->img_url }}" alt="<?php echo explode('$',$article->image->img_name)[0] ?>">
        </div>
        <div class="article_description">
            <h2>Description</h2>
            <p>{{ $article->article_description }}</p>
            <div class="article_price">{{ $article->article_price }} €</div>


            @if(Auth::check() && !isset($check))
            <form method="post" action="{{ route('addToCart') }}">
                @csrf
                <button name="id_article" value="{{ $article->id_article }}" class="buy_button" type="submit">Ajouter au panier</button>
            </form>

            @else
                <a href="{{ route('shopping_card') }}"><button class="buy_button" type="submit">Panier</button></a>
            @endif

        </div>
    </div>
</div>
@endsection
