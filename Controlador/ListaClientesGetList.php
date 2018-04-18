<?php
$paco = $_POST["username"];
try{


    require_once("../Modelo/ListaClientesModel.php");
    $conexion = new modelo_ListaClientes();

    $datos = $conexion -> get_ClientsList(2,2); 
    $listaComboEquipo = $conexion -> getComboEquipo(2,2);
    $listaComboToken = $conexion -> getComboToken(2,2);
    require_once("../Vista/ListaclientesView.php");

   
}catch(Exception $ex){
    
                  
}
?>