<?php

if(!isset($rol))
{
    ?>
    <script>
    window.location='../Vista/Error.php';
   </script>
   <?php
}
?>

<HTML>
    <HEAD>
        <TITLE>ListaClientes</TITLE>
    </HEAD>
    <?php
        require_once("ListaUsuarioValidation.php");
    ?>
    <a href="../Controlador/ListaClientesGetList.php" >Regresar</a>
    <a href="#" onclick="add('visible');">Agregar nuevo usuario</a>
    <?php
        echo "<BODY>";    
            require_once("ListaUsuario_Container.php");        
        echo "</BODY>"; 
    ?>
</HTML>