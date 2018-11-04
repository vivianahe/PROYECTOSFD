
// obtener idCategoria para editarlo!
function cargarModalCategoria(idCategoria) {
    document.getElementById("txtIdCategoria").value = idCategoria;
}

//Cargar categoria en modal
$(document).on("click", "#btnCargarCategoria", function () {
    var parametros = {
        "opcion": 2,
        "idCategoria": $("#txtIdCategoria").val()
    }
    $.ajax({
        url: '../../Controlador/CtrlCategoria.php',
        type: 'POST',
        dataType: 'JSON',
        data: parametros,
        success: function(json){
            var datos = json.datos;
                console.log(json.datos);
                document.getElementById("txtC").value = datos.catNombre;
        },
        error: function(x){
            alert (x.response);
        }
    });
})
//Actualizar Categoria en modal
$(document).on("click", "#btnActualizarCategoria", function () {
    $.ajax({
        url: '../../Controlador/CtrlCategoria.php',
        type: 'POST',
        dataType: 'JSON',
        data: $('#formularioCategoria').serialize(),
        success: function(json){
            var datos = json.datos;
                console.log(json.datos);
                document.getElementById("txtCategoria").value = datos.catNombre;

                alert("Categoria actualizado");
        },
        error: function(x){
            alert (x.response);
        }
    });
})
//eliminar Categoria
$(document).on("click", "#btnEliminarCategoria", function () {
    alert("entro");
    var parametros = {
        "opcion": 4,
        "idCategoria": $("#txtIdCategoria").val()
    }
    $.ajax({
        url: '../../Controlador/CtrlCategoria.php',
        type: 'POST',
        dataType: 'JSON',
        data: parametros,
        success: function(json){
            alert("ssasa");
            var datos = json.datos;
                alert("Categoria Eliminada");
        },
        error: function(x){
            alert (x.response);
            alert("ssasa");
        }
    });
})