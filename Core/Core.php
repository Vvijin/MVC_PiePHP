<?php

namespace Core;

class Core
{
    public function run()
    {
        include 'routes.php';


        $url = str_replace(BASE_URI, '', $_SERVER['REQUEST_URI']);

        $controller = \Router::get($url);

        if (method_exists(ucfirst($controller['controller']) . 'Controller', $controller['action'] . 'Action')) {
            $controllerName = ucfirst($controller['controller']) . 'Controller';

            $new_controller = new $controllerName;
            $new_controller->{$controller['action'] . 'Action'}();
        } else {
            echo "404";
        }
    }
}

// namespace Core;

// class Core
// {
//     public function run()
//     {
//         $serveur = $_SERVER["REQUEST_URI"];
//         $arr = explode(DIRECTORY_SEPARATOR, $serveur);

//         $class = ucfirst($arr[2]) . "Controller";
//         $methode = $arr[3] . "Action";

//         echo "$class -> $methode<br>";

//         $controller = new $class();
//         $controller->$methode();
//     }
    
// }
