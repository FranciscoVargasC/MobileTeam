<?php
class conection{    
    public function sqlConection(){
        try{
            $serverName = ';
            $connectionInfo = array("Database"=>"QAClientes", "UID"=>"sa", "PWD"=>"","CharacterSet"=>"UTF-8");
   
            $conn = sqlsrv_connect($serverName, $connectionInfo);   

             //hola
            
            if($conn){
                return $conn;
                sqlsrv_close( $conn );
            }else
            die( print_r( sqlsrv_errors(), true));
            if( ($errors = sqlsrv_errors() ) != null) {
                foreach( $errors as $error ) {
                    echo "SQLSTATE: ".$error[ 'SQLSTATE']."<br />";
                    echo "code: ".$error[ 'code']."<br />";
                    echo "message: ".$error[ 'message']."<br />";
                }
            }
                //echo "<script>";
               // echo "window.location = '../Vista/setNull.htmlñ'";
                //echo "</script>";
                return null;
                sqlsrv_close( $conn );
        }catch(Exception $ex){
            return "Se ha producido un error generico, favor de contactar con el administrador";
        }       
    }//sqlConection
}//class
?>
