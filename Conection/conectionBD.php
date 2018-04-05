<?php
class conection{    
    public function sqlConection(){
        try{
            $serverName = '192.168.0.100';
            $connectionInfo = array("Database"=>"QAClientes", "UID"=>"Francisco", "PWD"=>"@dmin2018","CharacterSet"=>"UTF-8");
   
            $conn = sqlsrv_connect($serverName, $connectionInfo);   
             
            if($conn){
                return $conn;
                sqlsrv_close( $conn );
            }else
                echo "<script>";
                echo "window.location = 'www.facebook.com'";
                echo "</script>";
                return null;
                sqlsrv_close( $conn );
        }catch(Exception $ex){
            return "Se ha producido un error generico, favor de contactar con el administrador";
        }       
    }//sqlConection
}//class
?>