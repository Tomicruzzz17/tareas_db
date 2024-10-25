<?php
require_once 'app/models/task.model.php';
require_once 'app/views/task.view.php';


class TaskController{
    private $model;
    private $view;


    function __construct(){
        $this->model = new TaskModel();
        $this->view = new TaskView();
    }
    


    function showTasks(){
        //obtiene tareas del modelo
        $tasks = $this->model-> getTasks();
        $this->view->showTask($tasks);
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
        $id = $this->model->insertTask($title, $description, $priority);
        if($id){
            //redirijo al usuario a la pantalla principal
            header('Location:' . BASE_URL);
            echo "se inserto la tarea! id= $id";
        }
        else{
            $this->view->showError('Faltan datos');
        }
        
    }
    function removeTask($id){
        $this->model->deleteTask($id);
        header('Location: ' . BASE_URL); 
    }
    function finishTask($id){
        $this->model->updateTask($id);
        header('Location: ' . BASE_URL);  
    }
}