<?php

session_start();



$UserName = $_SESSION['Usuario'];
$TIMESTAMP = $_SESSION['FechaSesion'];


require_once("../Modelo/LogoutModelo.php");
$conexion = new modelo_logout();
$logout = $conexion -> post_logout($UserName,$TIMESTAMP);


if($logout)
{
    echo '<script>alert (" Hasta luego '.$UserName.' , regresa pronto");</script>';
    session_destroy();
    
    echo "<script>window.location='../Controlador/IndexController.php';</script>";
    
}else{

    echo '<script>alert ('.$logout.');</script>';
}
  