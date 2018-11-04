$(function () {
    listaEmpleados();
});
// obtener idEmpleado para editarlo!
function cargarModal(idEmpleado) {
    document.getElementById("txtIdEmpleadoM").value = idEmpleado;
}
//Cargar empleado en modal
$(document).on("click", "#btnModificar", function () {
    var parametros = {
        "opcion": 4,
        "idEmpleado": $("#txtIdEmpleadoM").val()
    }
    $.ajax({
        url: '../../Controlador/CtrlEmpleado.php', //consultar
        type: 'POST',
        dataType: 'JSON',
        data: parametros,
        success: function(json){
            var datos = json.datos;
                console.log(json.datos);
                document.getElementById("txtIdentificacionM").value = datos.perIdentificacion;
                document.getElementById('txtNombreM').value = datos.perNombre;
                document.getElementById('txtApellidoM').value = datos.perApellido;
                document.getElementById('txtTelefonoM').value = datos.perTelefono;
                document.getElementById('txtDireccionM').value = datos.perDireccion;
                document.getElementById('txtCorreoM').value = datos.perCorreo;
                document.getElementById('cbCargoM').value = datos.empCargo;
                document.getElementById('cbEstadoM').value = datos.empEstado;
        },
        error: function(x){
            alert (x.response);
        }
    });
})
//Actualizar empleado en modal
$(document).on("click", "#btnActualizarM", function () {
    $.ajax({
        url: '../../Controlador/CtrlEmpleado.php',
        type: 'POST',
        dataType: 'JSON',
        data: $('#formularioEmpleado').serialize(),
        success: function(json){
            var datos = json.datos;
                console.log(json.datos);
                document.getElementById("txtIdentificacionM").value = datos.perIdentificacion;
                document.getElementById('txtNombreM').value = datos.perNombre;
                document.getElementById('txtApellidoM').value = datos.perApellido;
                document.getElementById('txtTelefonoM').value = datos.perTelefono;
                document.getElementById('txtDireccionM').value = datos.perDireccion;
                document.getElementById('txtCorreoM').value = datos.perCorreo;
                document.getElementById('cbCargoM').value = datos.empCargo;
                document.getElementById('cbEstadoM').value = datos.empEstado;
                alert("Empleado actualizado");
                listaEmpleados();
        },
        error: function(x){
            alert (x.response);
        }
    });
})
//Eliminar empleado en modal
$(document).on("click", "#btnEliminarM", function () {
    var parametros = {
        "opcion": 6,
        "idEmpleado": $("#txtIdEmpleadoM").val()
    }
    $.ajax({
        url: '../../Controlador/CtrlEmpleado.php',
        type: 'POST',
        dataType: 'JSON',
        data: parametros,
        success: function(json){
            var estado=json.datos.empEstado;
            document.getElementById('cbEstadoM').value = estado;
            alert("Empleado eliminado");
            listaEmpleados();
        },
        error: function(x){
            alert (x.response);
        }
    });
})

//Listar empleados
function listaEmpleados() {
    $.ajax({
        url: '../../Controlador/CtrlEmpleado.php',
        type: 'POST',
        dataType: 'JSON',
        data: {opcion: '2'},
    })
            .done(function (json) {
                var tabla;
                tabla = '<table class="table-striped table-bordered display compact" id="listadoE" style="width=100%">';
                tabla += '<thead style="background: #003666; color:white">';
                tabla += '<tr>';
                tabla += '<th scope="col">Identificación</th>';
                tabla += '<th scope="col">Nombres</th>';
                tabla += '<th scope="col">Apellidos</th>';
                tabla += '<th scope="col">Telefono</th>';
                tabla += '<th scope="col">Dirección</th>';
                tabla += '<th scope="col">Correo</th>';
                tabla += '<th scope="col">Cargo</th>';
                tabla += '<th scope="col">Estado</th>';
                tabla += '<th scope="col">Opciones</th>';
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
                    tabla += '<td scope="row">' + fila.empCargo + '</td>';
                    tabla += '<td scope="row">' + fila.empEstado + '</td>';
                    tabla += '<td scope="row"><a class="btn  btn-md btn-info" onclick="cargarModal(' + fila.idEmpleado + ')" data-toggle="modal" data-target="#modalEditarEmpleado" id="btnModificar"><i class="far fa-edit"> </i></a>';
                    tabla += '&nbsp <a class="btn  btn-md btn-danger" onclick="cargarModal(' + fila.idEmpleado + ')" data-toggle="modal" data-target="#modalEliminar" id="btnEliminarM"> <i class="fas fa-minus-circle"></i></a></td>';
                    tabla += '</tr>';
                })
                tabla += '</tbody>';
                tabla += '</table>';
                $('#tblEmpleados').html(tabla);
                $('#listadoE').DataTable({
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