@extends('includes.layout')

@section('header')
@include('includes.header')
@endsection

@section('main')

<div class="ideaBox_content">

    <?php $i=0; ?>

    @foreach($manifestations as $row)
        <div class="idea">
            <div class="idea_name">
                <h2>
                    {{ $row->manifestation_name }}
                </h2>
            </div>

            <div class="idea_author">
                By {{ $row->member_suggest->member_name }} {{ $row->member_suggest->member_firstname }}
            </div>

            <div class="idea_description">
                <p>
                    {{ $row->manifestation_description }}
                </p>
            </div>

            <form method="post" action="{{ route('ideas') }}">
                @csrf
                <button name="id" type="submit" value="{{ $row->id_manifestation }}" class="button votes">Vote!</button>
            </form>
            <div class="button count"> {{ $votes[$i] }}
            </div>
        </div>
        <?php $i++; ?>
    @endforeach
    {{$manifestations->links()}}
</div>
@endsection
