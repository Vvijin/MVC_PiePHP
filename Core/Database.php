<?php

class bdd
{
    function connexion()
    {
        try {
            $user = "root";
            $pass = " ";
            $bdd = new PDO('mysql:host=localhost;dbane=PiePHP;charset=utf8', $user, $pass);
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $BDD['bdd'] = $bdd;
            return $BDD['bdd'];
        } catch (PDOexception $e) {
            print "Erreur !: " . $e->getMessage() . "br/";
            die();
        }
    }
}
//$a = new bdd();
//$a->connexion();