<?php
require_once("../Modelo/ListaClientesModel.php");
$conexion = new modelo_ListaClientes();
$datos = $conexion -> get_ClientsList(); 
require_once("../Vista/ListaclientesView.php");

?>