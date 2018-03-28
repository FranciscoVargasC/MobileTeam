<HTML>
    <HEAD>
        <TITLE>ListaClientes</TITLE>
    </HEAD>
    <?php
        require_once("ListaClientesValidation.php");
    ?>
    <a href="../Controlador/NuevoClienteController.php" >Nuevo registro</a>  
    <?php
        echo "<BODY onload=\"evalRol(".count($datos).",1);\">";    
            require_once("ListaClientes_Container.php");        
        echo "</BODY>"; 
    ?>
</HTML>
