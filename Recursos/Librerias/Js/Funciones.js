
$(function () {
    /**
     * Función que verifica si la identificación del cliente
     * ya está registrada en bd.
     */
    $("#txtIdentificacion").change(function () {
        var parametros = {
            "opcion": 2,
            "identificacion": $("#txtIdentificacion").val()
        };
        $.ajax({
            url: '../../Controlador/CtrlCliente.php',
            data: parametros,
            type: 'post',
            success: function (response) {
                $("#mensaje").html(response);
            }
        });
    });
    /**
     * Función que verifica si el correo del cliente
     * ya está registrado en bd.
     */
    $("#txtCorreo").change(function () {

        var parametros = {
            "opcion": 3,
            "correo": $("#txtCorreo").val()
        };
        $.ajax({
            url: '../../Controlador/CtrlCliente.php',
            data: parametros,
            type: 'post',
            success: function (response) {
                $("#mensajeCorreo").html(response);
            }
        });
    });
    /**
     * Función que verifica si el usuario del cliente
     * ya está registrado en bd.
     */
    $("#txtUsuario").change(function () {

        var parametros = {
            "opcion": 8,
            "usuario": $("#txtUsuario").val()
        };
        $.ajax({
            url: '../../Controlador/CtrlCliente.php',
            data: parametros,
            type: 'post',
            success: function (response) {
                $("#mensajeUsuario").html(response);
            }
        });
    });
});







