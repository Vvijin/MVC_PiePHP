<?php

class Database
{
    public static $host = "localhost";
    public static $dbName = "mvc_piephp";
    public static $username = "root";
    public static $password = "";

    public static function connect()
    {
        try{
        $pdo = new PDO("mysql:host=" . self::$host . ";dbname=" . self::$dbName . ";charset=utf8", self::$username, self::$password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "YES";
        return $pdo;
        }
        catch (PDOexception $e) {
                print "Erreur !: " . $e->getMessage() . "br/";
                die();
        }
    }

}

