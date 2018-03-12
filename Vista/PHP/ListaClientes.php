 
    if(is_array($datos))
    {               
        echo "<div class='container'>";
            echo "<div style='overflow-x:auto;'>";
                echo "<table id='tblClientes' class='table table-striped'>";//tabla
                    echo "<thead class='thead-inverse'  style='color:white;'>";//cabecera
                        echo "<tr style='background:#6e0f1b;'>";//tr head
                            echo "<td>Número de cliente</td>";
                        echo "</tr>";//tr head
                    echo "</thead>"; //cabecera
                
                    echo "<tbody>";//cuerpo
                        for($i = 0;$i<count($datos);$i++)
                        {   
                            echo "<tr>";//tr dinamico
                                echo "<td>".$datos[$i]["NUMERO_CLIENTE"]."</td>";
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
