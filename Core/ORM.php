<?php

class ORM 
{
    private $table;
    private $col;
    private $value_col;

    
    public function __construct()
    {
        // $this->table = $table;
        // $this->col = $col;
        // $this->value_col = $value_col;
        $this->bdd = Database::connect();

    }

    public function create($table, $fields)
    {
        //var_dump($fields);
        $tab = [];
        $col = [];
        $values_col = [];
        
        foreach ($fields as $key => $value)
        {
            $tab[] = $key;
            $col[] = '?';
            $values_col[]= $value;
        }

        $tab_name = implode(',', $tab);
        $col_name = implode(',', $col);
        // var_dump($col_name, $tab_name);
        $sql = "INSERT INTO $table ($tab_name) VALUES ($col_name)"; //cmt faire avec plusieurs values
        $execute_sql = $this->bdd->prepare($sql);
        $execute_sql->execute($values_col);
       // var_dump($execute_sql->execute([$values_col]));
        $values_col = $this->bdd->lastInsertId();
        // $this->read($table,$values_col);
        // $this->read_all($table ,$values_col);
        $execute_sql->closeCursor();
       return $values_col;
    }

    public function read($table, $id)
    {
        $sql = "SELECT * FROM $table WHERE id=?";
        $execute_sql = $this->bdd->prepare($sql);
        $execute_sql->execute([$id]);
        $result = $execute_sql->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $value) {
           return $value;
        }
        $execute_sql->closeCursor();
    }

    public function read_all($table, $id)
    {
        $sql = "SELECT * FROM $table WHERE id=?";
        $execute_sql = $this->bdd->prepare($sql);
        $execute_sql->execute($id);
        $result = $execute_sql->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $value) {
            return $value;
        }
        $execute_sql->closeCursor();
    }

    public function update($table, $id, $fields)
    {
        //$id = 2;
        foreach($fields as $key => $value)
        {
        $sql = "UPDATE $table SET $key = '$value' WHERE id=$id";
        $execute_sql = $this->bdd->prepare($sql);
        $execute_sql->execute();
        $execute_sql->closeCursor();
        }

    }

    public function delete($table, $id)
    {
        $sql = "DELETE FROM $table WHERE id=$id";
        $execute_sql = $this->bdd->prepare($sql);
        $execute_sql->execute();
        $execute_sql->closeCursor();
    }

    public function find($table, $params = array('WHERE' => '1', 'ORDER BY' => 'id ASC', 'LIMIT' => ''))
    {
        $sql = "SELECT * FROM $table";

        foreach($params as $key => $value)
        {
            $sql = $sql. ' ' .$key. ' '.$value;
        }
         //echo $sql;

    }
}
