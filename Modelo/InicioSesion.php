<?php

    session_start();

    require_once("../Conection/ConectionBD.php");

    class modelo_login{

        private $login;

        public function myconstruct()
        {         
            $this->$login = array(); 
            $this->$existeError = "";
            $this->$mensajeError = "";
        }

        public function post_login($UserName,$Password){

            $conIns = new conection();
            $conn = $conIns -> sqlConection();

            $params = array(array("LOGIN",SQLSRV_PARAM_IN), array($UserName, SQLSRV_PARAM_IN),array($Password,SQLSRV_PARAM_IN),array($TIMESTAMP,SQLSRV_PARAM_IN));
            $tsql_callSP = "{call dbo.SEL_Login(?,?,?,?)}";



            $stmr = sqlsrv_query($conn,$tsql_callSP,$params);
        
            
            while($reg = sqlsrv_fetch_array($stmr)){

                
                $this->login[] = $reg;

            }
            
            for($a = 0; $a < count($this->login); $a++)
            {
                $verify = $this->login[$a]['ExisteError'];
                    if($verify == "0")
                    {                        
                        return $this->login;
                        break;
                    }
                    else if($verify == "2")
                    {                                   
                        return $this->login[$a]['MensajeError'];
                        break;
                    }else{
                        return "Se ha producido un error indefinido, favor de contactar con el administrador";
                        break;
                    }

            }

        }//cierra funcion login
    }//cierra la clase
?>

