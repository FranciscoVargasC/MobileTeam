<?php
require_once("../Modelo/ListaUsuariosOperations.php");
$conexion = new OperacionUser();

$bandera = $_POST['bandera'];
$username = $_POST['username'];
$accion = $_POST['accion'];
$valor = $_POST['set'];



if($bandera == "ELIMINAR"){
    
    $result = $conexion -> eliminarRegistroTBL($bandera,$username);
    echo $result;     
}else if($bandera == "EDITAR"){
   
    $resultadoEdit = $conexion -> editarRegistro($bandera, $username, $accion, $valor);
    echo $resultadoEdit;
}
?>