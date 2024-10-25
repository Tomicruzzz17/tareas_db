<?php 
class TaskView{
    function showTask($tasks){
        require 'templates/lista_tareas.phtml';        
        $count = count($tasks);
    }
    function showError($msg){
        echo '<h1>Error</h1>';
        echo $msg;
    }
}