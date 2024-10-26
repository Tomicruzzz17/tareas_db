<?php
class UserModel{
    private function getConection(){

        return new PDO('mysql:host=localhost;dbname=db_tareas;charset=utf8','root', '');
    }

    function getUserByName($usuario){
        $db = $this-> getConection();
        $query = $db->prepare('SELECT * FROM usuarios WHERE usuario = ?');
        $query->execute([$usuario]);
            //task es un arreglo de tareas
        $user = $query-> fetchALL(PDO::FETCH_OBJ);
        return $user;
    }
    function insertUser($usuario, $password){
        $db = $this-> getConection();
    
        $query= $db ->prepare('INSERT INTO usuarios(usuario, contraseña)VALUES(?,?)');
        $query->execute([$usuario, $password]);
        return $db->lastInsertId();
    }
}
