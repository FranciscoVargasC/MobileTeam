<HTML>
    <HEAD>
        <TITLE>ListaClientes</TITLE>
    </HEAD>

    <?php
        require_once("ListaClientesValidation.php");
    ?>

   
    <a href="../Controlador/LogoutController.php" >Cerrar Sesión</a>
    <a href="../Controlador/CatalogosController.php" id='cat'>Catalogos</a>

    <a href="../Controlador/NuevoClienteController.php" >Nuevo cliente</a> <br>
    <a href="../Controlador/ListaUsuariosGet.php" id='user' >Usuarios</a>  

    <?php
        echo "<BODY onload=\"evalRol(".count($datos).",".$_SESSION['ID_Rol'].");\">";    
            require_once("ListaClientes_Container.php");        
        echo "</BODY>"; 
    ?>

    
</HTML>
