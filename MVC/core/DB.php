<?php

class DB
{
    private static $_instace = null;
    private $_pdo, $_query, $_errors = false, $_result, $_count = 0, $_lastInsertID = null;

    private function __construct()
    {
        try {
            $this->_pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public static function getInstance()
    {
        if (!isset(self::$_instace)) {
            self::$_instace = new DB();
        }

        return self::$_instace;
    }
}