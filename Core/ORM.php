<?php

class ORM
{
    public $table;
    public $fields;
    public $id;
    public $col;
    public $value_col;


    public function __construct()
    {
        $this->bdd = Database::connect();
    }

    public function create($table, $fields)
    {
        //var_dump($fields);
        $tab = [];
        $col = [];
        $values_col = [];

        foreach ($fields as $key => $value) {
            $tab[] = $key;
            $col[] = '?';
            $values_col[] = $value;

        }

        $tab_name = implode(',', $tab);
        $col_name = implode(',', $col);
 
        $sql = "INSERT INTO $table ($tab_name) VALUES ($col_name)"; 
        $execute_sql = $this->bdd->prepare($sql);
        $execute_sql->execute($values_col);
       
        $values_col = $this->bdd->lastInsertId();
        return $values_col;
        
        
    }

    public function read($table, $id)
    {
        $sql = "SELECT * FROM $table WHERE id=?";
        $execute_sql = $this->bdd->prepare($sql);
        $execute_sql->execute([$id]);
        $result = $execute_sql->fetch(PDO::FETCH_ASSOC);
        return $result;

    }

    public function read_all($table)
    {
        $sql = "SELECT * FROM $table";
        $execute_sql = $this->bdd->prepare($sql);
        $execute_sql->execute();
        $result = $execute_sql->fetchAll(PDO::FETCH_ASSOC);
        return $result;
        
    }

    public function update($table, $id, $fields)
    {
        //$id = 1;
        foreach ($fields as $key => $value) {
            $sql = "UPDATE $table SET $key = '$value' WHERE id=$id";
            $execute_sql = $this->bdd->prepare($sql);
            $execute_sql->execute();
            $result = $execute_sql->fetchAll(PDO::FETCH_ASSOC);
        }
        return true;
    }

    public function delete($table, $id)
    {
        $sql = "DELETE FROM $table WHERE id=$id";
        $execute_sql = $this->bdd->prepare($sql);
        $execute_sql->execute();
        $result = $execute_sql->fetch(PDO::FETCH_ASSOC);
        return true;
    }

    public function find($table, $params = array('WHERE' => '1', 'ORDER BY' => 'id ASC', 'LIMIT' => ''))
    {
       
        $sql = "SELECT * FROM $table";

        foreach ($params as $key => $value) {
            $sql = $sql . ' ' . $key . ' ' . $value;

        }
        $execute_sql = $this->bdd->prepare($sql);
        $execute_sql->execute();
        $result = $execute_sql->fetchAll(PDO::FETCH_ASSOC);
        // var_dump($result);
        return $result;
    }
}
