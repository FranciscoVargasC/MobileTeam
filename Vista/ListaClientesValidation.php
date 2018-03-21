
<script>

    //Evalua el rol que contenga el cliente
    function evalRol($dat){
        var rol = 1;//hardeCodeCambiar
        var nombreBTN = "btnEliminar"; 
        var nombreField = ["numeroCliente", "nombrecliente", 
                           "password", "ambiente_descripcion",
                           "cobertura_descripcion", "tipo_persona_descripcion", 
                           "equipo_descripcion", "token_type_descripcion", 
                           "numero_serie", "celular_certificado",
                           "existe_token", "base_mejor_telefono",
                           "an", "caracteristicas",
                           ];
            
        for(var i = 0; i < $dat; i++){
            
           var concatenado = nombreBTN.concat(i);  
           
           
           var concatField =  nombreField[i].concat(i);         
           if(rol == 1 || rol == 3){                   
                document.getElementById(concatenado).style.visibility = "visible";
                document.getElementById(concatField).readOnly  = false;
           }else{
                document.getElementById(concatenado).style.visibility = "hidden";
                document.getElementById(concatField).readOnly  = false;
           }
        }
    }//evalRol

    //selecciona que elementos se habilitaran durante el boton edicion
    function editingField(){

    }

    function eliminarCliente($i) {    
        var id = document.getElementById("tblClientes").rows[$i+1].cells.item(0).innerHTML;
         var r = confirm("¿Desea eliminar el registro: " + id + "?");
        if (r == true) {
            window.location = '../Controlador/ListaClientesOperations.php?ID=' + id +"&operacion=ELIMINAR_REGISTRO";
        } 
                     
    }//eliminarCliente
</script>