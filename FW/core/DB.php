<?php

class DB
{
    private static $_instace = null;
    private $_pdo, $_query, $_error = false, $_results, $_count = 0, $_lastInsertID = null;

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

////////////////////////////////////////////////////////////////////////  TODO Query start
    public function query($sql, $params = [])
    {
        $this->_error = false;
        if ($this->_query = $this->_pdo->prepare($sql)) {
            $x = 1;
            if (count($params)) {
                foreach ($params as $param) {
                    $this->_query->bindValue($x, $param);
                    $x++;
                }
            }
            if ($this->_query->execute()) {
                $this->_results = $this->_query->fetchAll(PDO::FETCH_ASSOC);
                $this->_count = $this->_query->rowCount();
                $this->_lastInsertID = $this->_pdo->lastInsertId();
            } else {
                $this->_error = true;
            }
        }
        return $this;
    }

//////////////////////////////////////////////////////////////////////// Query End
//
//
//////////////////////////////////////////////////////////////////////// TODO Insert start
    public function insert($table, $fields = [])
    {
        $fieldString = '';
        $valueString = '';
        $values = [];

        foreach ($fields as $field => $value) {
            $fieldString .= '`' . $field . '`,';
            $valueString .= '?,';
            $values[] = $value;
        }

        $fieldString = rtrim($fieldString, ',');
        $valueString = rtrim($valueString, ',');

        $sql = "INSERT INTO $table ($fieldString) VALUES ($valueString)";
//        dd($sql);
        if (!$this->query($sql, $values)->error()) {
            return true;
        }
        return false;
    }

////////////////////////////////////////////////////////////////////////// Insert end
//
//
////////////////////////////////////////////////////////////////////////// TODO Uptade start
    public function update($table, $id, $fields = [])
    {
        $fieldString = '';
        $values = [];
        foreach ($fields as $field => $value) {
            $fieldString .= ' ' . $field . ' = ?,';
            $values[] = $value;
        }

        $fieldString = trim($fieldString);
        $fieldString = rtrim($fieldString, ',');
        $sql = "UPDATE $table SET $fieldString WHERE id = {$id}";
        if (!$this->query($sql, $values)->error()) {
            return true;
        }
        return false;
    }

////////////////////////////////////////////////////////////////////////// Uptade end
//
//
////////////////////////////////////////////////////////////////////////// TODO Delete start
    public function delete($table, $id)
    {
        $sql = "DELETE FROM $table WHERE id = {$id}";
        if (!$this->query($sql)->error()) {
            return true;
        }
        return false;
    }

////////////////////////////////////////////////////////////////////////// Delete end
//
//
////////////////////////////////////////////////////////////////////////// TODO Results start
    public function results()
    {
        return $this->_results;
    }

////////////////////////////////////////////////////////////////////////// Results end
//
//
////////////////////////////////////////////////////////////////////////// TODO First end
    public function first()
    {
        return !empty($this->_results[0]) ? $this->_results[0] : [];
    }

////////////////////////////////////////////////////////////////////////// First end
//
//
////////////////////////////////////////////////////////////////////////// TODO Count end
    public function count()
    {
        return $this->_count;
    }

////////////////////////////////////////////////////////////////////////// Count end
//
//
////////////////////////////////////////////////////////////////////////// TODO Last ID end
    public function lasID()
    {
        return $this->_lastInsertID;
    }
//////////////////////////////////////////////////////////////////////////// Last ID end
//
//
////////////////////////////////////////////////////////////////////////// TODO Last ID end
    public function get_columns($table)
    {
        return $this->query("SHOW COLUMNS FROM $table")->results();
    }

//////////////////////////////////////////////////////////////////////////// Last ID end
    public function error()
    {
        return $this->_error;
    }
}