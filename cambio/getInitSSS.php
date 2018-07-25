<?php
require_once('./nusoap/lib/nusoap.php');
    class con{
        
        public function getInit($h, $c, $p, $sID){
            $url = "$h:$p/$c/$sID?wsdl";
            
            try {
                $client = new SoapClient($url);
                $result = $client->initSSS();
                return $result;
            } catch ( SoapFault $e ) {
                 return 0;
            }
        }//getInit

        public function register($h, $c, $p, $sID, $appSession, $clientID, $telefono){
       
            $url = "$h:$p/$c/$sID?wsdl";
            
            try {   
                $xml_post_string = '';   

                $headers = array(
                        "Content-type: text/xml;charset=\"utf-8\"",
                        "Accept: text/xml",
                        "Cache-Control: no-cache",
                        "Pragma: no-cache",
                        "SOAPAction: ''",         
                    ); 
            
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
                curl_setopt($ch, CURLOPT_TIMEOUT, 10);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $xml_post_string);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

            
                $response = curl_exec($ch); 
                curl_close($ch);
                return $response;
            } catch ( SoapFault $e ) {
                 return 0;
            }
        }//register


    }//class
?>
