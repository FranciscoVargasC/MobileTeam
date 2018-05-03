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
}else if($bandera == "INSERTAR"){
    $materno = ($_POST["apellidoM"] == "" || $_POST["apellidoM"] == null) ?  "" : $_POST["apellidoM"];

    $resultadoInsert = $conexion -> insertarRegistro($_POST["username"], $_POST["password"], $_POST["nombre"], $_POST["apellidoP"],$materno, $_POST["rol"], $_POST["equipo"], $_POST["lider"]);
    echo $resultadoInsert;
}
?>