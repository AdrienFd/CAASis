@extends('includes.layout')

@section('main')
<?php
$table= '\App\\' . $table;
//$a=json_decode($a::all());
$selectAll=$table::all();
dump(json_decode($selectAll));

foreach ($selectAll as $row) {
    echo "<p>";
    echo $row->member_name;
    echo $row->statut;
    echo $row->location->location_name;
    echo "</p>";
}
//$stat = $a::all()->join('location', 'location.id_location', '=', 'member.id_location')->where('id_member',2);
//$stat=DB::table($table)->select()->location()->get();

//$stat=DB::table($table)->first();

//$stat=$a::with('location')->first();

//$stat->location->id_location;
//$b=json_decode($stat);
//dump($a);

/*foreach ($b as $state) {
    echo "<p>";
    echo ($state->member_name);
    echo "</p>";
}*/
?>
@endsection