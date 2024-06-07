<?php

function login(){
    require 'conexionBD.php';

    if($_SERVER["REQUEST_METHOD"]==="POST"){
        
        $email=$_POST['email'];
        $contrasena=$_POST['contrasena'];

        $query="SELECT * FROM usuarios WHERE email=:email AND contrasena=:contrasena";

        $stament=$conn->prepare($query);
        $stament->bindParam(":email",$email);
        $stament->bindParam(":contrasena", $contrasena);

        $stament->execute();

    if($stament->rowCount()==1){
            $usuario_log=$stament->fetch(PDO::FETCH_ASSOC);
            $_SESSION['datosUsuario']=$usuario_log;   
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