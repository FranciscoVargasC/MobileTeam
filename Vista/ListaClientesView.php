
<HTML>
    <HEAD>
        <TITLE>ListaClientes</TITLE>
    </HEAD>
    <?php
        require_once("ListaClientesValidation.php");
    ?>
    <?php
        echo "<BODY onload=\"evalRol(".count($datos).");\">";    
            require_once("ListaClientes_Container.php");        
        echo "</BODY>"; 
    ?>
</HTML>
