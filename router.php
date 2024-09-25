<?php
require_once 'app/tasks.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');



if (!empty($_GET["action"])){
    $action = $_GET["action"];
} else {
    $action = "listar";
}
//listar-> showTasks();
//agregar-> addTask();
$params = explode("/",$action);

switch ($params[0]) {
    case 'listar':
        showTasks();
        break;
    case 'agregar':
        addTask();
        break;
 
    default:
        echo "Error 404";
        break;
}

