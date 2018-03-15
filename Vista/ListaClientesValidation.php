
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
        var parametro={"id" : id};
                                                     
            $.ajax({//función ajax, con la cuál mando los parametros
                    data:  parametro,
                    url:   '/Vista/ListaClientesOperations.php',
                    type:  'post', 
                  }).done(function(msg){
                       if(msg == 'true')
                        {
                           alert("Su carga de los nuevos clientes fue exitosa");
                          location.reload();
                      }
                              else
                          {
                         alert("Ha ocurrido un error, favor de intentarlo más tarde.");
                        location.reload();
                          }                                                      
                           });; 
    }//eliminarCliente
</script>