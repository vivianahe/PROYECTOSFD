$(function () {
    listaClientes();
});
//Cargar Datos Cliente
cargarDatos();
function cargarDatos () {
    $.ajax({
        url: '../../Controlador/CtrlCliente.php', //consultar
        type: 'POST',
        dataType: 'JSON',
        data: {'opcion': 5},
        success: function(json){

            var datos = json.datos;
          
                console.log(json.datos);
                
                document.getElementById("txtIdentificacion").value = datos.perIdentificacion;
                document.getElementById('txtNombres').value = datos.perNombre;
                document.getElementById('txtApellidos').value = datos.perApellido;
                document.getElementById('txtTelefono').value = datos.perTelefono;
                document.getElementById('txtDireccion').value = datos.perDireccion;
                document.getElementById('txtCorreo').value = datos.perCorreo;
            },
        error: function(x){
            alert (x.response);
        }
    });
}

//Actualizar perfil cliente
$(document).on("click", "#btnActualizar", function () {
    $.ajax({
        url: '../../Controlador/CtrlCliente',
        type: 'POST',
        dataType: 'JSON',
        data: $('#formularioPerfilCliente').serialize(),
        success: function(json){
            var datos = json.datos;
                console.log(json.datos);
                document.getElementById("txtIdentificacion").value = datos.perIdentificacion;
                document.getElementById('txtNombres').value = datos.perNombre;
                document.getElementById('txtApellidos').value = datos.perApellido;
                document.getElementById('txtTelefono').value = datos.perTelefono;
                document.getElementById('txtDireccion').value = datos.perDireccion;
                document.getElementById('txtCorreo').value = datos.perCorreo;
                alert("Cliente actualizado");
        },
        error: function(x){
            alert (x.response);
        }
    });
})
//Eliminar cliente
/*$(document).on("click", "#btnEliminar", function () {
    var parametros = {
        "opcion": 7,
        "idEmpleado": $("#txtIdCliente").val()
    }
    $.ajax({
        url: '../../Controlador/CtrlCliente.php',
        type: 'POST',
        dataType: 'JSON',
        data: parametros,
        success: function(json){
            var estado=json.datos.cliEstado;
            document.getElementById('cbEstadoM').value = estado;
            alert("Empleado eliminado");
        },
        error: function(x){
            alert (x.response);
        }
    });
})
*/

//Listar clientes
function listaClientes() {
    $.ajax({
        url: '../../Controlador/CtrlCliente.php',
        type: 'POST',
        dataType: 'JSON',
        data: {opcion: '4'},
    })
            .done(function (json) {
                var tabla;
                tabla = '<table class="table-striped table-bordered display compact" id="listado" style="width=100%">';
                tabla += '<thead style="background: #003666; color:white">';
                tabla += '<tr>';
                tabla += '<th scope="col">Identificación</th>';
                tabla += '<th scope="col">Nombres</th>';
                tabla += '<th scope="col">Apellidos</th>';
                tabla += '<th scope="col">Telefono</th>';
                tabla += '<th scope="col">Dirección</th>';
                tabla += '<th scope="col">Correo</th>';
                tabla += '<th scope="col">Fecha Registro</th>';
                tabla += '<th scope="col">Estado</th>';

                tabla += '</tr>';
                tabla += '</thead>';
                tabla += '<tbody>';
                $.each(json.datos, function (contador, fila) {
                    tabla += '<tr>';
                    tabla += '<td scope="row">' + fila.perIdentificacion + '</td>';
                    tabla += '<td scope="row">' + fila.perNombre + '</td>';
                    tabla += '<td scope="row">' + fila.perApellido + '</td>';
                    tabla += '<td scope="row">' + fila.perTelefono + '</td>';
                    tabla += '<td scope="row">' + fila.perDireccion + '</td>';
                    tabla += '<td scope="row">' + fila.perCorreo + '</td>';
                    tabla += '<td scope="row">' + fila.cliFechaRegistro + '</td>';
                    tabla += '<td scope="row">' + fila.cliEstado + '</td>';
//                        tabla += '<td scope="row"><a class="btn  btn-md btn-info" onclick="cargarModal(' + fila.idUsuario + ')" data-toggle="modal" data-target="#modalModificar" id="btnModificar"><i class="far fa-edit"> </i></a>';
//                        tabla += '&nbsp <a class="btn  btn-md btn-danger" onclick="eliminarModal(' + fila.idUsuario + ')" data-toggle="modal" data-target="#modalEliminar" id="btnEliminar"> <i class="fas fa-minus-circle"></i></a></td>';
                    tabla += '</tr>';
                })
                tabla += '</tbody>';
                tabla += '</table>';
                $('#tablaUsuario').html(tabla);
                $('#listado').DataTable({

                    "ordering": true,
                    "order": [[0, "asc"]],
                    "language": {
                        "url": "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json",
                    }
                });

            })

            .fail(function () {
                console.log("Error");
            })
}