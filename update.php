<?php
$id = $_POST['id'];

require_once ("QueryBilder.php");

$dsn = "mysql:host=MySQL-8.2;dbname=notepad";
$username = "root";
$password = "";

$query_builder = new QueryBuilder($dsn, $username, $password);


$query_builder->update_note();

header("Location: index.php");