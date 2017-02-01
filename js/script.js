function modalBorr(usuario){
    $(document).ready(function(){
        $(".nombredeusuario").html(usuario);
        $("#borrar").modal();
        
        $("#aceptaborrar").click(function(){
            window.location.href = 'borrar.php?' + usuario; 
        });
        $("#cancelaborrar").click(function(){
            $("#borrar").modal('hide');
        });

    });
}

function modalModif(usuario){
    $(document).ready(function(){
        $(".nombredeusuario").html(usuario);
        $("#modif").modal();
        
        $("#aceptamodif").click(function(){
            window.location.href = 'modificarusuario.php?' + usuario; 
        });
        $("#cancelamodif").click(function(){
            $("#modif").modal('hide');
        });

    });
}
