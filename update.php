<?php
$id = $_POST['id'];

$dsn = "mysql:host=MySQL-8.2;dbname=notepad";
$username = "root";
$password = "";

function update_note($dsn, $username, $password) {
    $pdo = new PDO($dsn, $username, $password);
    $sql_get = "SELECT * FROM note WHERE id=:id";
    $statement = $pdo->prepare($sql_get);
    $statement->execute(['id'=>$_POST['id']]);
    $result = $statement->fetch(PDO::FETCH_ASSOC);
    $result['title'] = $_POST['title'];
    $result['content'] = $_POST['content'];

    $sql = "UPDATE note SET title = :title, content = :content WHERE id = :id;";
    $statement = $pdo->prepare($sql);
    $statement->execute(["title" => $result['title'], "content" => $result['content'], 'id' => $_POST['id']]);
    return $statement;
}

update_note($dsn, $username, $password);

header("Location: index.php");