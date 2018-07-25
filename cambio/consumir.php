<?php
    require_once('./nusoap/lib/nusoap.php');
    require_once("getInitSSS.php");
    ini_set('max_execution_time', 10); 
    $verificador;
    $h = $_GET['primeraVariable'];
    $c = $_GET['segundaVariable'];
    $p = $_GET['terceraVariable'];
    $sID = $_GET['cuartaVariable'];

    try{
        $conexion = new con();
        $result = $conexion -> getInit($h, $c, $p, $sID);
        
        if($result){
            if($result != 0){
            $firstGet = get_object_vars ($result);
            $secondGet = get_object_vars ( $firstGet["InitSSSResponse"] );
            echo json_encode($secondGet,true);
            }else{
                $arrException = array("errorCode"=>"100", "messageError"=>"Ha ocurrido un error en la llamada al servicio");
                echo json_encode($arrException, true);
            }
        }else{
            $arrEmpty = array("errorCode"=>"200", "messageError"=>"El servicio no responde, posiblemente no este activo");
            echo json_encode($arrEmpty, true);
        }
    }catch(Exception $ex){
        $arrException = array("errorCode"=>"100", "messageError"=>"Ha ocurrido un error en la llamada al servicio");
        echo json_encode($arrException, true);
    }
?>