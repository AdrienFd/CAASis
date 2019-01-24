@extends('includes.layout')

@section('header')
    @include('includes.header')
@endsection

@section('main')

<?php
$table= '\App\\' . 'Manifestation';
//$a=json_decode($a::all());
$selectAll=$table::where('manifestation_is_idea','1')->get();
//dump(json_decode($selectAll));

foreach ($selectAll as $row) {

    echo "
    
    ";

}
?>


<div class="ideaBox_content">

    <div class="idea">
        <div class="idea_name">
            <h2><?php echo $row->manifestation_name; ?> </h2>
        </div>

        <div class="idea_author">
            <?php echo "By " . $row->member_suggest->member_name . " " . $row->member_suggest->member_firstname; ?>
        </div>

        <div class="idea_description">
            <p><?php echo $row->manifestation_description; ?></p>
        </div>

        <button class="button votes">Vote!</button>
        <div class="button count">158 votes
        </div>
    </div>


</div>

@endsection
