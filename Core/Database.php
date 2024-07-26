<?php

class Database
{

    public $connection;

    public function __construct()
    {
        $dsn = "mysql:host=localhost;dbname=myMusic;port=3306;";
        $this->connection = new PDO($dsn, 'root', 'root', [

            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
    }

    public function query($query, $params = [])
    {

        $prepare = $this->connection->prepare($query);
        $prepare->execute($params);
        return $prepare;
    }
}
