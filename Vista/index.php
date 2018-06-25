<?php
    require_once("../Vista/loginValidation.php");
?>

<html>
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf8" />
 <title>Mobile QA</title>
</head>
<body>
 <form method="post" action="../Controlador/InicioSession.php" autocomplete="off">
  Usuario: <input type="text" name="nombUsuario" id="usuario" title="Ingresa tu usuario" required>
  Contraseña: <input type="password" name="pass" id="password" title="Ingresa tu contraseña" required>  
  <input type="submit" onclick = "validation_login()" value="Ingresar">
 </form>
</body>
</html>