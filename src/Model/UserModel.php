<?php

// class UserModel extends Entity
// {
//     private $email;
//     private $password;

//     public function __construct($email, $password)
//     {
//         $this->email = $email;
//         $this->password = $password;
//     }

//     public function save()
//     {
//         $sql = $this->bdd->prepare('INSERT INTO users (email, password) VALUES (?, ?)');
//         $sql->execute([$this->email, $this->password]);
//     }
// }

// $user = new UserModel();

class UserModel extends Entity
{
    
    private $email;
    private $password;

    public function __construct($email, $password)
    {
        
        $this->email = $email;
        $this->password = $password;
    }

    public function create($email, $password)
    {
        $sql = $this->bdd->prepare('INSERT INTO users (email, password) VALUES (?, ?)');
        $sql->execute([$this->email, $this->password]);
        $id_user = $this->bdd->lastInsertId();
        return $id_user;
    }

    public function read($id)
    {
        $sql = $this->bdd->prepare("SELECT * FROM users WHERE id=?");
        $sql->execute([$this->id]);
    }

    public function update($id, $name, $new)
    {
        $sql = $this->bdd->prepare('UPDATE  users SET $name = ? WHERE id=?');
        $sql->execute([$this->id, $this->name, $this->new]);
    }

    public function delete($id)
    {
        $sql = $this->bdd->preppre("DELETE FROM 'users' WHERE id = ?");
        $sql->execute([$this->id]);
    }

    public function read_all($id)
    {
        $sql = $this->bdd->prepare("SELECT * FROM 'users' WHERE id = ?");
        $sql->execute([$this->id]);
    }
}

