<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
function onChange(ele,id){
    var ids = document.getElementById("tblUser").rows[id+1].cells.item(0).innerHTML; 

    var x = document.getElementById(ele.id).value;


   

    var accion  = (ele.name == "ID_Rol") ? "ROL" : "EQUIPO";  
  
    let parametro={"bandera": "EDITAR", "username": ids, "accion": accion, "set": x};
                                       
              $.ajax({data:  parametro,
              url: '../Controlador/ListaUsuariosOperations.php',
              type: 'post', 
              }).done(function(msg){
               if(Object.keys(msg).length != 0){
                  alert(msg);
               }                        
               location.reload();
                   });;     
}

function eliminarCliente($i) {    
        var id = document.getElementById("tblUser").rows[$i+1].cells.item(0).innerHTML;
         var r = confirm("¿Desea eliminar el registro: " + id + "?");
        if (r == true) {
            let parametro={"username": id, "bandera": "ELIMINAR"};                                           
            $.ajax({data:  parametro,
                url:   '../Controlador/ListaUsuariosOperations.php',
                type:  'post', 
                }).done(function(msg){
                    alert(msg);
                    location.reload();
                });; 
        }                      
    }//eliminarCliente

    function add(){
        document.getElementById("addNew").style.visibility = "visible";
    }

</script>