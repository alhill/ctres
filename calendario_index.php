<?php
include 'config.php';
include 'funciones.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
        <meta charset="utf-8">
        <title>Calendario</title>
        <link rel="stylesheet" href="css/reset.css" type="text/css" />
        <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/calendar.css">
        <link rel="stylesheet" href="css/estilo.css">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
        <script type="text/javascript" src="js/es-ES.js"></script>
        <script src="js/jquery.min.js"></script>
        <script src="js/moment.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/bootstrap-datetimepicker.js"></script>
        <link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css" />
       <script src="js/bootstrap-datetimepicker.es.js"></script>
</head>

<body style="background: white;">
    
    <?php
    if (session_status() == PHP_SESSION_NONE) {session_start();}
    if (isset($_SESSION['privilegios']) && $_SESSION['privilegios']>0){
        include 'header.php';
    }
    else{
        header ('Location: pagina_login.php');
    }
    
    ?>

        <div class="container">

                <div class="row">
                        <div class="page-header"><h2></h2></div>
                                <div class="pull-left form-inline"><br>
                                        <div class="btn-group">
                                            <button class="btn btn-primary" data-calendar-nav="prev"><< Anterior</button>
                                            <button class="btn" data-calendar-nav="today">Hoy</button>
                                            <button class="btn btn-primary" data-calendar-nav="next">Siguiente >></button>
                                        </div>
                                        <div class="btn-group">
                                            <button class="btn btn-warning" data-calendar-view="year">Año</button>
                                            <button class="btn btn-warning active" data-calendar-view="month">Mes</button>
                                            <button class="btn btn-warning" data-calendar-view="week">Semana</button>
                                            <button class="btn btn-warning" data-calendar-view="day">Dia</button>
                                        </div>

                                </div>
                                    <div class="pull-right form-inline"><br>
                                        <button class="btn btn-info" data-toggle='modal' data-target='#add_evento'>Añadir Reserva</button>
                                    </div>

                                


                </div><hr>

    <!-- Aqui se mostrara nuestro calendario -->
                <div class="row">
                        <div id="calendar"></div> 
                        <br><br>
                </div>
    <!--Boton para cerrar sesion de usuario-->
                <div class="pull-right form-inline"><br>
                    <form action="logout.php" method="POST">
                        <button class="btn btn-info">Cerrar sesión</button>
                    </form>
                </div>
               
    <script src="js/underscore-min.js"></script>
    <script src="js/calendar.js"></script>
    <script type="text/javascript">
        (function($){
                //creamos la fecha actual
                var date = new Date();
                var yyyy = date.getFullYear().toString();
                var mm = (date.getMonth()+1).toString().length == 1 ? "0"+(date.getMonth()+1).toString() : (date.getMonth()+1).toString();
                var dd  = (date.getDate()).toString().length == 1 ? "0"+(date.getDate()).toString() : (date.getDate()).toString();

                //establecemos los valores del calendario
                var options = {

                    // definimos que los eventos se mostraran en ventana modal
                        modal: '#events-modal', 

                        // dentro de un iframe
                        modal_type:'iframe',    

                        //obtenemos los eventos de la base de datos
                        events_source: 'obtener_eventos.php', 

                        // mostramos el calendario en el mes
                        view: 'month',             

                        // y dia actual
                        day: yyyy+"-"+mm+"-"+dd,   


                        // definimos el idioma por defecto
                        language: 'es-ES', 

                        //Template de nuestro calendario
                        tmpl_path: 'tmpls/', 
                        tmpl_cache: false,


                        // Hora de inicio
                        time_start: '09:00', 

                        // y Hora final de cada dia
                        time_end: '20:00',   

                        // intervalo de tiempo entre las hora, en este caso son 30 minutos
                        time_split: '30',    

                        // Definimos un ancho del 100% a nuestro calendario
                        width: '100%', 

                        onAfterEventsLoad: function(events)
                        {
                                if(!events)
                                {
                                        return;
                                }
                                var list = $('#eventlist');
                                list.html('');

                                $.each(events, function(key, val)
                                {
                                        $(document.createElement('li'))
                                                .html('<a href="' + val.url + '">' + val.title + '</a>')
                                                .appendTo(list);
                                });
                        },
                        onAfterViewLoad: function(view)
                        {
                                $('.page-header h2').text(this.getTitle());
                                $('.btn-group button').removeClass('active');
                                $('button[data-calendar-view="' + view + '"]').addClass('active');
                        },
                        classes: {
                                months: {
                                        general: 'label'
                                }
                        }
                };


                // id del div donde se mostrara el calendario
                var calendar = $('#calendar').calendar(options); 

                $('.btn-group button[data-calendar-nav]').each(function()
                {
                        var $this = $(this);
                        $this.click(function()
                        {
                                calendar.navigate($this.data('calendar-nav'));
                        });
                });

                $('.btn-group button[data-calendar-view]').each(function()
                {
                        var $this = $(this);
                        $this.click(function()
                        {
                                calendar.view($this.data('calendar-view'));
                        });
                });

                $('#first_day').change(function()
                {
                        var value = $(this).val();
                        value = value.length ? parseInt(value) : null;
                        calendar.setOptions({first_day: value});
                        calendar.view();
                });
        }(jQuery));    </script>
   
</div>

</body>
</html>
