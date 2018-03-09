<?php
require_once("../BackEnd/conexionBD.php");
$conexion = new conection();
$datos = $conexion -> sqlConection(); 
echo $datos;

?>