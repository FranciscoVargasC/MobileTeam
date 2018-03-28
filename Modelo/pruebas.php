<?php
require_once("../Conection/conectionBD.php");
        $conIns = new conection();   
        $listaComboEquipo = array();
        $conn = $conIns -> sqlConection();     
        $rol2 = 2;//cqmbiar
        $equipo2 = 2;
        $paco = "LISTA";
        $paco1 = "EQUIPO";
        $params = array(array($paco,SQLSRV_PARAM_IN), array($rol2, SQLSRV_PARAM_IN),array($paco1,SQLSRV_PARAM_IN), array($equipo2, SQLSRV_PARAM_IN));   
        $tsql_callSP = "{call dbo.SEL_ComboBOX(?,?,?,?)}";
        $stmr = sqlsrv_query($conn,$tsql_callSP,$params); 
     
        while($reg = sqlsrv_fetch_array($stmr))
            {           
                
                $listaComboEquipo[] = $reg;
            }

           
           
            echo " <select>";
           for($i = 0; $i < count($listaComboEquipo); $i++){
        
           
            echo '<option value="'.$listaComboEquipo[$i]["ID_Equipo"].'">'.$listaComboEquipo[$i]["Nombre_Equipo"].'</option>';
           
           }
echo "</select>";

?>