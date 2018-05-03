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

    function insertar(){
        
        var numCliente = document.getElementById("numCliente").value;//
        var nomCliente = document.getElementById("nomCliente").value;//
        var pass = document.getElementById("pass").value;//
        var ambiente = document.getElementById("ambiente").value;//
        var cobertura = document.getElementById("cobertura").value;//
        var t_persona = document.getElementById("T_persona").value;//
        var equipo = document.getElementById("equipo").value;//
        var token = document.getElementById("token").value;//
        var serie = document.getElementById("serie").value;
        var cCertificado = document.getElementById("cCertificado").value;
        var existeToken = document.getElementById("existeToken").value;//
        var bTelefono = document.getElementById("bTelefono").value;
        var an = document.getElementById("an").value;
        var caracteristicas = document.getElementById("car").value;
        var comentarios = document.getElementById("com").value;

        if(val_NumeroCliente(numCliente)){
            if(val_NombreCliente(nomCliente)){
                if(val_Password(pass)){       
                    document.getElementById("pass").value = pass.charAt(0).toUpperCase() + pass.slice(1); 
                    if(val_Ambiente(ambiente)){
                        if(val_Cobertura(cobertura)){
                            if(val_tipo_persona(t_persona)){
                                if(val_equipo(equipo)){
                                    if(val_token(token)){
                                        if(val_existe(existeToken)){
                                            let parametro={"numCliente": numCliente,
                                                           "nomCliente": nomCliente, 
                                                           "pass": pass.charAt(0).toUpperCase() + pass.slice(1),
                                                           "ambiente": ambiente,
                                                           "cobertura" : cobertura,
                                                           "t_persona" : t_persona,   
                                                           "equipo" : equipo,
                                                           "token" : token,
                                                           "serie" : serie,
                                                           "cCertificado" : cCertificado, 
                                                           "existeToken" : existeToken,  
                                                           "bTelefono" : bTelefono,
                                                           "an" : an,
                                                           "caracteristicas" : caracteristicas,  
                                                           "comentarios" : comentarios                                                    
                                                           };
                                           
                                            $.ajax({data:  parametro,
                                            url: '../Controlador/NuevoClienteInsert.php',
                                            type: 'post', 
                                            }).done(function(msg){
                                            if(Object.keys(msg).length != 0){
                                                alert(msg);
                                                location.reload();
                                            }            
                                                alert(msg);            
                                                location.reload();
                                            });; 
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }//insertar

    function val_existe(item){
        try {
            if(item.length != 0){
                if(item == "100"){
                    alert("Debes seleccionar una opción valida en el combo existe token");
                    event.preventDefault();
                    return false;
                }else{
                    event.preventDefault();
                    return true;
                }
            }else{                
                alert("El campo existe token se encuentra vacío favor de cumplir con los datos obligatorios(*)");
                event.preventDefault();
                return false;
            }            
        } catch (error) {
            alert("Ha ocurrido un problema dentro del funcionamiento, contacta al administrador: " + error);
            return false;
        }
    }//val_existe

    function val_token(item){
        try {
            if(item.length != 0){
                if(item == "0"){
                    alert("Debes seleccionar una opción valida en el combo token type");
                    event.preventDefault();
                    return false;
                }else{
                    event.preventDefault();
                    return true;
                }
            }else{                
                alert("El campo token type se encuentra vacío favor de cumplir con los datos obligatorios(*)");
                event.preventDefault();
                return false;
            }            
        } catch (error) {
            alert("Ha ocurrido un problema dentro del funcionamiento, contacta al administrador: " + error);
            return false;
        }
    }//val_token

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

    function val_tipo_persona(item){
        try {
            if(item.length != 0){
                if(item == "0"){
                    alert("Debes seleccionar una opción valida en el combo tipo de persona");
                    event.preventDefault();
                    return false;
                }else{
                    event.preventDefault();
                    return true;
                }
            }else{                
                alert("El campo tipo de persona se encuentra vacío favor de cumplir con los datos obligatorios(*)");
                event.preventDefault();
                return false;
            }            
        } catch (error) {
            alert("Ha ocurrido un problema dentro del funcionamiento, contacta al administrador: " + error);
            return false;
        }
    }//val_tipo_persona
    
    function val_Cobertura(item){
        try {
            if(item.length != 0){
                if(item == "0"){
                    alert("Debes seleccionar una opción valida en el combo cobertura");
                    event.preventDefault();
                    return false;
                }else{
                    event.preventDefault();
                    return true;
                }
            }else{                
                alert("El campo Cobertura se encuentra vacío favor de cumplir con los datos obligatorios(*)");
                event.preventDefault();
                return false;
            }            
        } catch (error) {
            alert("Ha ocurrido un problema dentro del funcionamiento, contacta al administrador: " + error);
            return false;
        }
    }//val_Cobertura

    function val_Ambiente(item){
        try {
            if(item.length != 0){
                if(item == "0"){
                    alert("Debes seleccionar una opción valida en el combo ambiente");
                    event.preventDefault();
                    return false;
                }else{
                    event.preventDefault();
                    return true;
                }
            }else{                
                alert("El campo Ambiente se encuentra vacío favor de cumplir con los datos obligatorios(*)");
                event.preventDefault();
                return false;
            }            
        } catch (error) {
            alert("Ha ocurrido un problema dentro del funcionamiento, contacta al administrador: " + error);
            return false;
        }
    }//val_Ambiente

    function val_Password(item){
        let regex = /[`\~\!@#\$%\^&\*\(\)_|+\-=?;:'",\.<>\{\}\[\]\\\/]/gi;        
        let regex2 = /(\s\s){1,}/gi;     
     
        try{
            if(item.length != 0){
                if(item.length > 8){                    
                    alert("El password no puede contener más de 8 dígitos");
                    event.preventDefault();
                    return false;
                }else{
                    if(item.length < 8){
                        alert("El password no puede contener menos de 8 dígitos");
                        event.preventDefault();
                        return false;
                    }else{
                        if(item.match(regex) || item.match(regex2)){                        
                            alert("No se aceptar símbolos especiales o espacios en blanco en password");
                            event.preventDefault();
                            return false;
                        }else{ 
                            event.preventDefault();                       
                            return true;                        
                        }
                    }
                }
            }else{                
                alert("El campo Password se encuentra vacío favor de cumplir con los datos obligatorios(*)");
                event.preventDefault();
                return false;
            }
        }catch(error){
            alert("Ha ocurrido un problema dentro del funcionamiento, contacta al administrador: " + error);
            return false;
        }
    }//val_Password

    function val_NombreCliente(item){
        let regex = /[`\~\!@#\$%\^&\*\(\)_0-9|+\-=?;:'",\.<>\{\}\[\]\\\/]/gi;        
        let regex2 = /(\s\s){1,}/gi;
        try {
            if(item.length != 0){
                if(item.length > 70){                    
                    alert("El nombre del cliente no puede contener más de 70 dígitos");
                    event.preventDefault();
                    return false;
                }else{
                    if(item.match(regex) || item.match(regex2)){                       
                        alert("No se aceptan números, símbolos especiales o más de un espacio en blanco en Nombre del cliente");
                        event.preventDefault();
                        return false;
                    }else{
                        event.preventDefault();
                        return true;
                    }
                }
            }else{                
                alert("El campo Nombre del cliente se encuentra vacío favor de cumplir con los datos obligatorios(*)");
                event.preventDefault();
                return false;
            }
        } catch (error) {
            alert("Ha ocurrido un problema dentro del funcionamiento, contacta al administrador: " + error);
            return false;
        }
    }//val_NombreCliente

    function val_NumeroCliente(item){
        let regex = /[`\~\!@#\$%\^&\*\(\)_a-zA-Z|+\-=?;:'",\.<>\{\}\[\]\\\/]/gi;        
        let regex2 = /(\s\s){1,}/gi;
        try{
            if(item.length != 0){
                if(item.length > 10){                    
                    alert("El número de cliente no puede contener más de 10 dígitos");
                    event.preventDefault();
                    return false;
                }else{
                    if(item.match(regex) || item.match(regex2)){                        
                        alert("No se aceptan símbolos especiales, letras o espacios en blanco en número del cliente");
                        event.preventDefault();
                        return false;
                    }else{
                        event.preventDefault();
                        return true;
                    }
                }
            }else{                
                alert("El campo Número del cliente se encuentra vacío favor de cumplir con los datos obligatorios(*)");
                event.preventDefault();
                return false;
            }
        }catch(error){
            alert("Ha ocurrido un problema dentro del funcionamiento, contacta al administrador: " + error);
            return false;
        }
    }//val_NumeroCliente

</script>