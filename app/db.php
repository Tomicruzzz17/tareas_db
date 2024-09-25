<?php
/**
 * obtiene y devuelve de la base de datos todas las tareas.
 */
function getConection(){
    return new PDO('mysql:host=localhost;dbname=db_tareas;charset=utf8','root', '');
}
function getTasks(){
    $db = getConection();
    $query = $db->prepare('SELECT * FROM tareas');
    $query->execute();
        //task es un arreglo de tareas
    $tasks = $query-> fetchALL(PDO::FETCH_OBJ);
    return $tasks;
}
//Inserta la task en la DB
function insertTask($title, $description, $priority){
    $db = getConection();

    $query= $db ->prepare('INSERT INTO tareas(titulo, descripcion, prioridad)VALUES(?,?,?)');
    $query->execute([$title, $description, $priority]);
    return $db->lastInsertId();
}