@extends('includes.layout')

@section('header')
@include('includes.header')
@endsection

@section('main')



<div class="shop_content">
    <h2>Contenu de votre panier</h2>
    <!-- create all article in the shop -->
    <?php $price=0; ?>
    @foreach($shopping_card as $row)
    <a href="{{Route('article', ['name' => $row->article_name,  'id' => $row->id_article]) }}">
        <div class='displayprod'>
            <img style="width:250px; height:150px; object-fit:cover;" src="{{ $row->image->img_url }}" class='prodpic'
                alt="<?php echo explode('$',$row->image->img_name)[0] ?>" />
            <div class='price'>
                {{ $row->article_price }} €
            </div>

            <div class='description'>
                {{ $row->article_name }}
            </div>
            <form method="post" action="{{ route('deleteFromCard') }}">
                @csrf
                <button name="id_article" value="{{ $row->id_article }}" type="submit">Retirer du panier</button>
            </form>
        </div>
    </a>
    <?php $price=$price+$row->article_price; ?>
    @endforeach

    <a href="{{ route('shop') }}"><button type="button" name="add">&#x23CE</button></a>

    @if(Auth::check())
    <form method="post" action="">
    @csrf
    <button name="command" type="submit" value="" class="command">ACHETER LE PANIER POUR {{ $price }} € </button>
    </form>
    @endif

</div>

@endsection

