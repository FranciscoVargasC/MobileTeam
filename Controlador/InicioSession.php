<?php
    session_start();
    if(!isset($_POST["nombUsuario"])){
?>    
   <script>
        alert('No puedes acceder sin una sesión de usuario activa, favor de ingresar tus credenciales');
        window.location='../Controlador/IndexController.php';
  </script>
<?php
    }else{
        require_once("../Modelo/InicioSesion.php");
        $conexion = new modelo_login();
        $datos = $conexion -> post_login($_POST["nombUsuario"],$_POST["pass"]);

        try{
            if(is_array($datos)){
                $UserName = array();
                $NombreCompleto = array();
                $Categoria = array();
                $Nombre_Equipo = array();
                $ID_Rol = array();
                $ID_Equipo = array();
                $FechaSesion = array();

                for($a = 0; $a < count($datos); $a++){
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
                echo "<script>window.location='../Controlador/ListaClientesGetList.php';</script>";
            }else{      
                
                if($datos != "100"){         
                    echo "<script>";
                    echo "alert('".$datos."');";
                    echo "window.location='../Controlador/IndexController.php';";
                    echo "</script>";
                }else{
                    ?>
                    
                        <script>
                    var r = confirm('Se ha detectado una sesión ya activa en éste u otro dispositivo. \n Desea cerrar la antigua sesión y acceder desde este dispositivo?');
                    if (r == true) {
                        <?php
                        $newLogin = $conexion -> new_login($_POST["nombUsuario"]);
                        for($a = 0; $a < count($newLogin); $a++){

                            $UserName[] = $newLogin[$a]['UserName'];
                            $NombreCompleto[] = $newLogin[$a]['NombreCompleto'];
                            $Categoria[] = $newLogin[$a]['Categoria'];
                            $Nombre_Equipo[] = $newLogin[$a]['Nombre_Equipo'];
                            $ID_Rol[] = $newLogin[$a]['ID_Rol'];
                            $ID_Equipo[] = $newLogin[$a]['ID_Equipo'];
                            $FechaSesion[] = $newLogin[$a]['FechaSesion'];
        
                            $_SESSION['Usuario']= $UserName[$a];
                            $_SESSION['NombreCompleto']= $NombreCompleto[$a];
                            $_SESSION['Categoria']= $Categoria[$a];
                            $_SESSION['Nombre_Equipo']= $Nombre_Equipo[$a];
                            $_SESSION['ID_Rol']= $ID_Rol[$a];
                            $_SESSION['ID_Equipo']= $ID_Equipo[$a];
                            $_SESSION['FechaSesion'] = $FechaSesion[$a];
                        }
                        ?>
                        window.location='../Controlador/ListaClientesGetList.php';
                    }
                    </script>
                   <?php
                }
            }
        }
        catch(Exception $ex)
        {                
            echo "<script>"."alert('Ha ocurrido un problema con el portal, favor de contactar al administrador.\n
            Error Message: ".$ex."');"."</script>";
        }                    
    }
?>






