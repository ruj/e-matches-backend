<?php

use Simplon\Mysql\PDOConnector;
use Simplon\Mysql\Mysql;

class Database
{
    public $database;

    function __construct()
    {
        try {
            $pdo = new PDOConnector('mysql:3306', 'root', 'root', 'e_matches');

            $pdoConn = $pdo->connect('utf8', []);
            $this->database = new Mysql($pdoConn);
        } catch (\PDOException $e) {
            return $e->getMessage();
        }
    }
}
