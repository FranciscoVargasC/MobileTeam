<HTML>
    <HEAD>
        <TITLE>Clientes</TITLE>
      
        <script>
function selecciona($i) {
    
    alert(document.getElementById("tblClientes").rows[$i+1].cells.item(0).innerHTML);
}
</script>

    </HEAD>

    <BODY>
    

<p id="demo"></p>
        <?php
            require_once("container/ListaClientes_Container.php");
        ?>
    </BODY>
</HTML>
