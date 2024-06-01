<?php

function login(){
    require 'conexionBD.php';

    session_start();
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
            return true;
           
        }
        return false;
    }
}

function esRecepcionista(){

    if($_SESSION['datosUsuario']['rol']=="recepcionista"){
        return true;
    }
       return false;
    
}



function cerrarSesion(){
        
    session_destroy();
    
}