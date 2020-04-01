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
        if (isset(self::$routes[$url])) {
            return self::$routes[$url];
        }
        else {
            return null;
        }
    }
}

// class Router
// {
//     private static $routes;
    
//     public static function connect($url, $route)
//     {
//         echo "Connect $url <br />";
//         self::$routes[$url] = $route;
//     }

//     public static function get($url)
//     {
//         return array_key_exists($url, self::$routes) ? self::$routes[$url]: null;
//     }

//  }