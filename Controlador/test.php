<?php
require_once("../Modelo/modelo_ListaClientes.php");
$conexion = new modelo_ListaClientes();
$datos = $conexion -> get_ClientsList(); 

require_once("../Vista/PHP/Listaclientes.php");

?>