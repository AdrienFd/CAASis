<?php
$URL = $_SERVER['REQUEST_URI'];
//decode the url to display UTF-8 char
$PAGE = urldecode(basename($URL));
//explode the page link with ? to get only the part before ?
$TITLE = explode("?",$PAGE)[0];
?>

<!-- the header bar -->
<div onclick="close_menu(); close_login()" class="header">
    <a>{{ $TITLE }} </a>
    <img src="/img/logo.png" alt="Logo BDE Arras" />
</div>

<!-- include the menu -->
@include('includes.navbar')
