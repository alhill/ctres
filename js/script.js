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

function modalBorrSala(sala){
    $(document).ready(function(){
        $(".nombredesala").html(sala);
        $("#borrarsala").modal();
        
        $("#aceptaborrarsala").click(function(){
            window.location.href = 'borrarsala.php?' + sala; 
        });
        $("#cancelaborrarsala").click(function(){
            $("#borrarsala").modal('hide');
        });

    });
}

function modalModifSala(sala){
    $(document).ready(function(){
        $(".nombredesala").html(sala);
        $("#modifsala").modal();
        
        $("#aceptamodifsala").click(function(){
            window.location.href = 'modificarsala.php?' + sala; 
        });
        $("#cancelamodifsala").click(function(){
            $("#modifsala").modal('hide');
        });
    });
}

function enlaceEditar(usuario){
    $(document).ready(function(){
        var link = "modificarusuario.php?" + usuario;
        window.location.href = link;
    });
}

