<?php
class TaskModel{
    private function getConection(){

        return new PDO('mysql:host=localhost;dbname=db_tareas;charset=utf8','root', '');
    }

    function getTasks(){
        $db = $this-> getConection();
        $query = $db->prepare('SELECT * FROM tareas');
        $query->execute();
            //task es un arreglo de tareas
        $tasks = $query-> fetchALL(PDO::FETCH_OBJ);
        return $tasks;
    }
    function insertTask($title, $description, $priority){
        $db = $this-> getConection();
    
        $query= $db ->prepare('INSERT INTO tareas(titulo, descripcion, prioridad)VALUES(?,?,?)');
        $query->execute([$title, $description, $priority]);
        return $db->lastInsertId();
    }
    function deleteTask($id){
        
        $db= $this-> getConection();
        $query = $db->prepare('DELETE FROM tareas WHERE id=?');
        $query->execute([$id]);
        header('Location: ' . BASE_URL); 
      
    }
    function updateTask($id){
        $db = $this-> getConection();
        $query = $db->prepare('UPDATE tareas SET finalizada = 1 WHERE id=? ');
        $query->execute([$id]);
     
    }
}