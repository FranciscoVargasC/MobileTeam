<?php
class OperacionCuentas{
    public function get()
    {         
        try{  
            return "CORRECTO";
                
        }catch(Exception $ex){
            return "Se ha producido un error indefinido, favor de contactar con el administrador";
        }     
       
    }//get_ClientsList
}//OperacionCuentas
?>