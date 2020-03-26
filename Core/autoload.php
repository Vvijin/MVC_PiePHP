<?php

function loader($class)
{
    $class = str_replace("\\", DIRECTORY_SEPARATOR, $class);
    require $class .'.php';
}

spl_autoload_register("loader");