<?php
require_once("../Modelo/ListaClientesModel.php");
$conexion = new modelo_ListaClientes();
$datos = $conexion -> get_ClientsList(2,1); 
$listaComboEquipo = $conexion -> getComboEquipo(2,1);
$listaComboToken = $conexion -> getComboToken(2,1);
require_once("../Vista/ListaclientesView.php");

?>