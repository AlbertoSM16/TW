<?php

function login(){
    require 'conexionBD.php';

    if($_SERVER["REQUEST_METHOD"]==="POST"){
        
        $email=$_POST['email'];
        $query="SELECT * FROM usuarios WHERE email=:email";

        $stament=$conn->prepare($query);
        $stament->bindParam(":email",$email);
        $stament->execute();
        $usuario = $stament->fetch(PDO::FETCH_ASSOC);
        $contrasenia = $usuario["contrasena"];


    if(password_verify($_POST['contrasena'], $contrasenia)){
            $_SESSION['datosUsuario']=$usuario;   
            $query_logs = 'INSERT INTO logs (accion) VALUES (:query);';

            $stament=$conn->prepare($query_logs);

            $stament->bindParam(":query",$query);
            $stament->execute();

            
            return true;
           
        }

        return false;
    }
}
function isLogged(){
    return isset($_SESSION['datosUsuario']);
}

function esRecepcionista(){

    if(isset($_SESSION['datosUsuario'])){
        if($_SESSION['datosUsuario']['rol']=="recepcionista"){
            return true;
        }
    }
       return false;
    
}

function esAdministrador(){

    if($_SESSION['datosUsuario']['rol']=="administrador"){
        return true;
    }
       return false;
    
}

function esCliente(){

    if($_SESSION['datosUsuario']['rol']=="cliente"){
        return true;
    }
       return false;
    
}



function cerrarSesion(){
        
    session_destroy();
    header('Location: index.php');
    
}