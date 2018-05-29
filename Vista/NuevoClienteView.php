<?php

if(!isset($rol))
{
}
?>



<a href="../Controlador/ListaClientesGetList.php" >Regresar</a> 
</br>
<?php
    require_once("../Vista/NuevoClienteValidation.php");
?>
<form id="frmRegistroNuevo" action="" method="POST" enctype="multipart/form-data">
	<div class="row">
		<label for="numCliente">* Número del cliente: </label><br />
		<input id="numCliente" class="input" name="numCliente" type="text" value="" size="30"><span id="usernameError" style="color:red"></span><br />
	</div>
	<div class="row">
		<label for="nomCliente">* Nombre del cliente:</label><br />
		<input id="nomCliente" class="input" name="nomCliente" type="text" value="" size="30" /><br />
	</div>
    <div class="row">
		<label for="pass">* Password:</label><br />
		<input id="pass" class="input" name="pass" type="text" value="" size="30" /><br />
	</div>
    <div class="row">
		<label for="ambiente">* Ambiente:</label><br />
        <?php        
		    echo "<select id='ambiente' name='ambiente' onchange=''>";
                echo "<option value='0'> SELECCIONA OPCIÓN </option>";
                    while ($contA > 0) {
                        $contA--;
                        echo '<option value="'.$ambiente[$contA]["ID_Ambiente"].'">'.$ambiente[$contA]["Descripcion"].'</option>';
                    }
            echo "</select>";
        ?>
        <br />
	</div>
    <div class="row">
		<label for="cobertura">* Cobertura:</label><br />
        <?php
        
		    echo "<select id='cobertura' name='cobertura' onchange=''>";
                echo "<option value='0'> SELECCIONA OPCIÓN </option>";
                    while ($contC > 0) {
                        $contC--;
                        echo '<option value="'.$cobertura[$contC]["ID_Cobertura"].'">'.$cobertura[$contC]["Descripcion"].'</option>';
                    }
            echo "</select>";
        ?>
        <br />
	</div>
    <div class="row">
		<label for="T_persona">* Tipo de persona:</label><br />
        <?php
        
		    echo "<select id='T_persona' name='T_persona' onchange=''>";
                echo "<option value='0'> SELECCIONA OPCIÓN </option>";
                    while ($contP > 0) {
                        $contP--;
                        echo '<option value="'.$tipo_persona[$contP]["ID_Tipo_Persona"].'">'.$tipo_persona[$contP]["Descripcion"].'</option>';
                    }
            echo "</select>";
        ?>
        <br />
	</div>
    <div class="row">
		<label for="equipo">* Equipo:</label><br />
        <?php
        
		    echo "<select id='equipo' name='equipo' onchange=''>";
                echo "<option value='0'> SELECCIONA OPCIÓN </option>";
                    while ($contE > 0) {
                        $contE--;
                        echo '<option value="'.$equipo[$contE]["ID_Equipo"].'">'.$equipo[$contE]["Nombre_Equipo"].'</option>';
                    }
            echo "</select>";
        ?>
        <br />
	</div>
    <div class="row">
		<label for="token">* Tipo de token:</label><br />
        <?php
        
		    echo "<select id='token' name='token' onchange=''>";
                echo "<option value='0'> SELECCIONA OPCIÓN </option>";
                    while ($contT > 0) {
                        $contT--;
                        echo '<option value="'.$toke_type[$contT]["ID_Token_Type"].'">'.$toke_type[$contT]["Descripcion"].'</option>';
                    }
            echo "</select>";
        ?>
        <br />
	</div>
<div class="row">
		<label for="serie">Número de serie:</label><br />        
		<input id="serie" class="input" name="serie" type="text" value="" size="30" /><br />
	
        <br />
	</div>
    <div class="row">
		<label for="cCertificado">Célular certificado :</label><br />        
		<input id="cCertificado" class="input" name="cCertificado" type="text" value="" size="30" /><br />	
        <br />
	</div>
    <label for="existeToken">* Existe token:</label><br /> 
    <?php
    
    echo "<select id='existeToken' name='existeToken' onchange=''>";
        echo "<option value='100'>SELECCIONE OPCIÓN</option>";
        echo "<option value='1'>SI</option>";
        echo "<option value='0'>NO</option>";
    echo "</select>";
    ?>

    <div class="row">
		<label for="bTelefono">Base mejor teléfono:</label><br />        
		<input id="bTelefono" class="input" name="bTelefono" type="text" value="" size="30" /><br />
	
        <br />
	</div>
    <div class="row">
		<label for="an">A & N:</label><br />        
		<input id="an" class="input" name="an" type="text" value="" size="30" /><br />
	
        <br />
	</div>
    <div class="row">
		<label for="car">Caracteristicas:</label><br />        
		<input id="car" class="input" name="car" type="text" value="" size="30" /><br />
	
        <br />
	</div>
    <div class="row">
		<label for="com">Comentarios:</label><br />        
		<input id="com" class="input" name="com" type="text" value="" size="30" /><br />
	
        <br />
	</div>

    <div class="row">

    </div>	
	<input id="submit_button" type="submit" onclick="insertar();" value="Guardar" />
</form>		