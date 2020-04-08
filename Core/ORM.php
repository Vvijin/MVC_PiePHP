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
        //$this->bdd = Database::connexion();

    }

    public function create($table, $col, $value_col)
    {
        $sql = "INSERT INTO $table($col, $value_col) VALUES (?, ?)"; //cmt faire avec plusieurs values
        $execute_sql = $this->bdd->prepare($sql);
        $execute_sql->bindParam('?', $col, PDO::PARAM_STR); // eviter bindparam pour chaque ?
        $execute_sql->bindParam('?', $value_col, PDO::PARAM_STR);
        $execute_sql->execute();
        $id_user = $this->bdd->lastInsertId();
        //$this->read($id_user);
        //$this->read_all($id_user);
        $execute_sql->closeCursor();
        return $id_user;
    }

    public function read($table, $col)
    {
        $sql = "SELECT * FROM $table WHERE $col=?";
        $execute_sql = $this->bdd->prepare($sql);
        $execute_sql->bindParam('?', $col, PDO::PARAM_INT);
        $execute_sql->execute();
        $result = $execute_sql->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $value) {
           return $value;
        }
        $execute_sql->closeCursor();
    }

    public function read_all($table, $col)
    {
        $sql = "SELECT * FROM $table WHERE $col=?";
        $execute_sql = $this->bdd->prepare($sql);
        $execute_sql->bindParam('?', $col, PDO::PARAM_INT);
        $execute_sql->execute();
        $result = $execute_sql->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $value) {
            return $value;
        }
        $execute_sql->closeCursor();
    }

    public function update($table, $col, $value_col)
    {
        $sql = "UPDATE  $table SET $col = ? WHERE $value_col=?";
        $execute_sql = $this->bdd->prepare($sql);
        $execute_sql->bindParam('?', $value_col, PDO::PARAM_STR);
        $execute_sql->bindParam('?', $col, PDO::PARAM_STR);
        $execute_sql->execute();
        $execute_sql->closeCursor();
    }

    public function delete($table, $col)
    {
        $sql = "DELETE FROM $table WHERE $col = ?";
        $execute_sql = $this->bdd->preppre($sql);
        $execute_sql->bindParam('?', $col, PDO::PARAM_INT);
        $sql->execute();
        $execute_sql->closeCursor();
    }
}
