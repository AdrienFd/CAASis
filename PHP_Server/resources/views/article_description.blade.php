@extends('includes.layout')

@section('header')
    @include('includes.header')
@endsection

@section('main')
<div class="presentation">
    <h2>{{ $article->article_name }}</h2>

    <div class="article">
        <div class="article_img">
            <img src="{{ $article->image->img_url }}" alt="Première photo du T shirt">
        </div>
        <div class="article_description">
            <h2>Description</h2>
            <p>{{ $article->article_description }}</p>
            <div class="article_price">{{ $article->article_price }} €</div>
            <button class="buy_button">BUY</button>
        </div>
    </div>
</div>
@endsection
