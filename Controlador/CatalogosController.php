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
require_once("../Modelo/CatalogoModelo.php");
$conexion = new modelo_Catalogos();
$listaComboAmbiente = $conexion -> getComboAmbiente($rol,$equipo);


echo "<a href='../Vista/CatalogoAmbiente.php'>Catalogo Ambiente</a>";

}

?>





 