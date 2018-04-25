<?php


session_start();


$rol = $_SESSION['ID_Rol'];
$equipo = $_SESSION['ID_Equipo'];

require_once("../Modelo/CatalogoModelo.php");
$conexion = new modelo_Catalogos();
$listaComboAmbiente = $conexion -> getComboAmbiente($rol,$equipo);


echo "<a href='../Vista/CatalogoAmbiente.php'>Catalogo Ambiente</a>";



?>





 