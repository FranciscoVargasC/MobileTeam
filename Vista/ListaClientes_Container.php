<?php    
         try{
            if(is_array($datos))
                {
                    $numeroCliente = array();
                    $nombrecliente = array();
                    $password = array();                      
                    $id_ambiente = array();
                    $ambiente_descripcion = array();
                    $id_cobertura = array();                    
                    $cobertura_descripcion = array();
                    $id_tipo_persona = array();
                    $tipo_persona_descripcion = array();                      
                    $id_equipo = array();
                    $equipo_descripcion = array();
                    $id_token_type = array();
                    $token_type_descripcion = array();
                    $numero_serie = array();
                    $celular_certificado = array();                      
                    $existe_token = array();
                    $base_mejor_telefono = array();
                    $an = array();
                    $caracteristicas = array();
                    $comentarios = array();

                    
                    
                    echo "<div>";
                        echo "<div>";
                            echo "<table id='tblClientes' onload=\"evalRol()\" >";//tabla
                                echo "<thead>";//cabecera
                                    echo "<tr style='background:#5FABC0;'>";//tr head
                                        echo "<td>NÚMERO DEL CLIENTE</td>".
                                             "<td>NOMBRE DEL CLIENTE</td>".
                                             "<td>PASSWORD</td>".
                                             "<td>AMBIENTE</td>".
                                             "<td>COBERTURA</td>".
                                             "<td>TIPO DE PERSONA</td>".
                                             "<td>TEAM</td>".
                                             "<td>TOKEN TYPE</td>".
                                             "<td>NÚMERO DE SERIE</td>".
                                             "<td>CELULAR CERTIFICADO</td>".
                                             "<td>EXISTE TOKEN</td>".
                                             "<td>BADE MEJOR TELÉFONO</td>".
                                             "<td>A & N</td>".
                                             "<td>CARACTERISTICAS</td>".
                                             "<td>COMENTARIOS</td>";
                                    echo "</tr>";//tr head
                                echo "</thead>"; //cabecera
                
                                echo "<tbody>";//cuerpo
                                    for($i = 0;$i<count($datos);$i++)
                                        {   
                                            $numeroCliente[] = $datos[$i]["Numero_Cliente"];
                                            $nombrecliente[] = $datos[$i]["Nombre_Cliente"];
                                            $password[] = $datos[$i]["Password"];                     
                                            $id_ambiente[] = $datos[$i]["ID_Ambiente"];
                                            $ambiente_descripcion[] = $datos[$i]["Ambiente_Descripcion"];
                                            $id_cobertura[] = $datos[$i]["ID_Cobertura"];                    
                                            $cobertura_descripcion[] = $datos[$i]["Cobertura_Descripcion"];
                                            $id_tipo_persona[] = $datos[$i]["ID_Tipo_Persona"];
                                            $tipo_persona_descripcion[] = $datos[$i]["Tipo_Persona_Descripcion"];                    
                                            $id_equipo[] = $datos[$i]["ID_Equipo"];
                                            $equipo_descripcion[] = $datos[$i]["Equipo_Descripcion"];
                                            $id_token_type[] = $datos[$i]["ID_Token_Type"];
                                            $token_type_descripcion[] = $datos[$i]["Token_Type_Descripcion"];
                                            $numero_serie[] = $datos[$i]["Numero_Serie"];
                                            $celular_certificado[] = $datos[$i]["CelularCertificado"];                      
                                            $existe_token[] = $datos[$i]["existeToken"];
                                            $base_mejor_telefono[] = $datos[$i]["baseMejorTelefono"];
                                            $an[] = $datos[$i]["AN"];
                                            $caracteristicas[] = $datos[$i]["Caracteristicas"];
                                            $comentarios[] = $datos[$i]["Comentarios"];

                                                     
                                            echo "<tr>";//tr dinamico
                                                echo "<td>".$numeroCliente[$i]."</td>".
                                                     "<td>".$nombrecliente[$i]."</td>".
                                                     "<td>".$password[$i]."</td>".
                                                     "<td>".$ambiente_descripcion[$i]."</td>".
                                                     "<td>".$cobertura_descripcion[$i]."</td>".
                                                     "<td>".$tipo_persona_descripcion[$i]."</td>".
                                                     "<td>".$equipo_descripcion[$i]."</td>".

                                                     "<td>".$token_type_descripcion[$i]."</td>".
                                                     "<td>".$numero_serie[$i]."</td>".
                                                     "<td>".$celular_certificado[$i]."</td>".
                                                     "<td>".$existe_token[$i]."</td>".
                                                     "<td>".$base_mejor_telefono[$i]."</td>".
                                                     "<td>".$an[$i]."</td>".
                                                     "<td>".$caracteristicas[$i]."</td>".
                                                     "<td>".$comentarios[$i]."</td>".
                                                     "<td><button onclick=\"eliminarCliente(".$i.")\" id=\"btnEliminar".$i."\" style=\"visibility:hidden\">Eliminar</button></td>";
                                            echo "</tr>"; //tr dinamico                                                                                   
                                        }
                                echo "</tbody>";//cuerpo                                  
                            echo "</table>";//tabla       
                        echo "</div>";
                    echo "</div>";
                }
                else
                    {
                        echo "<script>".$datos."</script>";
                    }
        }
        catch(Exception $ex)
            {                
                   echo "<script>"."alert('Ha ocurrido un problema con el portal, favor de contactar al administrador.\n
                   Error Message: ".$ex."');"."</script>";
            }                   
  ?>