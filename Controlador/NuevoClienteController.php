<?php


session_start();

$rol = $_SESSION['ID_Rol'];
$equipo = $_SESSION['ID_Equipo'];

if(!isset($rol))
{
    ?>    
   <script>
   alert('No puedes acceder sin una sesión activa.');
    window.location='../Controlador/IndexController.php';
  </script>
    <?php
}else{

require_once("../Modelo/NuevoClienteModel.php");
$conexion = new modelo_NuevoCliente();
$contenido = array("AMBIENTE", "COBERTURA", "TIPO_PERSONA", "EQUIPO", "TOKEN_TYPE");

$ambiente = array();
$cobertura = array();
$tipo_persona = array();
$equipo = array();
$toke_type = array();
$contA = 0;
$contC = 0;
$contP = 0;
$contE = 0;
$contT = 0;

for($a = 0; $a < count($contenido);$a++){
    switch($contenido[$a])
    {
        case "AMBIENTE":
            $ambiente = $conexion -> getCombosNuevo("NUEVO",$contenido[$a]);                   
            $contA = count($ambiente); 
        break;
        case "COBERTURA":
            $cobertura = $conexion -> getCombosNuevo("NUEVO",$contenido[$a]); 
            $contC = count($cobertura);
        break;
        case "TIPO_PERSONA":
            $tipo_persona = $conexion -> getCombosNuevo("NUEVO",$contenido[$a]); 
            $contP = count($tipo_persona);
        break;
        case "EQUIPO":
            $equipo = $conexion -> getCombosNuevo("NUEVO",$contenido[$a]); 
            $contE = count($equipo);
        break;
        case "TOKEN_TYPE":
            $toke_type = $conexion -> getCombosNuevo("NUEVO",$contenido[$a]); 
            $contT = count($toke_type);
        break;
    }
}
require_once("../Vista/NuevoCLienteView.php");
}
?>