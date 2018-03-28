<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>

    //Evalua el rol que contenga el cliente
    function evalRol($dat, rol){
        
        var nombreBTN = "btnEliminar";
        for(var i = 0; i < $dat; i++){
           var concatenado = nombreBTN.concat(i);  
           //var concatField =  nombreField[i].concat(i);         
           if(rol == 1 || rol == 3){                   
                document.getElementById(concatenado).style.visibility = "visible";
                //document.getElementById(concatField).readOnly  = false;
           }else{
                document.getElementById(concatenado).style.visibility = "hidden";
                //document.getElementById(concatField).readOnly  = false;
           }
        }
    }//evalRol

    function onChange(ele,id){
        var ids = document.getElementById("tblClientes").rows[id+1].cells.item(0).innerHTML;
      
 
        var x = document.getElementById(ele.id).value;
      
      
        let parametro={"operacion": "EDITAR_REGISTRO", "id": ids, "accion": ele.name, "set": x};
                                           
                  $.ajax({data:  parametro,
                  url: '../Controlador/ListaClientesOperations.php',
                  type: 'post', 
                  }).done(function(msg){
                   if(Object.keys(msg).length != 0){
                      alert(msg);
                   }                        
                   location.reload();
                       });; 
    
            
    }

    function search(ele,id, accion) {
        try{
            if(event.code == 'Enter') {
                var ids = document.getElementById("tblClientes").rows[id+1].cells.item(0).innerHTML;
            
                let parametro={"operacion": "EDITAR_REGISTRO", "id": ids, "accion": accion, "set": ele.value};
                                           
                $.ajax({data:  parametro,
                        url: '../Controlador/ListaClientesOperations.php',
                        type: 'post', 
                      }).done(function(msg){
                         if(Object.keys(msg).length != 0){
                            alert(msg);
                         }                        
                         location.reload();
                      });; 
            }else if(event.code == 'KeyC' && (event.ctrlKey || event.metaKey)){
                location.reload();      
            }
        }catch(ex){
            alert("Se ha generado un error generico, favor de contactar al administrador: (search)");
        }
    }//search

    //selecciona que elementos se habilitaran durante el boton edicion
    function editarCliente($num, eval){        
       
       try{  
           
            var id = document.getElementById("tblClientes").rows[$num+1].cells.item(0).innerHTML;           
            document.getElementById(eval.id).style.backgroundColor = "#16e0c7";
            document.getElementById(eval.id).readOnly  = false;       

       }catch(ex){
           alert("Se ha generado un error generico, favor de contactar al administrador: (editarCliente)");
       }
    }//editarCliente

    //Permite eliminar un registro
    function eliminarCliente($i) {    
        var id = document.getElementById("tblClientes").rows[$i+1].cells.item(0).innerHTML;
         var r = confirm("¿Desea eliminar el registro: " + id + "?");
        if (r == true) {
            let parametro={"id": id, "operacion": "ELIMINAR_REGISTRO"};                                           
            $.ajax({data:  parametro,
                url:   '../Controlador/ListaClientesOperations.php',
                type:  'post', 
                }).done(function(msg){
                    alert(msg);
                    location.reload();
                });; 
        }                      
    }//eliminarCliente
</script>