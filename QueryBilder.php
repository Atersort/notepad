<?php

class QueryBilder {
    public $dsn;
    public $user;
    public $password;

    g

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function get_all_tasks($dsn, $username, $password)
    {
        $this->pdo = new PDO($dsn, $username, $password);
        $sql = "SELECT * FROM note";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;

    }
}