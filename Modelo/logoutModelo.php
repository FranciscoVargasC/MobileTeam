
<?php
    session_start();

    require_once("../Conection/conectionBD.php");

    class modelo_logout {

        private $logout;

    public function myconstructor()
    {

        $this->$logout = array();
        $this->$existeError = "";
        $this->$mensajeError = "";

    }//Cierra funcion de constructor
    
    public function post_logout($UserName,$TIMESTAMP)
    {
        $conIns = new conection();
        $conn = $conIns -> sqlConection();

        $params = array(array("LOGOUT",SQLSRV_PARAM_IN), array($UserName, SQLSRV_PARAM_IN),array("",SQLSRV_PARAM_IN),array($TIMESTAMP,SQLSRV_PARAM_IN));
        $tsql_callSP = "{call dbo.SEL_Login(?,?,?,?)}";
        

        $stmr = sqlsrv_query($conn,$tsql_callSP,$params);
        
            while($reg = sqlsrv_fetch_array($stmr)){

                $this->logout[] = $reg;
                
            }

            
            
            for($a = 0; $a < count($this->logout); $a++)
            {
                $verify = $this->logout[$a]['ExisteError'];
                    if($verify == "0")
                    {                        
                        return $this->logout;
                        break;
                        
                    }
                    else if($verify == "2")
                    {                                   
                        return $this->logout[$a]['MensajeError'];
                        break;
                    }else{
                        return "Se ha producido un error indefinido, favor de contactar con el administrador";
                        break;
                    }
    
            }
            



    }
    
}//cierra clase logout

?>