<?php
$dsn = "mysql:host=MySQL-8.2;dbname=notepad";
$username = "root";
$password = "";

include_once "QueryBilder.php";
$query_builder = new QueryBuilder($dsn, $username, $password);
$result = $query_builder->get_all_tasks();


?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Главная</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Главная</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Переключатель навигации">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/create.php">+ Создать</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<main>
    <section class="container">
        <?php foreach ($result as $note) :?>
        <div class="card d-flex mt-5"">
            <div class="card-body">
                <h5 class="card-title"><?= $note['title'] ?></h5>
                <p class="card-text"><?= $note['content'] ?></p>
                <a href="/read.php?id=<?= $note['id']?>" class="btn btn-primary">Посмотреть</a>
                <a href="delete.php?id=<?= $note['id']?>" class="btn btn-danger">Удалить</a>

            </div>
        </div>
        <?php endforeach;?>
    </section>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>
