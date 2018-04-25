<?php

require_once("../Conection/conectionBD.php");
class UsersList{
    private $listaUser;
    private $responseUpdate;
    private $responseDelete;
    private $responseCombos;

    public function contruct(){
        $this->$listaUser = array();
        $this->$responseUpdate = array();
        $this->$responseDelete = array();
        $this->$responseCombos = array();
    }//contruct

    public function getListUser(){
        try{
            $conIns = new conection();   
   
            $conn = $conIns -> sqlConection();  
            $tsql_callSP = "{call dbo.SEL_UsuariosTable()}";
            $stmr = sqlsrv_query($conn,$tsql_callSP); 
         
            while($reg = sqlsrv_fetch_array($stmr))
                {          
                    $listaUser[] = $reg;
                }
                return $listaUser;
        }catch(Exception $ex){
            return "Se ha producido un error indefinido, favor de contactar con el administrador";
        }            
    }//getListUSer

    public function updateList($accion, $username, $valor){
        try{
            $conIns = new conection();   
   
            $conn = $conIns -> sqlConection();
            $params = array(array("EDITAR",SQLSRV_PARAM_IN)
                           ,array($accion, SQLSRV_PARAM_IN)
                           ,array($username, SQLSRV_PARAM_IN)
                           ,array($valor, SQLSRV_PARAM_IN));      
  
            $tsql_callSP = "{call dbo.OP_OperacionesUsuarios(?,?,?,?)}";
            $stmr = sqlsrv_query($conn,$tsql_callSP, $params); 
         
            while($reg = sqlsrv_fetch_array($stmr))
                {          
                    $responseUpdate[] = $reg;
                }
                return $responseUpdate[0]["MensajeError"];
        }catch(Exception $ex){
            return "Se ha producido un error indefinido, favor de contactar con el administrador";
        }
    }//updateList

    public function deleteList($username){
        try{
            $conIns = new conection();   
   
            $conn = $conIns -> sqlConection();
            $params = array(array("ELIMINAR",SQLSRV_PARAM_IN)
                           ,array("", SQLSRV_PARAM_IN)
                           ,array($username, SQLSRV_PARAM_IN)
                           ,array(0, SQLSRV_PARAM_IN));      
  
            $tsql_callSP = "{call dbo.OP_OperacionesUsuarios(?,?,?,?)}";
            $stmr = sqlsrv_query($conn,$tsql_callSP, $params); 
         
            while($reg = sqlsrv_fetch_array($stmr))
                {          
                    $responseDelete[] = $reg;
                }
                return $responseDelete[0]["MensajeError"];
        }catch(Exception $ex){
            return "Se ha producido un error indefinido, favor de contactar con el administrador";
        }
    }//deleteList

    public function getCombos($accion){
        try{
            $conIns = new conection();   
   
            $conn = $conIns -> sqlConection();
            $params = array(array("COMBOS",SQLSRV_PARAM_IN)
                           ,array($accion, SQLSRV_PARAM_IN)
                           ,array("", SQLSRV_PARAM_IN)
                           ,array(0, SQLSRV_PARAM_IN));      
  
            $tsql_callSP = "{call dbo.OP_OperacionesUsuarios(?,?,?,?)}";
            $stmr = sqlsrv_query($conn,$tsql_callSP, $params); 
         
            while($reg = sqlsrv_fetch_array($stmr))
                {          
                    $responseCombos[] = $reg;
                }
                return $responseCombos;
        }catch(Exception $ex){
            return "Se ha producido un error indefinido, favor de contactar con el administrador";
        }
    }//getCombos

}//class

?>