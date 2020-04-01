<?php

namespace Core;

class Core
{
    public function run()
    {
        include 'routes.php';
        // echo CLASS . "[OK]" . PHP_EOL;

        $url = str_replace(BASE_URI, '', $_SERVER['REQUEST_URI']);
        $controller = \Router::get($url);
        $serveur = $_SERVER["REQUEST_URI"];
        $arr = explode(DIRECTORY_SEPARATOR, $serveur);
        $class = ucfirst($arr[2]) . "Controller";
        // var_dump($url);
        if(isset($arr[3]))
        {
        $methode = $arr[3] . "Action";
        }
       
        if($url = \Router::get('/'.$arr[2])) {
            $controllerName = ucfirst($controller['controller']) . 'Controller';

            $new_controller = new $controllerName;
            $new_controller->{$controller['action'] .'Action'}();
            // echo 'yoo';
        }
        
        elseif (class_exists($class)){

            $controller = new $class();
            
            if (method_exists($controller,$methode))
            {
                $controller->$methode();
            }
            
        }
        
        else 
        {
            echo "404 "; 
        }
        
    }
}

// namespace Core;
// use Router;
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
