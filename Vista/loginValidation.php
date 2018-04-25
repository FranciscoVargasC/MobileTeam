<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
    function validation_login(){
        var validar = document.getElementById("usuario");

        if(validar = "usuario")
        {
            header("Location:ListaClientesGetList.html");
        }else
        {
            alert("error");
        }
    }

function literal() { 
  var m = document.getElementById("usuario").value;
  var expreg = /^([a-z]+[a-z1-9._-]*)$/;
  
  if(expreg.test(m))
	alert("Usuario correcto"); 
  else 
    alert("Usuario mal escrito"); 
} 

function limpiaUsuario() {
    var val = document.getElementById("usuario").value;
    var tam = val.length;
    for(i = 0; i < tam; i++) {
        if(!isNaN(val[i]))
            document.getElementById("usuario").value = '';
    }
}
</script>