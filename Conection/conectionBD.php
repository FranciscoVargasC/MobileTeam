<?php
class conection{    
    public function sqlConection(){
        try{
<<<<<<< HEAD
            $serverName = '54.183.103.215';
            $connectionInfo = array("Database"=>"QAClientes", "UID"=>"sa", "PWD"=>"Banamex1","CharacterSet"=>"UTF-8");
   echo $conn;
=======
            $serverName = 'ADLNVPC08HFPK\SQLEXPRESS';
            $connectionInfo = array("Database"=>"QAClientes", "UID"=>"nuevoLogin", "PWD"=>"@dmin2018","CharacterSet"=>"UTF-8");
>>>>>>> f44b329ef3fe82ee145d73bb6428b69be20b1baf
            $conn = sqlsrv_connect($serverName, $connectionInfo);   

             
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