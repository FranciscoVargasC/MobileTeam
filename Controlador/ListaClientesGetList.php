




<?php



session_start();

$rol = $_SESSION['ID_Rol'];
$equipo = $_SESSION['ID_Equipo'];

/*echo $rol;
echo "    " + $equipo;*/

if(!isset($rol))
{
    ?>    
   <script>
   alert('No puedes acceder sin una sesión activa.');
    window.location='../Controlador/IndexController.php';
  </script>
    <?php
}else{
    require_once("../Modelo/ListaClientesModel.php");
    $conexion = new modelo_ListaClientes();
    $datos = $conexion -> get_ClientsList($rol,$equipo); 
    $listaComboEquipo = $conexion -> getComboEquipo($rol,$equipo);
    $listaComboToken = $conexion -> getComboToken($rol,$equipo);
    require_once("../Vista/ListaclientesView.php");
}


?>








