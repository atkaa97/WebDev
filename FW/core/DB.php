<?php

class DB
{
    private static $_instace = null;
    private $_pdo, $_query, $_errors = false, $_results, $_count = 0, $_lastInsertID = null;

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

    public function query($sql, $params = [])
    {
        $this->_errors = false;
        if ($this->_query = $this->_pdo->prepare($sql)) {
            $x = 1;
            if (count($params)) {
                foreach ($params as $param) {
                    $this->_query->bindValue($x, $param);
                    $x++;
                }
            }
            if ($this->_query->execute()) {
                $this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);
                $this->_count = $this->_query->rowCount();
                $this->_lastInsertID = $this->_pdo->lastInsertId();
            } else {
                $this->_errors = true;
            }
        }
        return $this;
    }
}