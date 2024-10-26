<?php 
require_once 'app/models/user.model.php';
require_once 'app/views/auth.view.php';
class AuthController{
        private $model;
        private $view;
        function __construct(){
            $this->model = new UserModel();
            $this->view = new AuthView();
        }
        function showLogin(){
            return $this->view->showLoginForm($error = '');
        }
        function login(){
            $usuario = $_POST["usuario"];
            $password = $_POST["password"];

            if(empty($usuario)){
                echo 'Faltan completar datos del usuario';
            }
            else if(empty($password)){
                echo 'Falta completar la contraseña';
            }
            $userFromDB = $this-> model->getUserByName($usuario);
            
        }


}