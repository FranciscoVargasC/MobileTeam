<?php
require_once("../Modelo/NuevoClienteModel.php");
$conexion = new modelo_NuevoCliente();


$serie = ($_POST['serie'].length == 0) ? "" : $_POST['serie'];
$cCertificado = ($_POST['cCertificado'].length == 0) ? "" : $_POST['cCertificado'];
$bTelefono = ($_POST['bTelefono'].length == 0) ? "" : $_POST['bTelefono'];
$an = ($_POST['an'].length == 0) ? "" : $_POST['an'];
$caracteristicas = ($_POST['caracteristicas'].length == 0) ? "" : $_POST['caracteristicas'];
$comentarios = ($_POST['comentarios'].length == 0) ? "" : $_POST['comentarios'];

$response = $conexion -> setNuevoCliente($_POST['numCliente'], $_POST['nomCliente'], $_POST['pass'], $_POST['ambiente'], $_POST['cobertura'], $_POST['t_persona'], $_POST['equipo'], $_POST['token'], $serie, $cCertificado, $_POST['existeToken'], $bTelefono, $an, $caracteristicas, $comentarios); 

echo $response;
?>