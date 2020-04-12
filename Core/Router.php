<?php

class Router
{
    private static $routes;
    
    public static function connect($url, $route)
    {
        self::$routes[$url] = $route;
    }


    public static function get($url)
    {
        $array = [];
        foreach(self::$routes as $key => $value){
            $r = "/{([^}]+)}/";
            // var_dump($key, $value);
        }
        foreach($array as $key => $value)
        {

        }

        if (isset(self::$routes[$url])) 
        {
            return self::$routes[$url];

        }
    }
}

