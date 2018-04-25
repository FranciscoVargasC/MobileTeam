
<?php

session_start();

require_once("../Modelo/InicioSesion.php");
$conexion = new modelo_login();
$datos = $conexion -> post_login($_POST["nombUsuario"],$_POST["pass"]);
echo $datos;




try{
    if(is_array($datos))
    {
        $UserName = array();
        $NombreCompleto = array();
        $Categoria = array();
        $Nombre_Equipo = array();
        $ID_Rol = array();
        $ID_Equipo = array();
        $FechaSesion = array();


            for($a = 0; $a < count($datos); $a++)
            {

                    $UserName[] = $datos[$a]['UserName'];
                    $NombreCompleto[] = $datos[$a]['NombreCompleto'];
                    $Categoria[] = $datos[$a]['Categoria'];
                    $Nombre_Equipo[] = $datos[$a]['Nombre_Equipo'];
                    $ID_Rol[] = $datos[$a]['ID_Rol'];
                    $ID_Equipo[] = $datos[$a]['ID_Equipo'];
                    $FechaSesion[] = $datos[$a]['FechaSesion'];



                    $_SESSION['Usuario']= $UserName[$a];
                    $_SESSION['NombreCompleto']= $NombreCompleto[$a];
                    $_SESSION['Categoria']= $Categoria[$a];
                    $_SESSION['Nombre_Equipo']= $Nombre_Equipo[$a];
                    $_SESSION['ID_Rol']= $ID_Rol[$a];
                    $_SESSION['ID_Equipo']= $ID_Equipo[$a];
                    $_SESSION['FechaSesion'] = $FechaSesion[$a];
                    

            }
            require_once("../Controlador/ListaClientesGetList.php");
   }else{
    echo "<script>";
    echo "alert(" .$datos.")";
    echo "</script>";
   }

}

catch(Exception $ex)
   {                
          echo "<script>"."alert('Ha ocurrido un problema con el portal, favor de contactar al administrador.\n
          Error Message: ".$ex."');"."</script>";

   }                    



?>





