@extends('includes.layout')

@section('header')
    @include('includes.header')
@endsection

@section('main')
<div class="presentation">
    <h2>NOM DE L'ARTICLE</h2>

    <div class="article">
        <div class="article_img">
            <img src="/img/articles_img/article_img.jpg" alt="Première photo du T shirt">
        </div>
        <div class="article_description">
            <h2>Description</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Molestias necessitatibus perspiciatis expedita beatae deserunt, sed ipsa quasi, inventore eos velit
                pariatur et.
                Minima in exercitationem est possimus mollitia quisquam nihil!</p>
            <div class="article_price">10 Euros</div>
            <button class="buy_button">BUY</button>
        </div>
    </div>
</div>
@endsection
