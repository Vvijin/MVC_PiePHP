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
    // var_dump($class);
    foreach ($class as $element) {
        $class = $element . '.php';
        var_dump($element);

    if (file_exists($path_core . $class)) {
        require $path_core . $class;
    }

    if (file_exists($path_src . $class)) {
        require $path_src . $class;
    }

    if (file_exists($path_srccontroller . $class)) {
        require $path_srccontroller . $class;
    }

    if (file_exists($path_srcmodel . $class)) {
        require $path_srcmodel . $class;
    }
    }
});
