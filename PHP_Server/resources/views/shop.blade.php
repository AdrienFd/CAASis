@extends('layout')


@section('content')

<fieldset>
  <legend>Categories</legend>
  
    <input type="checkbox" id="pull" name="interest" value="coding" />
    <label for="coding">Pull</label>
    <input type="checkbox" id="t-shirt" name="interest" value="music" />
    <label for="music">T-shirt</label>

    <input type="checkbox" id="coat" name="interest" value="music" />
    <label for="music">coat</label>

    <input type="checkbox" id="goodies" name="interest" value="music">
    <label for="music">Goodies</label>
</fieldset>

<div class="shop_content">
    <div class='displayprod'>
        <img src="/img/articles/pull.jpg" , class='prodpic' />
        <div class='price'>
            150€
        </div>
        <div class='description' style='font-size:20px'>
            Pull Exia
        </div>
        <div class='description'>
            Un très beau pull pas cher
        </div>
    </div>

    <div class='displayprod'>
        <img src="/img/articles/pull.jpg" , class='prodpic' />
        <div class='price'>
            150€
        </div>
        <div class='description' style='font-size:20px'>
            Pull Exia
        </div>
        <div class='description'>
            Un très beau pull pas cher
        </div>
    </div>
    <div class='displayprod'>
        <img src="/img/articles/pull.jpg" , class='prodpic' />
        <div class='price'>
            15€
        </div>
        <div class='description' style='font-size:20px'>
            Pull Exia
        </div>
        <div class='description'>
            Un très beau pull pas cher
        </div>
    </div>
    <div class='displayprod'>
        <img src="/img/articles/pull.jpg" , class='prodpic' />
        <div class='price'>
            15€
        </div>
        <div class='description' style='font-size:20px'>
            Pull Exia
        </div>
        <div class='description'>
            Un très beau pull pas cher
        </div>
    </div>
    <div class='displayprod'>
        <img src="/img/articles/pull.jpg" , class='prodpic' />
        <div class='price'>
            15€
        </div>
        <div class='description' style='font-size:20px'>
            Pull Exia
        </div>
        <div class='description'>
            Un très beau pull pas cher
        </div>
    </div>
</div>



@endsection
