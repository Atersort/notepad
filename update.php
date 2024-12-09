<?php
$id = $_GET['id'];


function update_note($dsn, $username, $password) {
    $pdo = new PDO($dsn, $username, $password);
    $sql_get = "UPDATE note SET title=:title, content=:content WHERE id=:id";
    $statement = $pdo->prepare($sql);
    $statement->execute(['title'=>$_POST['title'], 'content' => $_POST['content'], 'id' => $_POST['id']]);
}