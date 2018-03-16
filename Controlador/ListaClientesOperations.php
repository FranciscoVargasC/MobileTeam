<?php
require_once("../Modelo/ListaClientesOperations.php");
$conexion = new OperacionCuentas();
$operacion = $conexion -> get(); 
require_once("../Vista/ListaClientesPrueba.php");
?>