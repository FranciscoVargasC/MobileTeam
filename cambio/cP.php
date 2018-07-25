<?php

    class con{
        public function getInit(){
            $url = "http://dominio-mobile.tk:20752/c735_015_mobileECSBridge/ChangeCredentialsService?wsdl";
            try {
                $client = new SoapClient($url );
                $result = $client->initSSS( [ "InitSSSResponse" => $argv[1]]);
              
                return $result;
            } catch ( SoapFault $e ) {
                 return $e->getMessage();
            }
        }
    }
?>