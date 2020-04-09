<?php

class Database
{
    public static $host = "localhost";
    public static $dbName = "MVC_PiePHP";
    public static $username = "root";
    public static $password = " ";

    public static function connect()
    {
        $pdo = new PDO("mysql:host" . self::$host . ";dbname=" . self::$dbName . ";charset=utf8", self::$username, self::$password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
}

    // function connexion()
    // {
    //     try {
    //         $user = "root";
    //         $pass = " ";
    //         $bdd = new PDO('mysql:host=localhost;dbane=PiePHP;charset=utf8', $user, $pass);
    //         $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //         $BDD['bdd'] = $bdd;
    //         return $BDD['bdd'];
    //     } catch (PDOexception $e) {
    //         print "Erreur !: " . $e->getMessage() . "br/";
    //         die();
    //     }
    // }//$a = new bdd();
    //$a->connexion();
