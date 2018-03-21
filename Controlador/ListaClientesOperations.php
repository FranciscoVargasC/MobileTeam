<?php
require_once("../Modelo/ListaClientesOperations.php");
$conexion = new OperacionCuentas();

$operacion = $_GET['operacion'];
$id = $_GET['ID'];
if($operacion == "ELIMINAR_REGISTRO"){
    $result = $conexion -> eliminarRegistroTBL($operacion,$id);
    echo "<script type='text/javascript'>";      
    echo "window.location = '../Controlador/ListaClientesGetList.php?res=".$result."'";    
    echo "</script>";    
}
?>