
<script>
    function evalRol($dat){
        var rol = 1;
        var nombreBTN = "btnEliminar"; 
            
        for(var i = 0; i < $dat; i++){
           var concatenado = nombreBTN.concat(i);            
           if(rol == 1 || rol == 3){
                   
                   document.getElementById(concatenado).style.visibility = "visible";
           }else{
                    document.getElementById(concatenado).style.visibility = "hidden";
           }
        }
    }//evalRol

    function eliminarCliente($i) {    
        var id = document.getElementById("tblClientes").rows[$i+1].cells.item(0).innerHTML;      
        window.location = '../Controlador/ListaClientesOperations.php';                                    
          
    }//eliminarCliente
</script>