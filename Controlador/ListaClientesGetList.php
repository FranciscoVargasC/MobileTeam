<?php
require_once("../Modelo/ListaClientesModel.php");
$conexion = new modelo_ListaClientes();
$datos = $conexion -> get_ClientsList(); 
require_once("../Vista/ListaclientesView.php");

$params = ($_GET["res"] == '') ? 't': $_GET["res"];

if($params != "t"){
  ?>
    <script>
      alert($params);
      window.location = "../Controlador/ListaClientesGetList.php";
    </script>;
<?php
}

?>