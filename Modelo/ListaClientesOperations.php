<?php
require_once("../Conection/conectionBD.php");
class OperacionCuentas{

    private $response;
    public function construct()
        {         
            $this->$response = array();            
        }


    public function eliminarRegistroTBL($operacion, $id)
    {
        try{
            $conIns = new conection();
            $conn = $conIns -> sqlConection();   
            $params = array(array($operacion,SQLSRV_PARAM_IN), array($id, SQLSRV_PARAM_IN), array("null", SQLSRV_PARAM_IN), array("null", SQLSRV_PARAM_IN));      

            $tsql_callSP = "{call dbo.OP_OperacionesListaClientes(?,?,?,?)}";
        
            $stmr = sqlsrv_query($conn,$tsql_callSP,$params); 
                
                while($reg = sqlsrv_fetch_array($stmr))
                    {   
                        $this->response[] = $reg;
                    }
                    
                for($i = 0; $i < count($this->response); $i++){
                    $verify = $this->response[$i]['ExisteError'];
                    if($verify == "0")
                    {                        
                        return $this->response[$i]['MensajeError'];
                        break;
                    }
                    else if($verify == "2")
                    {                                   
                        return $this->response[$i]['MensajeError'];
                        break;
                    }else{
                        return "Se ha producido un error indefinido, favor de contactar con el administrador";
                        break;
                    }
                }
        }catch(Exception $ex){
            return "Se ha producido un error indefinido, favor de contactar con el administrador";
        }        
    }//eliminarRegistroTBL

    public function editarRegistro($operacion,$id, $accion, $set){
        try{
            $conIns = new conection();
            $conn = $conIns -> sqlConection();   
            $params = array(array($operacion,SQLSRV_PARAM_IN), array($id, SQLSRV_PARAM_IN) ,array($accion, SQLSRV_PARAM_IN), array($set, SQLSRV_PARAM_IN));      

            $tsql_callSP = "{call dbo.OP_OperacionesListaClientes(?,?,?,?)}";
        
            $stmr = sqlsrv_query($conn,$tsql_callSP,$params); 
                
                while($reg = sqlsrv_fetch_array($stmr))
                    {   
                        $this->response[] = $reg;
                    }
                    
                for($i = 0; $i < count($this->response); $i++){
                    $verify = $this->response[$i]['ExisteError'];
                    if($verify == "0")
                    {                        
                        return $this->response[$i]['MensajeError'];
                        break;
                    }
                    else if($verify == "2")
                    {                                   
                        return $this->response[$i]['MensajeError'];
                        break;
                    }else{
                        return "Se ha producido un error indefinido, favor de contactar con el administrador";
                        break;
                    }
                }

        }catch(Exception $ex){
            return "Se ha producido un error indefinido, favor de contactar con el administrador";
        } 
    }
    
}//OperacionCuentas
?>