<?php
$id = $_GET['id'];
$dsn = "mysql:host=MySQL-8.2;dbname=notepad";
$username = "root";
$password = "";

require_once ("QueryBilder.php");

$query_builder = new QueryBuilder($dsn, $username, $password);

$result=$query_builder->delete_note();

header("Location: index.php");