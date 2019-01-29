@extends('includes.layout')

@section('header')
@include('includes.header')
@endsection

@section('main')

<!-- Filter section -->
<form method="post" action="{{ route('shop') }}">
    <fieldset class="filter">
        <legend>Filter</legend>
        @csrf

        <!-- Selection of a category -->
        <div class="categories">
            <h2>Categories</h2>
            <select id="category" name="category">
                <option value="">Tout</option>
                <!-- create in the select different option with the categories of articles -->
                @foreach($category as $row)
                <!-- if the user as set a filter previously we select back that filter -->
                @if(isset($category_filter) && $category_filter == $row->id_category)
                <option value="{{$row->id_category}}" selected>{{ $row->category_name }}</option>
                @else
                <option value="{{$row->id_category}}">{{ $row->category_name }}</option>
                @endif
                @endforeach
            </select>
        </div>

        <!-- Selection of the price order -->
        <div class="param">
            <h2>Display</h2>
            <select name="price_order">
                <option value="">Prix</option>
                <!-- if the user as set a filter previously we select back that filter -->
                @if(isset($price_filter) && $price_filter == 1)
                <option value="1" selected>Croissant</option>
                @else
                <option value="1">Croissant</option>
                @endif

                @if(isset($price_filter) && $price_filter == 2)
                <option value="2" selected>Décroissant</option>
                @else
                <option value="2">Décroissant</option>
                @endif
            </select>
            <select name="name_order">
                <option value="">Nom</option>
                <!-- if the user as set a filter previously we select back that filter -->
                @if(isset($name_filter) && $name_filter == 1)
                <option value="1" selected>Croissant</option>
                @else
                <option value="1">Croissant</option>
                @endif

                @if(isset($name_filter) && $name_filter == 2)
                <option value="2" selected>Décroissant</option>
                @else
                <option value="2">Décroissant</option>
                @endif
            </select>
        </div>

        <!-- Selection of the price -->
        <div class="param" id="slider_price">
            <h2>Price</h2>
            <div class="slidecontainer">
                <!-- if the user as set a filter previously we select back that filter -->
                @if(request()->method()=='POST')
                <input name="max_price" type="range" min="1" max="100" value="{{ $slider }}" class="slider" id="myRange">
                @else
                <input name="max_price" type="range" min="1" max="100" value="100" class="slider" id="myRange">
                @endif
                <h2>Less than: <span id="max_price"></span> €</h2>
            </div>
        </div>
        <button name="submit" type="submit">Filtrer</button>
        <a href="{{ route('shop') }}"> <button type="button">Enlever les filtres</button> </a>
    </fieldset>

</form>


<!-- Items on the shop -->
<?php $i=0; ?>
<div class="shop_content">

    <!-- create all article in the shop -->
    @foreach($articles as $row)
    <div class='displayprod'>
        <img src="{{ $row->image->img_url }}" class='prodpic' />
        <div class='price'>
            {{ $row->article_price }} €
        </div>

        <div class='description'>
            {{ $row->article_name }}
        </div>
    </div>
    @endforeach

    <!-- pagination link -->
    {{$articles->links()}}
</div>
@endsection

@section('scripts')
<script src="{{asset('js/filter_price_shop.js')}}"></script>
@endsection
