<?php
$id = $_GET['id'];
$dsn = "mysql:host=MySQL-8.2;dbname=notepad";
$username = "root";
$password = "";

function delete_note($dsn, $username, $password)
{
    $pdo = new PDO($dsn, $username, $password);
    $sql = "DELETE FROM note WHERE id=:id";
    $statement = $pdo->prepare($sql);
    $statement->execute(['id'=>$_GET['id']]);

    header("Location: index.php");
}

$result=delete_note($dsn, $username, $password);