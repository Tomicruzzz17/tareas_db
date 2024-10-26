<?php

require_once 'app/controllers/task.controller.php';
require_once 'app/controllers/auth.controller.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');



if (!empty($_GET["action"])){
    $action = $_GET["action"];
} else {
    $action = "listar";
}
//listar-> showTasks();
//agregar-> addTask();
//eliminar/:ID -> deleteTask();
//finalizar/:ID-> finishTask();
$params = explode("/",$action);

switch ($params[0]) {
    case 'listar':
        $controller= new TaskController();
        $controller->showTasks();
        break;
    case 'agregar':
        $controller= new TaskController();
        $controller->addTask();
        break;
    case 'eliminar':
        $controller= new TaskController();
        $controller->removeTask($params[1]);  //por parametro le paso la ubicacion del id, el cual sera utilizado para eliminar la tarea.
        break;
        
    case 'finalizar':
        $controller= new TaskController();
        $controller->finishTask($params[1]);
        break;
    case 'showLogin':
        $controller = new AuthController();
        $controller->showLogin();
        break;
    case 'login':
        $controller = new AuthController();
        $controller->login();
 
    default:
        echo "Error 404";
        break;
}

