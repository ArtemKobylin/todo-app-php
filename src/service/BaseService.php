<?php


require_once dirname(__DIR__) . "../data/db.config.php";
require_once dirname(__DIR__) . "../model/Todo.php";

class BaseService
{
    protected function getConnection()
    {
        $connection = new mysqli(DB_CONFIG['host'], DB_CONFIG['username'], DB_CONFIG['password'], DB_CONFIG['dbname']);
        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
        }
        return $connection;
    }
}
