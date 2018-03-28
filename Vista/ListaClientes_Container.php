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
                    $quip = array();

                    
                    
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
                                             "<td>BASE MEJOR TELÉFONO</td>".
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
                                            $quip[] = $equipo[$i]["Nombre_Equipo"]; 
                                            
                                            echo "<tr>";//tr dinamico
                                                echo "<td>".$numeroCliente[$i]."</td>";
                                                echo "<td>".$nombrecliente[$i]."</td>";
                                                echo "<td><input type='text' value='".$password[$i]."' id='password".$i."' onkeydown=\"search(this, ".$i.",'Password')\" ondblclick=\"editarCliente(".$i.", this)\" readonly></td>";
                                                echo "<td>".$ambiente_descripcion[$i]."</td>";
                                                echo "<td>".$cobertura_descripcion[$i]."</td>";
                                                echo "<td>".$tipo_persona_descripcion[$i]."</td>";
                                                $cont = count($listaComboEquipo);
                                                echo "<td>";
                                                echo "<INPUT TYPE='Text' VALUE='".$equipo_descripcion[$i]."' id='equipo_descripcion".$i."'disabled>";
                                                echo "<select id='ID_Equipo".$i."' name='ID_Equipo' onchange='onChange(this,".$i.")'>";
                                                    echo "<option value='0'> SELECCIONA OPCIÓN </option>";
                                                 while ($cont > 0) {
                                                    $cont--;
                                                    echo '<option value="'.$listaComboEquipo[$cont]["ID_Equipo"].'">'.$listaComboEquipo[$cont]["Nombre_Equipo"].'</option>';
                                                }
                                                echo "</select>";
                                                echo "</td>";
                                                $cont1 = count($listaComboToken);
                       
                                                echo "<td>";
                                                echo "<INPUT TYPE='Text' VALUE='".$token_type_descripcion[$i]."' id='token_type_descripcion".$i."' disabled>";
                                                echo "<select id='ID_Token_Type".$i."' name='ID_Token_Type' onchange='onChange(this,".$i.")'>";
                                                    echo "<option value='0'> SELECCIONA OPCIÓN </option>";
                                                while ($cont1 > 0) {
                                                    $cont1--;
                                                    echo '<option value="'.$listaComboToken[$cont1]["ID_Token_Type"].'">'.$listaComboToken[$cont1]["Descripcion"].'</option>';
                                                }
                                                echo "</select>";
                                                echo "</td>";
                                    
                                                
                                                     
                                                echo "<td>".$numero_serie[$i]."</td>";
                                                echo "<td><INPUT TYPE='Text' VALUE='".$celular_certificado[$i]."' id='celular_certificado".$i."' onkeydown=\"search(this,".$i.", 'CelularCertificado')\" ondblclick=\"editarCliente(".$i.",  this, 'CelularCertificado')\" readonly></td>";
                                                echo "<td><INPUT TYPE='Text' VALUE='".$existe_token[$i]."' id='existe_token".$i."' onkeydown=\"search(this,".$i.", 'existeToken')\" ondblclick=\"editarCliente(".$i.",  this)\" readonly></td>";
                                                echo "<td><INPUT TYPE='Text' VALUE='".$base_mejor_telefono[$i]."' id='base_mejor_telefono".$i."' onkeydown=\"search(this,".$i.", 'baseMejorTelefono')\" ondblclick=\"editarCliente(".$i.",  this)\" readonly></td>";
                                                echo "<td><INPUT TYPE='Text' VALUE='".$an[$i]."' id='an".$i."' onkeydown=\"search(this,".$i.", 'AN')\" ondblclick=\"editarCliente(".$i.",  this)\" readonly></td>";
                                                echo "<td><INPUT TYPE='Text' VALUE='".$caracteristicas[$i]."' id='caracteristicas".$i."' onkeydown=\"search(this,".$i.", 'Caracteristicas')\" ondblclick=\"editarCliente(".$i.",  this)\" readonly></td>";
                                                echo "<td><INPUT TYPE='Text' VALUE='".$comentarios[$i]."' id='comentarios".$i."' onkeydown=\"search(this,".$i.", 'Comentarios')\" ondblclick=\"editarCliente(".$i.",  this)\" readonly></td>";                                                    
                                                echo "<td><button onclick=\"eliminarCliente(".$i.")\" id=\"btnEliminar".$i."\" style=\"visibility:hidden\">Eliminar</button></td>";
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