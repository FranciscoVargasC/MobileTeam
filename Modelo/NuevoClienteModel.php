<?php
require_once("../Conection/conectionBD.php");

class modelo_NuevoCliente{    
    private $listaComboNuevo;
    private $responseInsert;

    public function construct()
        {         
            $this->$listaComboNuevo = array(); 
            $this->$responseInsert = array();                    
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

    public function setNuevoCliente($numero_cliente, $nombre_cliente, $password, $id_ambiente, $id_cobertura, $id_tipo_persona, $id_equipo, $id_tokenType, $numero_serie, $celularCertificado, $existeToken, $baseMejor, $an, $carac, $coment){
        try{
            $conIns = new conection();   
            
            $conn = $conIns -> sqlConection();
            $params = array(array($numero_cliente, SQLSRV_PARAM_IN),
                            array($nombre_cliente, SQLSRV_PARAM_IN),
                            array($password, SQLSRV_PARAM_IN),
                            array($id_ambiente, SQLSRV_PARAM_IN),
                            array($id_cobertura, SQLSRV_PARAM_IN), 
                            array($id_tipo_persona, SQLSRV_PARAM_IN), 
                            array($id_equipo, SQLSRV_PARAM_IN), 
                            array($id_tokenType, SQLSRV_PARAM_IN), 
                            array($numero_serie, SQLSRV_PARAM_IN), 
                            array($celularCertificado, SQLSRV_PARAM_IN), 
                            array($existeToken, SQLSRV_PARAM_IN), 
                            array($baseMejor, SQLSRV_PARAM_IN), 
                            array($an, SQLSRV_PARAM_IN), 
                            array($carac, SQLSRV_PARAM_IN), 
                            array($coment, SQLSRV_PARAM_IN));   
            $tsql_callSP = "{call dbo.INS_NuevosClientes(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)}";
            $stmr = sqlsrv_query($conn,$tsql_callSP,$params);

            
                while($reg = sqlsrv_fetch_array($stmr))
                {          
                    
                    $this->responseInsert[] = $reg;
                }
                
                for($i = 0; $i < count($this->responseInsert); $i++){
                    $verify = $this->responseInsert[$i]['ExisteError'];
                    
                    if($verify == "0")
                    {                        
                        return $this->responseInsert[$i]['MensajeError'];
                        break;
                    }
                    else if($verify == "2")
                    {                                   
                        return $this->responseInsert[$i]['MensajeError'];
                        break;
                    }else{
                        return "Se ha producido un error indefinido, favor de contactar con el administrador";
                        break;
                    }
                }
            
        }catch(Exception $ex){
            return "Se ha producido un error indefinido, favor de contactar con el administrador";
        }
    }//getComboToken



}//class
?>