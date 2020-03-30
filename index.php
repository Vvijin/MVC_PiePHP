 <?php

    define('BASE_URI', str_replace('\\', '/ ', substr(__DIR__, strlen($_SERVER['DOCUMENT_ROOT']))));
    require_once(implode(DIRECTORY_SEPARATOR, ['Core', 'autoload.php']));

    $app = new Core\Core();
    $app->run();


// var_dump($_SERVER);
// echo "<br>".var_dump($_SERVER)."<br>";
//var_dump($_SERVER['REQUEST_URI']);
