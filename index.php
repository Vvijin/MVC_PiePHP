<?php 

    define('BASE_URI', str_replace('\\', '/ ', substr(__DIR__, strlen($_SERVER['DOCUMENT_ROOT']))));
     require_once(implode(DIRECTORY_SEPARATOR, ['Core', 'autoload.php']));

     $app = new Core\Core();
     $app->run(); 

// var_dump($_SERVER);
// echo "<br>".var_dump($_SERVER)."<br>";
//var_dump($_SERVER['REQUEST_URI']); -->
?>


<!DOCTYPE html>

<html> 
<head> <title>WESH</title>
</head>

<body>
<?php
//include 'Core\ORM.php';
$user = new ORM();
$user->read('users', '1');
//var_dump($user->read('users', '1'));
?>
</body>
