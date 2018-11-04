//Cargar productos
//FUNCION OBTENER PRODUCTOS PARA CARGAR A MI PEDIDO (Array)
$(document).on("click", "#btnPedir", function () {
    $.ajax({
        url: '../../Controlador/CtrlPedido.php',
        type: 'POST',
        dataType: 'JSON',
        data: $("#frmPedir").serialize(),
        success: function(json){
                console.log(json);
   
        },
        error: function(x){
            alert (x);
            console.log(x);
        }
    });
    })

