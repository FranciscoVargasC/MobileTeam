<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<script>

if(event.code == 'Enter') {
    function logout(){
       
        $.ajax({ data : $logout,
                url: '../Controlador/LogoutController.php',
                type: 'post',
                }).done(function(msg){
                    if(Object.keys(msg).length != 0){
                            alert(msg);
                    }     
                    location.reload();   
                })          
    }
   else if(event.code == 'KeyC' && (event.ctrlKey || event.metaKey)){
                location.reload();  
    }
}
</script>