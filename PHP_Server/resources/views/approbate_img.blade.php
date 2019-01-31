@extends('includes.layout')

@section('header')
@include('includes.header')
@endsection

@section('main')

<div class="shop_content">
    @if(session('statut') == "Employee")
    <h2>Image à approuver</h2>
    <!-- create all article in the shop -->
    <?php $price=0; ?>
    @foreach($imgs as $img)
        <div class='displayprod'>
            <img style="width:250px; height:150px; object-fit:cover;" src="{{ $img->img_url }}" class='prodpic'
                alt="<?php echo explode('$',$img->img_name)[0] ?>" />

            <div class='description'>
                {{ $img->img_name }}
            </div>
            <form method="post" action="{{ route('approbateImg') }}">
                @csrf
                <button name="id_img" value="{{ $img->id_img }}" type="submit">Aprouver</button>
            </form>
        </div>

    @endforeach

    @endif

</div>

@endsection

