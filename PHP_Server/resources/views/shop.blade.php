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

            <option value="All" selected="yes">All</option>
            <option value="T-Shirt">T-Shirt</option>
            <option value="Pull">Pull</option>
            <option value="Pantalon">Pantalon</option>
            <option value="Sac">Sac</option>
            <option Value="Goodies">Goodies</option>
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
<div class="shop_content">
    <div class='displayprod'>
        <img src="/img/articles/pull1.png" , class='prodpic' />
        <div class='price'>
            150€
        </div>

        <div class='description'>
            Pull Exia
        </div>
    </div>


    <div class='displayprod'>
        <img src="/img/articles/pull1.png" , class='prodpic' />
        <div class='price'>
            150€
        </div>
        <div class='description' style='font-size:20px'>
            Pull Exia
        </div>

    </div>
    <div class='displayprod'>
        <img src="/img/articles/pull1.png" , class='prodpic' />
        <div class='price'>
            15€
        </div>
        <div class='description' style='font-size:20px'>
            Pull Exia
        </div>

    </div>
    <div class='displayprod'>
        <img src="/img/articles/pull1.png" , class='prodpic' />
        <div class='price'>
            15€
        </div>
        <div class='description' style='font-size:20px'>
            Pull Exia
        </div>

    </div>

    <div class='displayprod'>
        <img src="/img/articles/pull1.png" , class='prodpic' />
        <div class='price'>
            15€
        </div>
        <div class='description' style='font-size:20px'>
            Pull Exia
        </div>
    </div>
    <div class='displayprod'>
        <img src="/img/articles/pull1.png" , class='prodpic' />
        <div class='price'>
            15€
        </div>
        <div class='description' style='font-size:20px'>
            Pull Exia
        </div>
    </div>
    <div class='displayprod'>
        <img src="/img/articles/pull1.png" , class='prodpic' />
        <div class='price'>
            15€
        </div>
        <div class='description' style='font-size:20px'>
            Pull Exia
        </div>
    </div>
    <div class='displayprod'>
        <img src="/img/articles/pull1.png" , class='prodpic' />
        <div class='price'>
            15€
        </div>
        <div class='description' style='font-size:20px'>
            Pull Exia
        </div>
    </div>
    <div class='displayprod'>
        <img src="/img/articles/pull1.png" , class='prodpic' />
        <div class='price'>
            15€
        </div>
        <div class='description' style='font-size:20px'>
            Pull Exia
        </div>
    </div>
    <div class='displayprod'>
        <img src="/img/articles/pull1.png" , class='prodpic' />
        <div class='price'>
            15€
        </div>
        <div class='description' style='font-size:20px'>
            Pull Exia
        </div>
    </div>
    <div class='displayprod'>
        <img src="/img/articles/pull1.png" , class='prodpic' />
        <div class='price'>
            15€
        </div>
        <div class='description' style='font-size:20px'>
            Pull Exia
        </div>
    </div>
    <div class='displayprod'>
        <img src="/img/articles/pull1.png" , class='prodpic' />
        <div class='price'>
            15€
        </div>
        <div class='description' style='font-size:20px'>
            Pull Exia
        </div>
    </div>
</div>



@endsection
