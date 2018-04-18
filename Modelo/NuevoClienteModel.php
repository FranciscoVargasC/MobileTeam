<?php
require_once("../Conection/conectionBD.php");

class modelo_NuevoCliente{    
    private $listaComboNuevo;

    public function construct()
        {         
            $this->$listaComboNuevo = array();                     
        }

//rellena ComboBox
    public function getCombosNuevo($origen, $accion){
        try{
            $conIns = new conection();   
            $listaComboEquipo = array();
            $conn = $conIns -> sqlConection();
            $params = array(array($origen,SQLSRV_PARAM_IN), array(1, SQLSRV_PARAM_IN),array($accion,SQLSRV_PARAM_IN), array(1, SQLSRV_PARAM_IN));   
            $tsql_callSP = "{call dbo.SEL_ComboBOX(?,?,?,?)}";
            $stmr = sqlsrv_query($conn,$tsql_callSP,$params);
                while($reg = sqlsrv_fetch_array($stmr))
                {          
                    $listaComboNuevo[] = $reg;
                }
                
                return $listaComboNuevo;
            
        }catch(Exception $ex){
            return "Se ha producido un error indefinido, favor de contactar con el administrador";
        }
    }//getComboToken

}//class
?>