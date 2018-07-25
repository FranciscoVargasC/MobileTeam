<?php
require_once('./nusoap/lib/nusoap.php');
    require_once("getInitSSS.php");
    ini_set('max_execution_time', 10); 
    $verificador;
    $h = $_GET['h'];
    $c = $_GET['c'];
    $p = $_GET['p'];
    $sID = $_GET['sID'];
    $appSession = $_GET['aS'];
    $clientID = $_GET['cID'];
    $telefono = $_GET['tl'];

    $conexion = new con();
    $result = $conexion -> register($h, $c, $p, $sID, $appSession, $clientID, $telefono);
    
    $findError = 'TPESVCFAIL';
    $findSuccess = 'BIENVENIDO';
    
    $resultadoError = strpos($result, $findError);
    $resultadoExito = strpos($result, $findSuccess);

    if($resultadoError !== FALSE){
        $errorResult = strpos($result, ";");
        if($errorResult !== FALSE){
            echo parsingResponse("1", substr($result, $errorResult + 1));
        }else{
            echo parsingResponse("1", "Hubo un error en el parseo de la respuesta, aunque fue negativa");
        }
    }else if($resultadoExito !== FALSE){
        $exitoResultado = strpos($result, ":");
        if($exitoResultado !== FALSE){
          
            echo parsingResponse("0", substr($result, $exitoResultado + 1));
        }else{
            echo parsingResponse("0", "Hubo un error en el parseo de la respuesta, aunque fue exitosa");
        }
    }



    function parsingResponse($code, $mensaje){
        try{
            switch($code){
                case "0":
                   
                    $respuesta = array("code" => $code, "messagge" => $mensaje);       
                    return json_encode($respuesta,true);
                break;

                case "1":
                  
                    $respuesta = array("code" => $code, "messagge" => $mensaje);       
                    return json_encode($respuesta,true);
                break;
            }
        }catch(Exception $ex){
            $arrException = array("errorCode"=>"100", "messageError"=>"Ha ocurrido un error en la llamada al servicio");
            return json_encode($arrException, true);
        }
    }

?>

