@extends('includes.layout')

@section('header')
@include('includes.header')
@endsection

@section('main')

<!-- Filter section -->
<fieldset class="filter">
    <legend>Filtrage</legend>
    <form method="post" action="{{ route('shop') }}">


        @csrf

        <!-- Selection of a category -->
        <div class="categories">
            <h2>Catégories</h2>
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
    </form>

    <!-- form to remove filter -->
    <form method='GET' action="{{ route('shop') }}"> 
        @csrf 
        <button type="submit">Enlever les filtres</button> 
    </form>
</fieldset>

<!-- Shopping cart button -->
<a href="{{ route('shopping_card') }}"><button style="font-size:25px" type="button" name="add">&#x1F4BC</button></a>

<!-- Items on the shop -->
<?php $i=0; ?>
<div class="shop_content">

    <!-- create all article in the shop -->
    @foreach($articles as $row)
    <a href="{{Route('article', ['name' => $row->article_name,  'id' => $row->id_article]) }}">
    <div class='displayprod'>
        <img style="width:250px; height:150px; object-fit:cover;" src="{{ $row->image->img_url }}" class='prodpic' alt="<?php echo explode('$',$row->image->img_name)[0] ?>" />
        <div class='price'>
            {{ $row->article_price }} €
        </div>

        <div class='description'>
            {{ $row->article_name }}
        </div>
    </div>
    </a>
    @endforeach

    <!-- pagination link -->
    <div class="pagination_bottom">
        {{$articles->links()}}
    </div>
</div>
</div>
@endsection

@section('scripts')
<script src="{{asset('js/shop_price_slider.js')}}"></script>
@endsection
