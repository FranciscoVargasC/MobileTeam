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

class modelo_Catalogos{    
    private $listaComboAmbiente;

    public function construct()
        {         
            $this->$listaComboAmbiente = array();
            $this->$existeError = "";
            $this->$mensajeError = "";
        }

        

    public function getComboAmbiente($rol, $equipo){
        try{
            $conIns = new conection();   
            $listaComboAmbiente = array();
            $conn = $conIns -> sqlConection();

        

            $paco = "LISTA";
            $paco1 = "AMBIENTE";
            $params = array(array($paco,SQLSRV_PARAM_IN), array($rol3, SQLSRV_PARAM_IN),array($paco1,SQLSRV_PARAM_IN), array($equipo3, SQLSRV_PARAM_IN));   
            $tsql_callSP = "{call dbo.SEL_ComboBOXCatalogos(?,?,?,?)}";
            $stmr = sqlsrv_query($conn,$tsql_callSP,$params); 

            while($reg = sqlsrv_fetch_array($stmr))
            
                {          
                    $listaComboAmbiente[] = $reg;
                    
                }
                return $listaComboAmbiente;
                
        }catch(Exception $ex){
            return "Se ha producido un error indefinido, favor de contactar con el administrador";
        }
    }
}
?>