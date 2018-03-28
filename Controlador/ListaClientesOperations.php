<?php
require_once("../Modelo/ListaClientesOperations.php");
$conexion = new OperacionCuentas();

$operacion = $_POST['operacion'];
$accion = $_POST['accion'];
$set = $_POST['set'];
$id = $_POST['id'];

if($operacion == "ELIMINAR_REGISTRO"){
    $result = $conexion -> eliminarRegistroTBL($operacion,$id);
    echo $result;     
}else if($operacion == "EDITAR_REGISTRO"){
    $resultadoEdit = $conexion -> editarRegistro($operacion, $id, $accion, $set);
    echo $resultadoEdit;
}
?>