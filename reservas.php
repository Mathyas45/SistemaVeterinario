<?php
include('app/config.php');
include('layout/parte1.php');
?>

<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js'></script>

<script>
    var a;
    //inicar_sesion para  recien poder reservar
    var email_sesion = '<?php echo $email_sesion; ?>';


    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            locale: 'es',
            editable: true,
            selectable: true,
            allDaySlot: false,

            events: 'app/controlador/reservas/cargar_reservas.php',


            dateClick: function(info) {
                a = info.dateStr;
                const fechaComoCadena = a;
                var numeroDia = new Date(fechaComoCadena).getDay();
                var dias = ['LUNES', 'MARTES', 'MIERCOLES', 'JUEVES', 'VIERNES', 'SABADO']

                //verifica si existe sesión
                if (email_sesion == "") {
                    $('#modal_sesion').modal("show");
                } else {
                    if (numeroDia == "6") {
                        alert("No se puede reservar los domingos");
                    } else {

                        //rescatamos la fecha de hoy para no reservar en fechas pasadas
                        var anio = new Date().getFullYear();
                        var mes = ("0" + ((new Date()).getMonth() + 1));
                        var dia = ("0" + (new Date()).getDate()).slice(-2);



                        var fecha_hoy = anio + "-" + mes + "-" + dia;


                        // comparar fecha de hoy con le fecha seleccionada
                        if (fecha_hoy <= a) {
                            // alert("todo bien")
                            $('#modal_reservas').modal("show");
                            $('#dia_de_la_semana').html(dias[numeroDia] + " " + a)

                            //mandar los datos con ajax para que verifique la hora

                            var fecha = info.dateStr;
                            var res = "";
                            var url = "app/controlador/reservas/verificarHorarioControlador.php";
                            //mandar a la ruta con ajax con get
                            $.get(url, {
                                fecha: fecha
                            }, function(datos) {
                                //viene del cotrolador la variable res que es la dato
                                res = datos;
                                $('#respuesta_horario').html(res);
                            })
                        } else {
                            alert("No se puede reservar en fechas pasadas");

                        }


                    }

                }

            },
        });


        calendar.render();
    });
</script>

<section class="our-services">
    <div class="container">
        <div class="row"></div>
        <div class="col-md-12 mb-5 mt-5">
            <center>
                <h1>Reservar <span class="text-primary">Cita</span></h1>
            </center>
        </div>


        <div class="row">
            <div id='calendar'></div>
        </div>

    </div>
    <br>
</section>








<?php

include('layout/parte2.php');

?>



<!-- Modal eleecion de horas-->
<div class="modal fade" id="modal_reservas" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Reservar cita para el día <span id="dia_de_la_semana"></span> </h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div id="respuesta_horario"></div>
                    <div class="col-md-6">
                        <center><b>Turno Mañana</b></center>
                        <br>
                        <button id="btn_h1" class="btn btn-success btn-block mb-3" type="button" style="width: 100%;" data-bs-dismiss="modal">08:00 - 09:00</button>
                        <button id="btn_h2" class="btn btn-success mb-3" style="width: 100%;" type="button" data-bs-dismiss="modal">09:00 - 10:00</button>
                        <button id="btn_h3" class="btn btn-success mb-3" style="width: 100%;" type="button" data-bs-dismiss="modal">10:00 - 11:00</button>
                        <button id="btn_h4" class="btn btn-success mb-3" style="width: 100%;" type="button" data-bs-dismiss="modal">11:00 - 12:00</button>
                    </div>
                    <div class="col-md-6">
                        <center><b>Turno tarde</b></center>
                        <br>
                        <div class="d-grip gap-2 ">
                            <button id="btn_h5" class="btn btn-success mb-3" style="width: 100%;" type="button" data-bs-dismiss="modal">12:00 - 13:00</button>
                            <button id="btn_h6" class="btn btn-success mb-3" style="width: 100%;" type="button" data-bs-dismiss="modal">14:00 - 15:00</button>
                            <button id="btn_h7" class="btn btn-success mb-3" style="width: 100%;" type="button" data-bs-dismiss="modal">15:00 - 16:00</button>
                            <button id="btn_h8" class="btn btn-success mb-3" style="width: 100%;" type="button" data-bs-dismiss="modal">16:00 - 17:00</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="" class="btn btn-primary">Escoger otra fecha</a>
            </div>
        </div>
    </div>
</div>
<!-- Modal2 formulario para las citas -->
<div class="modal fade" id="modal_formulario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Reservar cita para el día <span id="dia_de_la_semana"></span> </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="frmcita" method="POST" action="<?php echo $URL; ?>/app/controlador/reservas/reservasControlador.php">

                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-5">
                            <label for="">Nombre del paciente</label>
                            <input type="text" class="form-control" name="nombre_mascota">
                            <input type="text" name="id_usuario" class="form-control" value="<?= $id_usuario_sesion ?>" hidden>
                            <br>

                        </div>

                        <div class="col-md-7">
                            <label for="">Seleccionar Tipo de tratamiento</label>
                            <select name="tipo_servicio" id="" class="form-control">
                                <option value="Curación">Curación</option>
                                <option value="extracción">extracción</option>
                                <option value="brackets">brackets</option>
                                <option value="implentes">implentes</option>
                                <option value="revisión general">revisión general</option>
                            </select>
                            <br>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Fecha de reserva</label>
                            <input type="text" class="form-control" id="fecha_reserva" disabled>
                            <input type="text" name="fecha_cita" class="form-control" id="fecha_reserva2" hidden>

                        </div>
                        <div class="col-md-6">
                            <label for="">Hora de reserva</label>
                            <input type="text" class="form-control" id="hora_reserva" disabled>
                            <input type="text" name="hora_cita" class="form-control" id="hora_reserva2" hidden>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Registrar Cita</button>
                </div>
            </form>

        </div>
    </div>

</div>


<!-- Modal2 para comprobar que tiene una sesion -->
<div class="modal fade" id="modal_sesion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Necesita Iniciar sesion para reservar <span id="dia_de_la_semana"></span> </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="d-grid gap-2">
                    <a href="<?= $URL ?>/login" class="btn btn-primary" type="button">Iniciar Sesión</a>
                    <a href="<?= $URL ?>/login/registro.php" class="btn btn-primary" type="button">Registrarse</a>
                </div>
            </div>
        </div>

    </div>
</div>


<script>
    //btn1
    $('#btn_h1').click(function() {
        $('#modal_formulario').modal("show");
        $('#fecha_reserva').val(a);
        $('#fecha_reserva2').val(a);
        var h1 = "08:00 - 09:00";
        $('#hora_reserva').val(h1);
        $('#hora_reserva2').val(h1);
    });
    //btn2
    $('#btn_h2').click(function() {
        $('#modal_formulario').modal("show");
        $('#fecha_reserva').val(a);
        var h2 = "09:00 - 10:00";
        $('#hora_reserva').val(h2);
        $('#hora_reserva2').val(h2);
    });
    //btn3
    $('#btn_h3').click(function() {
        $('#modal_formulario').modal("show");
        $('#fecha_reserva').val(a);
        $('#fecha_reserva2').val(a);
        var h3 = "10:00 - 11:00";
        $('#hora_reserva').val(h3);
        $('#hora_reserva2').val(h3);
    });
    //btn4
    $('#btn_h4').click(function() {
        $('#modal_formulario').modal("show");
        $('#fecha_reserva').val(a);
        $('#fecha_reserva2').val(a);
        var h4 = "11:00 - 12:00";
        $('#hora_reserva').val(h4);
        $('#hora_reserva').val(h4);
        $('#hora_reserva2').val(h4);
    });
    //btn5
    $('#btn_h5').click(function() {
        $('#modal_formulario').modal("show");
        $('#fecha_reserva').val(a);
        $('#fecha_reserva2').val(a);
        var h5 = "12:00 - 13:00";
        $('#hora_reserva').val(h5);
        $('#hora_reserva2').val(h5);
    });
    //btn6
    $('#btn_h6').click(function() {
        $('#modal_formulario').modal("show");
        $('#fecha_reserva').val(a);
        $('#fecha_reserva2').val(a);
        var h6 = "14:00 - 15:00";
        $('#hora_reserva').val(h6);
        $('#hora_reserva2').val(h6);
    });
    //btn7
    $('#btn_h7').click(function() {
        $('#modal_formulario').modal("show");
        $('#fecha_reserva').val(a);
        $('#fecha_reserva2').val(a);
        var h7 = "15:00 - 16:00";
        $('#hora_reserva').val(h7);
        $('#hora_reserva2').val(h7);
    });
    //btn8
    $('#btn_h8').click(function() {
        $('#modal_formulario').modal("show");
        $('#fecha_reserva').val(a);
        $('#fecha_reserva2').val(a);
        var h8 = "16:00 - 17:00";
        $('#hora_reserva').val(h8);
        $('#hora_reserva2').val(h8);
    });
</script>
<?php
include('admin/layout/mensaje.php'); ?>