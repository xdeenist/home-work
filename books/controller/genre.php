<?php
require_once '../model/genre.class.php';

$sections = new Genre();
$result = $sections->selectAll("SELECT * FROM genre_list");
