<?php
require_once './app/db.php';
function showTasks(){
    require 'templates/header.php';
    
    //obtener tareas.
    $tasks = getTasks();
    require 'templates/form_alta.php';
    ?>
    <ul class="list-group">
    
    <?php foreach($tasks as $task){ ?>
        
        <li class="list-group-item">
            <b><?php echo $task->titulo;?></b> | (Prioridad <?php echo $task->prioridad ?>)
        </li>
        
    <?php }?>
    </ul>
    

    <?php
    require 'templates/header.php';
}
function addTask(){
    //Obtener datos del form
    if(isset($_POST['title'])){
        $title= $_POST['title'];
    }
    if(isset($_POST['priority'])){
        $priority=$_POST['priority'];
    }
    if(isset($_POST['description'])){
        $description=$_POST['description'];
    }
    //inserto los datos en la db
    $id = insertTask($title, $description, $priority);
    if($id){
        //redirijo al usuario a la pantalla principal
        header('Location:' . BASE_URL);
        echo "se inserto la tarea! id= $id";
    }
    else{
        echo "error al insertar la tarea";
    }
    
}