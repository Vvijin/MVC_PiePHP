<?php

// function loader($class)
// {
//     $class = str_replace("\\", DIRECTORY_SEPARATOR, $class);
//     require $class .'.php';

// }

// spl_autoload_register("loader");

spl_autoload_register(function ($class) {
    
    $path_core = "./Core/";
    $path_src = "./src/";
    $path_srccontroller = "./src/Controller/";
    $path_srcmodel = "./src/Model/";

    $class = explode("\\", $class);
    //var_dump($class);
    foreach ($class as $key => $value) {
    $file = $value . '.php';
     //   var_dump($value);
    }
    if (file_exists($path_core . $file)) {
        require $path_core . $file;
    }

    if (file_exists($path_src . $file)) {
        require $path_src . $file;
    }

    if (file_exists($path_srccontroller . $file)) {
        require $path_srccontroller . $file;
    }

    if (file_exists($path_srcmodel . $file)) {
        require $path_srcmodel . $file;
    }
    
});
