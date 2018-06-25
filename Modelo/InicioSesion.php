<?php
    require_once("../Conection/ConectionBD.php");

    class modelo_login{
        private $login;
        private $new_login;

        public function myconstruct()
        {         
            $this->$login = array(); 
            $this->$new_login = array();
            $this->$existeError = "";
            $this->$mensajeError = "";
        }

        public function post_login($UserName,$Password){

            $conIns = new conection();
            $conn = $conIns -> sqlConection();
            $params = array(array("LOGIN",SQLSRV_PARAM_IN), array($UserName, SQLSRV_PARAM_IN),array($Password,SQLSRV_PARAM_IN),array('',SQLSRV_PARAM_IN));
            $tsql_callSP = "{call dbo.SEL_Login(?,?,?,?)}";

            $stmr = sqlsrv_query($conn,$tsql_callSP,$params);

            while($reg = sqlsrv_fetch_array($stmr)){
                $this->login[] = $reg;
            }
            
            for($a = 0; $a < count($this->login); $a++){                
                $verify = $this->login[$a]['ExisteError'];
                if($verify == "0"){                  
                    return $this->login;
                    break;
                }else if($verify == "2"){                                   
                        return $this->login[$a]['MensajeError'];
                        break;
                }else if($verify == "100"){
                        return $verify;
                        break;
                }else{
                    return "Se ha producido un error indefinido, favor de contactar con el administrador";
                    break;
                }
            }

        }//cierra funcion login

        public function new_login($UserName){

            $conIns = new conection();
            $conn = $conIns -> sqlConection();
            $params = array(array("NEWSESSION",SQLSRV_PARAM_IN), array($UserName, SQLSRV_PARAM_IN),array('',SQLSRV_PARAM_IN),array('',SQLSRV_PARAM_IN));
            $tsql_callSP = "{call dbo.SEL_Login(?,?,?,?)}";

            $stmr = sqlsrv_query($conn,$tsql_callSP,$params);

            while($reg = sqlsrv_fetch_array($stmr)){
                $this->new_login[] = $reg;
            }
            
            for($a = 0; $a < count($this->new_login); $a++){                
                $verify = $this->new_login[$a]['ExisteError'];
                if($verify == "0"){                  
                    return $this->new_login;
                    break;
                }else{
                    return "Se ha producido un error indefinido, favor de contactar con el administrador";
                    break;
                }
            }

        }//cierra funcion new_login
    }//class post_login
?>

