<?php

class QueryBuilder
{

    public string $dsn;
    public string $username;
    public string $password;

    public function __construct($dsn, $username, $password)
    {
        $this->dsn = $dsn;
        $this->username = $username;
        $this->password = $password;
    }

    public function get_all_tasks(): array
    {
        $pdo = new PDO($this->dsn, $this->username, $this->password);
        $sql = "SELECT * FROM note";
        $statement = $pdo->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);

    }

    public function create_note()
    {
        global $title, $content;
        $pdo = new PDO($this->dsn, $this->username, $this->password);
        $sql = "INSERT INTO note (title, content) VALUES (:title, :content)";
        $statement = $pdo->prepare($sql);
        $statement->execute(["title" => $title, "content" => $content]);
        return $statement;
    }

    public function view_note()
    {
        $pdo = new PDO($this->dsn, $this->username, $this->password);
        $sql = "SELECT * FROM note WHERE id=?";
        $statement = $pdo->prepare($sql);
        $statement->execute([$_GET['id']]);
        return $statement->fetch(PDO::FETCH_ASSOC);

    }

    public function update_note()
    {
        $pdo = new PDO($this->dsn, $this->username, $this->password);
        $sql_get = "SELECT * FROM note WHERE id=:id";
        $statement = $pdo->prepare($sql_get);
        $statement->execute(['id' => $_POST['id']]);
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        $result['title'] = $_POST['title'];
        $result['content'] = $_POST['content'];

        $sql = "UPDATE note SET title = :title, content = :content WHERE id = :id;";
        $statement = $pdo->prepare($sql);
        $statement->execute(["title" => $result['title'], "content" => $result['content'], 'id' => $_POST['id']]);
        return $statement;
    }

    public function delete_note()
    {
        $pdo = new PDO($this->dsn, $this->username, $this->password);
        $sql = "DELETE FROM note WHERE id=:id";
        $statement = $pdo->prepare($sql);
        $statement->execute(['id' => $_GET['id']]);
    }

}