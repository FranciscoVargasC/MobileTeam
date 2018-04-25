<?php

require_once("../Modelo/ListaUsuariosModel.php");
    $conexion = new UsersList();

    $datos = $conexion -> getListUser(); 
    $listaComboRol = $conexion -> getCombos("ROL");
    $listaComboEQ = $conexion -> getCombos("EQUIPO");
require_once("../Vista/ListaUsuariosView.php");
?>