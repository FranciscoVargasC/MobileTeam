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



<?php
require_once("../Conection/conectionBD.php");

class modelo_ListaClientes{    
    private $listaClientes;
    private $listaComboEquipo;
    private $listaComboToken;
    public function construct()
        {         
            $this->$listaClientes = array(); 
            $this->$listaComboEquipo = array();
            $this->$listaComboToken = array();
            $this->$existeError = "";
            $this->$mensajeError = "";
        }


    public function getComboToken($rol3, $equipo3){
        try{
            $conIns = new conection();   
            $listaComboEquipo = array();
            $conn = $conIns -> sqlConection();

            $paco = "LISTA";
            $paco1 = "TOKEN_TYPE";
            $params = array(array($paco,SQLSRV_PARAM_IN), array($rol3, SQLSRV_PARAM_IN),array($paco1,SQLSRV_PARAM_IN), array($equipo3, SQLSRV_PARAM_IN));   
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