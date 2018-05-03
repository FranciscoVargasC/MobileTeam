<?php

if(!isset($rol))
{
    ?>
    <script>
    window.location='../Vista/Error.php';
   </script>
   <?php
}
?>





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


function insertarNuevoUsuario(){
        
        var user_name = document.getElementById("userNew").value;//
        var pass_new = document.getElementById("passNew").value;//
        var name = document.getElementById("name").value;//
        var ap = document.getElementById("ap").value;//
        var am = document.getElementById("am").value;//
        var rolN = document.getElementById("ID_RolN").value;//
        var equipoN = document.getElementById("ID_EquipoN").value;//
        var lider = document.getElementById("lider").value;//
        alert(lider);
        if(val_UserName(user_name)){
            if(val_pass(pass_new)){
                if(val_NombreCliente(name)){
                    if(val_ap(ap)){
                        if(val_am(am)){
                            if(val_equipo(equipoN)){
                                if(val_rol(rolN)){
                                    if(val_lead(lider)){
                                        let parametro={"bandera": "INSERTAR", 
                                                       "username": user_name, 
                                                       "password": pass_new, 
                                                       "nombre": name,
                                                       "apellidoP": ap,
                                                       "apellidoM" : am,
                                                       "rol": rolN,
                                                       "equipo": equipoN,
                                                       "lider": lider
                                                       };
                                           
                                        $.ajax({data:  parametro,
                                        url: '../Controlador/ListaUsuariosOperations.php',
                                        type: 'post', 
                                            }).done(function(msg){
                                                if(Object.keys(msg).length != 0){
                                                alert(msg);
                                            }else{                        
                                                location.reload();
                                            }
                                        });; 
                                    }
                                }
                            }                            
                        }                        
                    }
                }
            }
        }


    }//insertar

    function val_lead(item){
        try {
            if(item.length != 0){
                if(item == "100"){
                    alert("Debes seleccionar una opción valida en el combo líder");
                    event.preventDefault();
                    return false;
                }else{
                    event.preventDefault();
                    return true;
                }
            }else{                
                alert("El campo líder se encuentra vacío favor de cumplir con los datos obligatorios(*)");
                event.preventDefault();
                return false;
            }            
        } catch (error) {
            alert("Ha ocurrido un problema dentro del funcionamiento, contacta al administrador: " + error);
            return false;
        }
    }//val_existe

    function val_rol(item){
        try {
            if(item.length != 0){
                if(item == "0"){
                    alert("Debes seleccionar una opción valida en el combo rol");
                    event.preventDefault();
                    return false;
                }else{
                    event.preventDefault();
                    return true;
                }
            }else{                
                alert("El campo rol se encuentra vacío favor de cumplir con los datos obligatorios(*)");
                event.preventDefault();
                return false;
            }            
        } catch (error) {
            alert("Ha ocurrido un problema dentro del funcionamiento, contacta al administrador: " + error);
            return false;
        }
    }//val_equipo

    function val_equipo(item){
        try {
            if(item.length != 0){
                if(item == "0"){
                    alert("Debes seleccionar una opción valida en el combo equipo");
                    event.preventDefault();
                    return false;
                }else{
                    event.preventDefault();
                    return true;
                }
            }else{                
                alert("El campo equipo se encuentra vacío favor de cumplir con los datos obligatorios(*)");
                event.preventDefault();
                return false;
            }            
        } catch (error) {
            alert("Ha ocurrido un problema dentro del funcionamiento, contacta al administrador: " + error);
            return false;
        }
    }//val_equipo

    function val_am(item){
        let regex = /[`\~\!@#\$%\^&\*\(\)_0-9|+\-=?;:'",\.<>\{\}\[\]\\\/]/gi;        
        let regex2 = /(\s\s){1,}/gi;
        try {           
                if(item.length > 40){                    
                    alert("El apellido materno no puede contener más de 40 dígitos");
                    event.preventDefault();
                    return false;
                }else{
                    if(item.match(regex) || item.match(regex2)){                       
                        alert("No se aceptan números, símbolos especiales o más de un espacio en blanco en apellido materno");
                        event.preventDefault();
                        return false;
                    }else{
                        event.preventDefault();
                        return true;
                    }
                }
            
        } catch (error) {
            alert("Ha ocurrido un problema dentro del funcionamiento, contacta al administrador: " + error);
            return false;
        }
    }//val_am

    function val_ap(item){
        
        let regex = /[`\~\!@#\$%\^&\*\(\)_0-9|+\-=?;:'",\.<>\{\}\[\]\\\/]/gi;        
        let regex2 = /(\s\s){1,}/gi;
        try {
            if(item.length != 0){                                
                if(item.length > 40){   
                                 
                    alert("El apellido paterno no puede contener más de 40 dígitos");
                    event.preventDefault();
                    return false;
                }else{
                    if(item.match(regex) || item.match(regex2)){                       
                        alert("No se aceptan números, símbolos especiales o más de un espacio en blanco en apellido paterno");
                        event.preventDefault();
                        return false;
                    }else{
                        event.preventDefault();
                        return true;
                    }
                }
            }else{                
                alert("El campo apellido paterno se encuentra vacío favor de cumplir con los datos obligatorios(*)");
                event.preventDefault();
                return false;
            }
        } catch (error) {
            alert("Ha ocurrido un problema dentro del funcionamiento, contacta al administrador: " + error);
            return false;
        }
    }//val_NombreCliente

    function val_NombreCliente(item){
        let regex = /[`\~\!@#\$%\^&\*\(\)_0-9|+\-=?;:'",\.<>\{\}\[\]\\\/]/gi;        
        let regex2 = /(\s\s){1,}/gi;
        try {
            if(item.length != 0){
                if(item.length > 70){                    
                    alert("El nombre no puede contener más de 40 dígitos");
                    event.preventDefault();
                    return false;
                }else{
                    if(item.match(regex) || item.match(regex2)){                       
                        alert("No se aceptan números, símbolos especiales o más de un espacio en blanco en Nombre");
                        event.preventDefault();
                        return false;
                    }else{
                        event.preventDefault();
                        return true;
                    }
                }
            }else{                
                alert("El campo Nombre se encuentra vacío favor de cumplir con los datos obligatorios(*)");
                event.preventDefault();
                return false;
            }
        } catch (error) {
            alert("Ha ocurrido un problema dentro del funcionamiento, contacta al administrador: " + error);
            return false;
        }
    }//val_NombreCliente

    function val_pass(item){
        try{
            if(item.length != 0){
                if(item.length <= 20){
                    return true;
                }else{
                    alert("El campo de password, no puede superar los 20 carácteres");
                    event.preventDefault();
                    return false;
                }
            }else{
                alert("El campo de nombre de password, no puede permanecer vacío");
                event.preventDefault();
                return false;
            }
        }catch(error){
            alert("Ha ocurrido un problema dentro del funcionamiento, contacta al administrador: " + error);
            return false;
        }
    }//val_pass

function val_UserName(item){
    try{    
        if(item.length != 0){
            if(item.length <= 30){
                return true;
            }else{
                alert("El campo de nombre de usuario, no puede superar los 30 carácteres");
                event.preventDefault();
                return false;
            }
        }else{
            alert("El campo de nombre de usuario, no puede permanecer vacío.");
            event.preventDefault();
            return false;
        }
    }catch(error){
        alert("Ha ocurrido un problema dentro del funcionamiento, contacta al administrador: " + error);
        return false;
    }
}//val_UserName

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

    function add(origen){
        switch(origen){
            case "visible":
                document.getElementById("addNew").style.visibility = "visible";
            break;
            case "hidden":
                document.getElementById("addNew").style.visibility = "hidden";

            break;
        }
    }

</script>