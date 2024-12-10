<?php
$dsn = "mysql:host=MySQL-8.2;dbname=notepad";
$username = "root";
$password = "";

$title = $_POST['title'] ?? 0;
$content = $_POST['content'] ?? 0;

if (!empty($title && $content)) {
    function create_note($dsn, $username, $password) {
        global $title, $content;
        $pdo = new PDO($dsn, $username, $password);
        $sql = "INSERT INTO note (title, content) VALUES (:title, :content)";
        $statement = $pdo->prepare($sql);
        $statement->execute(["title" => $title, "content" => $content]);
        return $statement;
    }
    $result = create_note($dsn, $username, $password);

    header("Location: index.php");
}



?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Просмотр заметки</title>

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
        <form action="" method="post">
            <div class="mb-3">

                <label for="exampleFormControlInput1" class="form-label">Заголовок</label>
                <input type="text" name="title" class="form-control" value="" id="exampleFormControlInput1" placeholder="Заголовок">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Текст</label>
                <textarea name="content" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <div class="mt-2">
                <button type="submit" type="button" class="btn btn-success">Сохранить</button>
            </div>
        </form>
        </div>
    </section>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>
