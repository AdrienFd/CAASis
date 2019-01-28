@extends('includes.layout')

@section('header')
@include('includes.header')
@endsection

@section('main')

<!-- Filter section -->
<fieldset class="filter">
    <legend>Filter</legend>

    <!-- Selection of a category -->
    <div class="categories">
        <h2>Categories</h2>
        <select name="my_html_select_box">

        <option value="category" selected="yes">All</option>
            @foreach($category as $row2)
                <option value="category">{{ $row2->category_name }}</option>
            @endforeach
        </select>
    </div>
    <!-- Selection of the price order -->
    <div class="param">
        <h2>Display</h2>

        <input type="checkbox" id="scales" name="increassing">
        <label for="scales">Increasing</label>
        <input type="checkbox" id="horns" name="descending">
        <label for="horns">Descending</label>
    </div>

    <!-- Selection of the price -->
    <div class="param" id="slider_price">
        <h2>Price</h2>
        <div class="slidecontainer">
            <input type="range" min="1" max="100" value="100" class="slider" id="myRange">
            <h2>Less than: <span id="max_price"></span> €</h2>
        </div>
    </div>

</fieldset>


<!-- Items on the shop -->
<?php $i=0; ?>
<div class="shop_content">

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

</div>



@endsection
