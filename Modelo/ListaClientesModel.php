<?php
require_once("../Conection/conectionBD.php");

class modelo_ListaClientes{    
    private $listaClientes;
    public function construct()
        {         
            $this->$listaClientes = array(); 
            $this->$existeError = "";
            $this->$mensajeError = "";
        }
    
    public function get_ClientsList()
    {         
        try{  
            $conIns = new conection();
            $conn = $conIns -> sqlConection();     
           
            $rol = 2;  
            $equipo = 1;                    
            $params = array(array($rol,SQLSRV_PARAM_IN), array($equipo, SQLSRV_PARAM_IN));      

            $tsql_callSP = "{call dbo.SEL_SeleccionarClientesExistentes(?,?)}";
        
            $stmr = sqlsrv_query($conn,$tsql_callSP,$params); 
                
                while($reg = sqlsrv_fetch_array($stmr))
                    {   
                        $this->listaClientes[] = $reg;
                    }
                    
                for($i = 0; $i < count($this->listaClientes); $i++){
                    $verify = $this->listaClientes[$i]['ExisteError'];
                    if($verify == "0")
                    {                        
                        return $this->listaClientes;
                        break;
                    }
                    else if($verify == "2")
                    {                                   
                        return $this->listaClientes[$i]['MensajeError'];
                        break;
                    }else{
                        return "Se ha producido un error indefinido, favor de contactar con el administrador";
                        break;
                    }
                }
                
        }catch(Exception $ex){
            return "Se ha producido un error indefinido, favor de contactar con el administrador";
        }     
       
    }//get_ClientsList

    public function get()
    {         
        try{  
            return "CORRECTO";
                
        }catch(Exception $ex){
            return "Se ha producido un error indefinido, favor de contactar con el administrador";
        }     
       
    }//get_ClientsList


}//class
?>