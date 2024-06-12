<?php

function login(){
    require 'conexionBD.php';

   
        
    $email=$_GET['email'];
    $query="SELECT * FROM usuarios WHERE email=:email";

    $stament=$conn->prepare($query);
    $stament->bindParam(":email",$email);
    $stament->execute();
    $usuario = $stament->fetch(PDO::FETCH_ASSOC);
    $_SESSION['datosUsuario']=$usuario;   
    $query_logs = 'INSERT INTO logs (accion) VALUES (:query);';

    $stament=$conn->prepare($query_logs);

    $stament->bindParam(":query",$query);
    $stament->execute();

     
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