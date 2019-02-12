<?php

namespace Core;

class ORMBase
{
	protected static $connection;

	protected $select;

	protected $order;

	protected $where;

	protected $limit;

	protected $offset;

	protected $attributes = [];

	// setter for attributes
	public function __set($key, $value)
	{
		$this->attributes[$key] = $value;
	}

    // getter for attributes
	public function __get($key)
	{
		return isset($this->attributes[$key]) ? $this->attributes[$key] : null;
	}

	// execute final query
	private function execute()
	{
		$query = "SELECT ";
		if ($this->select) {
			$query .= $this->select . ' ';
		} else {
			$query .= " * ";
		}
		$query .= " FROM " . $this->getTable();
		if ($this->where) {
            $query .= " WHERE " . $this->where;
        }
		if ($this->order) {
			$query .= " ORDER BY " . $this->order;
		}

		if ($this->limit) {
			$query .= " LIMIT " . $this->limit;
			if ($this->offset) {
                $query .= " OFFSET " . $this->offset;
			}
		}

		global $pdh;
		$statement = $pdh->query($query);
		return $statement->fetchAll(\PDO::FETCH_CLASS, static::class);
	}

	public function getTable()
	{
		if (property_exists($this, 'table')) {
			return $this->table;
		} else {
			$className = static::class;
			$parts = explode('\\', $className);
			return strtolower($parts[count($parts)-1]);
		}
	}

	// get result of query
	public function get()
	{
		return $this->execute();
	}

    // get first element from query result
	public function first()
	{
		$this->limit(1);
		$model = $this->execute();
		if (count($model)) {
			return $model[0];
		}
		return null;
	}

	// select columns
	public function select($columns)
	{
		$this->select = $columns;
		return $this;
	}

    // where condition
	public function where($condition)
	{
		$this->where = $condition;
		return $this;
	}

	// order query
	public function order($order)
	{
		$this->order = $order;
		return $this;
	}

    // limit query
	public function limit($limit)
	{
		$this->limit = $limit;
		return $this;
	}

    // query offset
	public function offset($offset)
	{
		$this->offset = $offset;
		return $this;
	}

	// insert to table function
	public function insert()
	{
		global $pdh;
		$fields = implode(', ', array_keys($this->attributes));

		$values = implode(', ', array_map(function($item) use ($pdh) {
			return $pdh->quote($item);
		}, $this->attributes));

		$tableName = $this->getTable();
		$sql = "INSERT INTO $tableName ($fields) VALUES ($values)";
        $pdh->query($sql);
	}

	// delete from table
	public function delete()
	{
        global $pdh;
		$tableName = $this->getTable();
		$sql = "DELETE FROM $tableName";
		if ($this->where) {
			$sql .= " WHERE " . $this->where;
		}
        $pdh->query($sql);
	}

    public function set($value1 = [], $value2= [])
    {
        $txt = '';
        for($i = 0; $i< count($value1) ;$i++) {
            $txt .= $value1[$i] ."=". "'".$value2[$i]."'" . ",";
        }
        $txt = substr($txt , 0,-1);
        $this->set = " SET $txt ";
        return $this;
    }

    public function update()
    {
        global $pdh;
        $sql = "UPDATE $this->table" . $this->set . "WHERE " . $this->where . ";";
        $pdh->query($sql);
    }
}