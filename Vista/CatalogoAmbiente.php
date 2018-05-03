<?php


//hola


if(!isset($datos))
{
    ?>    
   <script>
    window.location='../Vista/Error.php';
  </script>
    <?php
}else{

require_once("../Controlador/CatalogosController.php");


if(is_array($datos))
    {
        $ID_Ambiente = array();
        $Descripcion = array();
    }



    echo "<div>";
        echo "<div>";
            echo "<table id='Cat_Ambiente' onload=\"evalRol()\" >";




    for($i = 0;$i<count($datos);$i++)
        {
            $id_Ambiente[] = $datos[$i]["ID_Ambiente"];
            $Descripcion[] = $datos[$i]["Descripcion"];
        }

        
        
        echo "<tr>";
        $cont = count($listaComboAmbiente);
        echo "<td>Nuevo</td>";
        echo "<td>";
        echo "<INPUT TYPE='Text' VALUE='".$Descripcion[$i]."' id='Descripcion".$i."'disabled>";
        echo "<select id='id_Ambiente".$i."' name='id_Ambiente' onchange='onChange(this,".$i.")'>";
            echo "<option value='0'> SELECCIONA OPCIÓN </option>";
        while ($cont > 0) {
            $cont--;
            echo '<option value="'.$listaComboAmbiente[$cont]["id_Ambiente"].'">'.$listaComboAmbiente[$cont]["Descripcion"].'</option>';
        }
        echo "</select>";
        echo "</td>";


        
        echo "<tr>";
        $cont1 = count($listaComboAmbiente);
        echo "<td>Editar</td>";
        echo "<td>";
        echo "<INPUT TYPE='Text' VALUE='".$Descripcion[$i]."' id='Descripcion".$i."'disabled>";
        echo "<select id='id_Ambiente".$i."' name='id_Ambiente' onchange='onChange(this,".$i.")'>";
            echo "<option value='0'> SELECCIONA OPCIÓN </option>";
        while ($cont1 > 0) {
            $cont--;
            echo '<option value="'.$listaComboAmbiente[$cont1]["id_Ambiente"].'">'.$listaComboAmbiente[$cont1]["Descripcion"].'</option>';
        }
        echo "</select>";
        echo "</td>";

        echo "<td>";
        echo "<td> <input type='submit' name='Submit' value='Modificar'/></td> \n";

        echo "</div>";
echo "</div>";
    }
?>
