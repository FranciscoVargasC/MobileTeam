<?php
require_once("../Conection/conectionBD.php");

class modelo_NuevoCliente{    
    private $listaComboEquipo;
    private $listaComboAmbiente;
    private $listaComboCobertura;
    private $listaComboRol;
    private $listaComboTipoPersona;
    private $listaComboTokenType;

    public function construct()
        {         
            $this->$listaComboEquipo = array(); 
            $this->$listaComboAmbiente = array();
            $this->$listaComboCobertura = array();
            $this->$listaComboRol = array(); 
            $this->$listaComboTipoPersona = array(); 
            $this->$listaComboTokenType = array();          
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
                    $listaComboToken[] = $reg;
                }
                return $listaComboToken;
            
        }catch(Exception $ex){
            return "Se ha producido un error indefinido, favor de contactar con el administrador";
        }
    }//getComboToken

    public function getComboEquipo($rol2, $equipo2){
        try{
            $conIns = new conection();   
            $listaComboEquipo = array();
            $conn = $conIns -> sqlConection();     
        
            $paco = "LISTA";
            $paco1 = "EQUIPO";
            $params = array(array($paco,SQLSRV_PARAM_IN), array($rol2, SQLSRV_PARAM_IN),array($paco1,SQLSRV_PARAM_IN), array($equipo2, SQLSRV_PARAM_IN));   
            $tsql_callSP = "{call dbo.SEL_ComboBOX(?,?,?,?)}";
            $stmr = sqlsrv_query($conn,$tsql_callSP,$params); 
         
            while($reg = sqlsrv_fetch_array($stmr))
                {          
                    $listaComboEquipo[] = $reg;
                }
                return $listaComboEquipo;
                   
        
        }catch(Exception $ex){
            return "Se ha producido un error indefinido, favor de contactar con el administrador";
        }
    }//getCombos

    //registrosInsumos
    public function get_ClientsList($rol, $equipo)
    {         
        try{  
            $conIns = new conection();
            $conn = $conIns -> sqlConection();     
           
                               
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

}//class
?>