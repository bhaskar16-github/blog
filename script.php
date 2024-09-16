<?php

// Connect to the database.

$mysqli = new mysqli('localhost', 'root', '', 'cms');

if($mysqli->connect_errno != 0){

echo $mysqli->connect_error;

exit();

}
$start = 0;

$rows_per_page = 3;

$records = $mysqli->query("SELECT * FROM posts");
$nr_of_rows = $records->num_rows;

$pages = ceil($nr_of_rows/$rows_per_page);

if (isset($_GET['page-nr'])){
    $page = $_GET['page-nr']-1;
    $start = $page * $rows_per_page;
}

$data = $mysqli->query("SELECT * FROM posts LIMIT $start, $rows_per_page");

?>