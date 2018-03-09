<?php

require_once("BackEnd/conexionBD.php");


class clientes_model
    {
       
    private $lista;
    private $datos;    
    
    ///funcion constructor donde declaro la variable como arreglo
    public function construct()
        {
            $this->$lista = array();
            $this->$datos = array();            
        }
    
    public function get_Clientes_SQLSERVER()
        {
             $serverName = '192.168.15.146';
             $connectionInfo = array("Database"=>"TeamCIT", "UID"=>"Francisco", "PWD"=>"Expre55","CharacterSet"=>"UTF-8");
    
             $conn = sqlsrv_connect($serverName, $connectionInfo);
        
            $tsql_callSP = "{call SEL_SELECCIONA_CLIENTES_AUTOMATIZACION}";

            $stmr = sqlsrv_query($conn, $tsql_callSP);  
            while($reg = sqlsrv_fetch_array($stmr))
                {            
                    $this->datos[] = $reg;
                }
        
            
                if($this->datos[0]['ExisteError'] == "0")
                    {
                        return $this->datos;
                    }
                    else
                        {
                            return "ExisteError";
                        }
                
        
        }//get_Clientes_SQLSERVER
    
    ///funcion donde hace la consulta a la base de datos para imprimir la lista de clientes    mysql
    public function get_clientes()
        {
            $sql = "SELECT cli.NUMERO_CLIENTE, 
                           cli.PASS, 
                           usu.NOMBRE,                     
                           cobe.NOMBRE_COBERTURA 
                    FROM clientes cli 
                    INNER JOIN usuario usu on cli.PROPIETARIO = usu.ID_USUARIO
                    INNER JOIN cobertura cobe on cli.COBERTURA = cobe.ID_COBERTURA";
        
            $res = mysql_query($sql,Conectar::conexion());
        
            while($reg = mysql_fetch_assoc($res))
                {            
                    $this->lista[] = $reg;
                }
            return $this->lista;
        }//get _clientes
    
    ///funcion donde lee el archivo de JSON y lo transforma a un arreglo
     public function get_JSONGlobals()
        {
            $ruta = "Json/Globales/globals.postman_globals.json";
        
            if(file_exists($ruta))
                {
                    $str_datos = file_get_contents($ruta);
                    $datos_eventos = json_decode($str_datos,true);
           
                    return $datos_eventos;
                }
                else 
                    {
                        return "false";    
                    }
        }//get_JSONGlobals
    
    }
?>