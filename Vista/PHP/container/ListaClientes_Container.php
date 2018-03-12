<?php    
         try{
            if(is_array($datos))
                {
                    $cliente = array();
                    $password = array();
                    $owner = array();                      
                    $cobertura = array();
                    $ambiente = array();
                    $proyecto = array();
                    
                    echo "<div class='container'>";
                        echo "<div style='overflow-x:auto;'>";
                            echo "<table id='tblClientes' class='table table-striped'>";//tabla
                                echo "<thead class='thead-inverse'  style='color:white;'>";//cabecera
                                    echo "<tr style='background:#6e0f1b;'>";//tr head
                                        echo "<td>NÚMERO CLIENTE</td>"."<td>PASSWORD</td>"."<td>COBERTURA</td>"."<td>PROPIETARIO</td>".
                                            "<td>AMBIENTE</td>"."<td>PROYECTO</td>".
                                            "<td>SELECCIONA</td>";
                                    echo "</tr>";//tr head
                                echo "</thead>"; //cabecera
                
                                echo "<tbody>";//cuerpo
                                    for($i = 0;$i<count($datos);$i++)
                                        {   
                                            $cliente[] = $datos[$i]["NUMERO_CLIENTE"];
                                            $password[] = $datos[$i]["PASSWORD"];
                                            $owner[] = $datos[$i]["NOMBRE"];                                                   
                                            $cobertura[] = $datos[$i]["NOMBRE_COBERTURA"];
                                            $ambiente[] = $datos[$i]["AMBIENTE"];
                                            $proyecto[] = $datos[$i]["PROYECTO"];
                                            $cli = "'". $cliente[$i] . "'";
                                            $pas = "'". $password[$i] . "'";
                                                     
                                            echo "<tr>";//tr dinamico
                                                echo "<td>".$cliente[$i]."</td>".
                                                     "<td>".$password[$i]."</td>".
                                                     "<td>".$cobertura[$i]."</td>".
                                                     "<td>".$owner[$i]."</td>".
                                                     "<td>". $ambiente[$i]."</td>".
                                                     "<td>". $proyecto[$i]."</td>".
                                                     "<td><button class='btn btn-primary' onClick=\"selecciona(".$cli.",".$pas.")\" id=".$i."><span class='glyphicon glyphicon-hand-left'></span></button></td>";
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