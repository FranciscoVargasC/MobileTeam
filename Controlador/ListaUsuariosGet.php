<?php

session_start();

$rol = $_SESSION['ID_Rol'];
$equipo = $_SESSION['ID_Equipo'];
if(!isset($rol))
{
    ?>    
   <script>
   alert('No puedes acceder sin una sesión activa.');
    window.location='../Controlador/IndexController.php';
  </script>
    <?php
}else{
require_once("../Modelo/ListaUsuariosModel.php");
    $conexion = new UsersList();

    $datos = $conexion -> getListUser(); 
    $listaComboRol = $conexion -> getCombos("ROL");
    $listaComboEQ = $conexion -> getCombos("EQUIPO");
require_once("../Vista/ListaUsuariosView.php");
}
?>