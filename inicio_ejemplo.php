<?php
include 'config.php';
include 'funciones.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
        <meta charset="utf-8">
        <title>Calendario</title>
        <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/calendar.css">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
        <script type="text/javascript" src="js/es-ES.js"></script>
        <script src="js/jquery.min.js"></script>
        <script src="js/moment.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/bootstrap-datetimepicker.js"></script>
        <link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css" />
       <script src="js/bootstrap-datetimepicker.es.js"></script>
    </head>

</head>
<body style="background: white;">

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

                <div class="row">
                        <div id="calendar"></div> <!-- Aqui se mostrara nuestro calendario -->
                        <br><br>
                </div>

                <!--ventana modal para el calendario-->
               <!-- <div class="modal fade" id="events-modal">
                    <div class="modal-dialog">
                            <div class="modal-content">
                                    <div class="modal-body" style="height: 400px">
                                        <p>One fine body&hellip;</p>
                                    </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                    </div><
                </div>
        </div>-->

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
        }(jQuery));
    </script>



    <!--MODAL DE RESERVA-->

<div class="modal fade" id="add_evento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Agregar reserva</h4>
      </div>
      <div class="modal-body">
        <form action="prueba.php" method="post">
                    <label for="from">Fecha inicio</label>
                    <div class='input-group date' id='from'>
                        <input type='text' id="from" name="from" class="form-control"  required /> <!--se eliminio atributo readonly en input-->
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </div>

                    <br>

                    <label for="to">Fecha final</label>
                    <div class='input-group date' id='to'>
                        <input type='text' name="to" id="to" class="form-control"  required /> <!--se eliminio atributo readonly en input-->
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </div>

                    <br>

    <script type="text/javascript">
        function showContent() {
        element = document.getElementById("content");
        checkedd = document.getElementById("checkbox1");
            if (checkedd.checked) {
            element.style.display='block';
            } else {
            element.style.display='none';
            }
        }
    </script>
<!--Funcion JavaScript para dehabilitar checkbox al seleccionar una opción-->
    <script type="text/javascript">
        function hideContent() {
        element = document.getElementById("checkbox2");
        checkedd = document.getElementById("checkbox1");
            if (checkedd.checked) {
            element.style.display='none';
            } else {
            element.style.display='block';
            }
        }
    </script>

                <label for="opciones">Seleccione una de las siguientes opciones</label> <!--antes for="tipo"-->
                    <div class="checkbox">
                       <label for="tipo"><input type="checkbox" name="opciones[]" id="checkbox1" value="sala" onchange="javascript:showContent(); hideContent()" /> Salas</label>
                    </div>
                    <div id="content" style="display: none;">
                        <select class="form-control" name="lista[]" id="tipo">
                            <option value="" selected></option>-->
                            <option value="Biblioteca">Sala Biblioteca</option>
                            <option value="formacion">Sala de formación </option>
                            <option value="informatica">Sala de informática </option>
                            <option value="actos">Sala de actos</option>                        
                        </select>
                    </div>

<!--Funcion JavaScript para dehabilitar checkbox al seleccionar una opción-->                   
    <script type="text/javascript">
        function hideContent2() {
        element = document.getElementById("checkbox1");
        checkedd = document.getElementById("checkbox2");
            if (checkedd.checked) {
            element.style.display='none';
            } else {
            element.style.display='block';
            }
        }
    </script>

<!--Funcion JavaScript para dehabilitar checkbox al seleccionar una opción-->
    <script type="text/javascript">
        function showContent2() {
        element = document.getElementById("content2");
        checkedd = document.getElementById("checkbox2");
            if (checkedd.checked) {
            element.style.display='block';
            } else {
            element.style.display='none';
            }
        }
    </script>          
                     <div class="checkbox">
                       <label for="tipo">  <input type="checkbox" name="opciones[]" id="checkbox2" value="material" onchange="javascript:showContent2(); hideContent2()" />Materiales (Presione Ctrl + click de ratón para seleccionar varias opciones) </label>
                    </div>

                    <div id="content2" style="display: none;">
                        <select multiple class="form-control" name="lista[]" id="tipo">
                            <!--<option value="">Salas</option>-->
                            <option value="proyector">Proyector</option>
                            <option value="ordenador">Ordenador</option>
                            <option value="impresora">Impresora </option>
                            <option value="pizarra">Pizarra</option>                        
                        </select>
                    </div>

                 
                   <!-- <label for="title">Título</label>  <input type="text" required autocomplete="off" name="title" class="form-control" id="title" placeholder="Introduce un título"> <br>-->

                    <label for="body">Comentarios</label>
                    <textarea id="body" name="event"  class="form-control" rows="3"></textarea>

    <script type="text/javascript">
        $(function () {
            $('#from').datetimepicker({
                language: 'es',
                minDate: new Date()
            });
            $('#to').datetimepicker({
                language: 'es',
                minDate: new Date()
            });
        });
    </script>
    </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
          <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-check"></i> Reservar</button>

    </form>
    
    </div>
  </div>
</div>
</div>

</body>
</html>
