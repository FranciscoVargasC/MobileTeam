<?php
require_once("../Conection/conectionBD.php");

$conIns = new conection();
$conn = $conIns -> sqlConection(); 


class modelo_ListaClientes{

    private $listaClientes;

    public function construct()
        {         
            $this->$listaClientes = array();            
        }

    public function get_ClientsList()
    {   
        try{          
        $params = array(array(1, SQLSRV_PARAM_IN),array(1, SQLSRV_PARAM_IN));
        $tsql_callSP = "{call SEL_SeleccionarClientesExistentes(?,?)}";
        
        $stmr = sqlsrv_query($conn, $tsql_callSP, $params);  
            while($reg = sqlsrv_fetch_array($stmr))
                {            
                    $this->listaClientes[] = $reg;
                }
                    
                if($this->listaClientes[0]['ExisteError'] == "0")
                    {
                        return $this->listaClientes;
                    }
                    else
                        {
                            return null;
                        }
                
        }catch(Exception $ex){
            return "Se ha producido un error generico, favor de contactar con el administrador";
        }        
    }//get_ClientsList
}//class
?>