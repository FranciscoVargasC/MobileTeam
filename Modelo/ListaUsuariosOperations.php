<?php
require_once("../Conection/conectionBD.php");
class OperacionUser{

    private $response;
    public function construct()
        {         
            $this->$response = array();            
        }


    public function eliminarRegistroTBL($bandera, $username)
    {
        try{
            $conIns = new conection();
            $conn = $conIns -> sqlConection();   
            $params = array(array($bandera,SQLSRV_PARAM_IN), array("", SQLSRV_PARAM_IN), array($username, SQLSRV_PARAM_IN), array("", SQLSRV_PARAM_IN));      

            $tsql_callSP = "{call dbo.OP_OperacionesUsuarios(?,?,?,?)}";
        
            $stmr = sqlsrv_query($conn,$tsql_callSP,$params); 
                
                while($reg = sqlsrv_fetch_array($stmr))
                    {   
                        $this->response[] = $reg;
                    }
                    
                    return $this->response[0]["MensajeError"];
            
        }catch(Exception $ex){
            return "Se ha producido un error indefinido, favor de contactar con el administrador";
        }        
    }//eliminarRegistroTBL

    public function editarRegistro($bandera,$username, $accion, $valor){
        try{
            $res = array();
            $conIns = new conection();
            $conn = $conIns -> sqlConection();  
           
  
            $params = array(array($bandera,SQLSRV_PARAM_IN), array($accion, SQLSRV_PARAM_IN) ,array($username, SQLSRV_PARAM_IN), array($valor, SQLSRV_PARAM_IN));      

            $tsql_callSP = "{call dbo.OP_OperacionesUsuarios(?,?,?,?)}";
        
            $stmr = sqlsrv_query($conn,$tsql_callSP,$params); 



            while($reg = sqlsrv_fetch_array($stmr))
            {   
                $this->response[] = $reg;
            }

          return $this->response[0]["MensajeError"];
            
     
        
        }catch(Exception $ex){
            return "Se ha producido un error indefinido, favor de contactar con el administrador";
        } 
    }//


    public function insertarRegistro($username,$password, $nombre, $apellidoP, $apellidoM, $rol, $equipo, $lider){
        try{
            
            $conIns = new conection();
            $conn = $conIns -> sqlConection();  
           
  
            $params = array(array($username,SQLSRV_PARAM_IN), 
                            array($password, SQLSRV_PARAM_IN),
                            array($nombre, SQLSRV_PARAM_IN),
                            array($apellidoP, SQLSRV_PARAM_IN), 
                            array($apellidoM, SQLSRV_PARAM_IN), 
                            array($rol, SQLSRV_PARAM_IN),
                            array($equipo, SQLSRV_PARAM_IN),
                            array($lider, SQLSRV_PARAM_IN));      

            $tsql_callSP = "{call dbo.INS_NuevoUsuario(?,?,?,?,?,?,?,?)}";
        
            $stmr = sqlsrv_query($conn,$tsql_callSP,$params); 



            while($reg = sqlsrv_fetch_array($stmr))
            {   
                $this->response[] = $reg;
            }

          return $this->response[0]["MensajeError"];
            
     
        
        }catch(Exception $ex){
            return "Se ha producido un error indefinido, favor de contactar con el administrador";
        } 
    }
    
}//OperacionCuentas
?>