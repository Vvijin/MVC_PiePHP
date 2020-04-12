<?php

 class UserModel extends Entity
{
    public $email;
    public $password;
    public $relations= [
        'has_many' => ['table'=>'article','key'=>'user_id'],
        'has_one' => ['table' => 'promo','key'=>'promo_id'],
        'many_to_many' => ['table1' => 'user','table2' => 'food']
    ];


    public function checkmail($email) 
    {
        $bdd= new PDO('mysql:host=localhost;dbname=mvc_piephp;charset=utf8', 'root', '');
    
        $execute = $bdd->prepare("SELECT email FROM users WHERE email = :email");
        $execute->bindParam(':email', $email, PDO::PARAM_STR);
        $execute->execute();
    
        if ($execute->rowCount() == 1) {
            return false;
        } else {
            return true;
        }
    }





}


