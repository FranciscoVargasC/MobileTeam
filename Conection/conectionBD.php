<?php
class conection{
    
    public function sqlConection(){
        try{
            $serverName = '172.16.2.115';
            $connectionInfo = array("Database"=>"QAClientes", "UID"=>"Francisco", "PWD"=>"@dmin2018","CharacterSet"=>"UTF-8");
   
            $conn = sqlsrv_connect($serverName, $connectionInfo);   
             
            if($conn){
                return $conn;
            }else
                return null;
        }catch(Exception $ex){
            return "Se ha producido un error generico, favor de contactar con el administrador";
        }       
    }//sqlConection

}//class
?>