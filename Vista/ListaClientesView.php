<HTML>
    <HEAD>
        <TITLE>ListaClientes</TITLE>
    </HEAD>

    <?php
        require_once("ListaClientesValidation.php");
    ?>
    <a href="../Controlador/NuevoClienteController.php" >Nuevo registro</a>  
    <a href="../Controlador/LogoutController.php" >Cerrar Sesión</a>
    <?php
        echo "<BODY onload=\"evalRol(".count($datos).",".$_SESSION['ID_Rol'].");\">";    
            require_once("ListaClientes_Container.php");        
        echo "</BODY>"; 
    ?>

    
</HTML>
