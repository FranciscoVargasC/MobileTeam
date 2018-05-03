<?php

if(!isset($rol))
{
    ?>
    <script>
    window.location='../Vista/Error.php';
   </script>
   <?php
}
?>


<?php  


         try{
         
                    $UserName = array();                    
                    $nombreCompleto = array();                      
                    $id_rol = array();
                    $categoria = array();
                    $id_equipo = array();                    
                    $nombre_equipo = array();
                    $lead = array();
                                       
                    
                    echo "<div>";
                        echo "<div>";
                            echo "<table id='tblUser' onload=\"evalRol()\" >";//tabla
                                echo "<thead>";//cabecera
                                    echo "<tr style='background:#5FABC0;'>";//tr head
                                        echo "<td>Nombre de usuario</td>".
                                             "<td>Nombre completo</td>".
                                             "<td>Rol</td>".
                                             "<td>Nombre equipo</td>";
                                    echo "</tr>";//tr head
                                echo "</thead>"; //cabecera
                
                                echo "<tbody>";//cuerpo
                                    for($i = 0;$i<count($datos);$i++)
                                        {   
                                            $UserName[] = $datos[$i]["UserName"];
                                            $nombreCompleto[] = $datos[$i]["NombreCompleto"];
                                            $id_rol[] = $datos[$i]["ID_Rol"];                     
                                            $categoria[] = $datos[$i]["Categoria"];
                                            $id_equipo[] = $datos[$i]["ID_Equipo"];
                                            $nombre_equipo[] = $datos[$i]["Nombre_Equipo"];                    
                                            $lead[] = $datos[$i]["lead"];
                                           
                                            echo "<tr>";//tr dinamico
                                                echo "<td>".$UserName[$i]."</td>";
                                                echo "<td>".$nombreCompleto[$i]."</td>";
                                                $contRol = count($listaComboRol);
                                                echo "<td>";
                                                echo "<INPUT TYPE='Text' VALUE='".$categoria[$i]."' id='categoria".$i."' disabled>";                                                    
                                                echo "<select id='ID_Rol".$i."' name='ID_Rol' onchange='onChange(this,".$i.")'>";
                                                    echo "<option value='0'> SELECCIONA OPCIÓN </option>";                                                    
                                                while ($contRol > 0) {
                                                    $contRol--;                                                                                                      
                                                    echo '<option value="'.$listaComboRol[$contRol]["ID_Rol"].'">'.$listaComboRol[$contRol]["Categoria"].'</option>';
                                                }
                                                echo "</select>";
                                                echo "</td>";
                                                $contEQ = count($listaComboEQ);
                                                echo "<td>";
                                                echo "<INPUT TYPE='Text' VALUE='".$nombre_equipo[$i]."' id='nombre_equipo".$i."' disabled>";
                                                echo "<select id='ID_Equipo".$i."' name='ID_Equipo' onchange='onChange(this,".$i.")'>";
                                                echo "<option value='0'> SELECCIONA OPCIÓN </option>";                                                    
                                                while ($contEQ > 0) {
                                                    $contEQ--;                                                                                                      
                                                    echo '<option value="'.$listaComboEQ[$contEQ]["ID_Equipo"].'">'.$listaComboEQ[$contEQ]["Nombre_Equipo"].'</option>';
                                                }
                                                echo "</td>";
                                                echo "<td><button onclick=\"eliminarCliente(".$i.")\" id=\"btnEliminar".$i."\">Eliminar</button></td>";
                                              
                                            echo "</tr>"; //tr dinamico                                                                                   
                                        }                                                                                         
                                echo "</tbody>";//cuerpo                                  
                            echo "</table>";//tabla       
                        echo "</div>";
                    echo "</div>";

                    ?>
                    <br>
                    <div style='visibility:hidden' id='addNew'>
                    <div>* Username: <INPUT TYPE='Text' id='userNew'> </div>
                    <div>* Password: <INPUT TYPE='Text' id='passNew'> </div>
                    <div>* Nombre: <INPUT TYPE='Text' id='name'> </div>
                    <div>* Apellido Paterno: <INPUT TYPE='Text' id='ap'> </div>
                    <div>Apellido Materno: <INPUT TYPE='Text' id='am'> </div>
                    <div>* Rol: 
                        <?php
                            $contRol3 = count($listaComboRol);
                            echo "<td>";                            
                            echo "<select id='ID_RolN' name='ID_RolN'>";
                            echo "<option value='0'> SELECCIONA OPCIÓN </option>";                                                    
                                while ($contRol3 > 0) {
                                    $contRol3--;                                                                                                      
                                    echo '<option value="'.$listaComboRol[$contRol3]["ID_Rol"].'">'.$listaComboRol[$contRol3]["Categoria"].'</option>';
                                }
                                    echo "</select>";
                                echo "</td>";
                        ?>
                    </div>

                    <div>* Equipo: 
                        <?php
                            $contRol4 = count($listaComboEQ);
                            echo "<td>";                            
                            echo "<select id='ID_EquipoN' name='ID_equipoN' >";
                            echo "<option value='0'> SELECCIONA OPCIÓN </option>";                                                    
                                while ($contRol4 > 0) {
                                    $contRol4--;                                                                                                      
                                    echo '<option value="'.$listaComboEQ[$contRol4]["ID_Equipo"].'">'.$listaComboEQ[$contRol4]["Nombre_Equipo"].'</option>';
                                }
                                    echo "</select>";
                                echo "</td>";
                        ?>
                    </div>


                    <div>* Será líder?: 
                        <?php
                         echo "<select id='lider' name='lider'>";
                         echo "<option value='100'>SELECCIONE OPCIÓN</option>";
                         echo "<option value='1'>SI</option>";
                         echo "<option value='0'>NO</option>";
                        echo "</select>";
                        ?>
                    </div>

                   
                   <br>
                    <button onclick='insertarNuevoUsuario();'>Guardar cambios</button>
                    <br>
                    <button onclick='add("hidden");'>Cancelar</button>
                    </div>
               <?php
        }
        catch(Exception $ex)
            {                
                   echo "<script>"."alert('Ha ocurrido un problema con el portal, favor de contactar al administrador.\n
                   Error Message: ".$ex."');"."</script>";
            }           
  ?>