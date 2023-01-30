<?php

class Model
{
    protected static $tableName = '';
    protected static $columns = [];
    protected $values = [];

    function __construct($arr)
    {
        $this->loadFromArray($arr);
    }

    public function loadFromArray($arr)
    {
        if ($arr) {
            foreach ($arr as $key => $value) {
                $this->$key = $value;
            }
        }
    }

    public function __get($key)
    {
        return $this->values[$key];
    }
    /* 
    * Usando os métodos mágicos __get e __set, é possível acessar os atributos da classe 
    * como se fossem atributos de um objeto. Ex: $user->name; e se quiser alterar o valor 
    * $user->name = 'João'; Mas isso só funciona se os atributos forem públicos
    */
    public function __set($key, $value)
    {
        $this->values[$key] = $value;
    }

    public static function getOne($filters = [], $columns = '*')
    {
        $class = get_called_class();
        $result = static::getResultSetFromSelect($filters, $columns);

        return $result ? new $class($result->fetch_assoc()) : null;
    }

    public static function get($filters = [], $columns = '*')
    {
        $objects = [];
        $result = static::getResultSetFromSelect($filters, $columns);

        if ($result) {
            $class = get_called_class();
            while ($row = $result->fetch_assoc()) {
                array_push($objects, new $class($row));
            }
        }
        return $objects;
    }

    public static function getResultSetFromSelect($filters = [], $columns = '*')
    {
        $sql = "SELECT $columns FROM " . static::$tableName . static::getFilters($filters);

        $result = Database::getResultFromQuery($sql);
        if ($result->num_rows === 0) {
            return Null;
        } else {
            return $result;
        }
    }

    public function insert()
    {
        $sql = "INSERT INTO " . static::$tableName . " (" . implode(",", static::$columns) . ") VALUES (";
        foreach (static::$columns as $col) {
            $sql .= static::getFormatedValue($this->$col) . ",";
        }
        $sql[strlen($sql) - 1] = ')';
        $id = Database::executeSQL($sql);
        $this->id = $id;
    }

    public function update()
    {
        $sql = "UPDATE " . static::$tableName . " SET ";
        foreach (static::$columns as $col) {
            $sql .= " $col = " . static::getFormatedValue($this->$col) . ",";
        }

        $sql[strlen($sql) - 1] = ' ';
        $sql .= " WHERE id = $this->id";
        Database::executeSQL($sql);
    }

    public static function getCount($filters = [])
    {
        $result = static::getResultSetFromSelect($filters, 'COUNT(*) AS count');
        return $result->fetch_assoc()['count'];
    }

    private static function getFilters($filters)
    {
        $sql = '';
        if (count($filters) > 0) {
            $sql .= " WHERE 1 = 1";
            foreach ($filters as $column => $value) {
                if ($column == 'raw') {
                    $sql .= " AND {$value}";
                } else {
                    $sql .= " AND $column = " . static::getFormatedValue($value);
                }
            }
        }
        return $sql;
    }

    private static function getFormatedValue($value)
    {
        if (is_null($value)) {
            return "null";
        } elseif (gettype($value) === 'string') {
            return "'$value'";
        } else {
            return $value;
        }
    }
}
