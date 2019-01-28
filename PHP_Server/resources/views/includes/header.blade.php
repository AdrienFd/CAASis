<?php
$URL = $_SERVER['REQUEST_URI'];
$PAGE = urldecode(basename($URL));
?>
<!-- the header bar -->
<div onclick="close_menu(); close_login()" class="header">
    <a>{{ $PAGE }}</a>
    <img src="/img/logo.png" alt="logo" />
</div>

<!-- include the menu -->
@include('includes.navbar')