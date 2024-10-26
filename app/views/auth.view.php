<?php
require_once 'app/controllers/auth.controller.php';
class AuthView{
    function showLoginForm($error){
        require 'templates/formLogin.phtml';
    }
}