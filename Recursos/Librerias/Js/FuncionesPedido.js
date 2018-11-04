$(function () {
    listaPedidos();
});
//Listar pedidos
function listaPedidos() {

    $.ajax({
        url: '../../Controlador/CtrlPedido.php',
        type: 'POST',
        dataType: 'JSON',
        data: {opcion: '3'},
    })
            .done(function (json) {
                //alert("sdsdf");
                $.each(json.datos, function (contador, fila) {
                    $('#fechaHora').html(fila.pedFechaHora);
                    $('#cliente').html(fila.perNombre + ' ' + fila.perApellido);
                    $('#producto').html(fila.proNombre);
                    $('#direccion').html(fila.perDireccion);
                    $('#valorTotal').html(fila.detValorTotal);
                    $('#numPedido').html(fila.clipeNumero);
                    $('#cbEstadoP').html(fila.pedEstado);
                    $('tbody').append($('#fila').clone(true));
                });
                $('tbody tr').first().hide();
            })
            .fail(function () {
                console.log("error");
            })
}
