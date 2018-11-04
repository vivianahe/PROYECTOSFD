<?php
session_start();
extract($_REQUEST);
include "../Modelo/Conexion.php";
include "../Modelo/Pedido.php";
include "../Modelo/DatosPedido.php";
include "../Modelo/DatosProducto.php";
date_default_timezone_set('America/Bogota');
$objDatosProducto= new DatosProducto();
$objDatosPedido = new DatosPedido();
$retorno = array('datos','mensaje');

switch ($_REQUEST['opcion']){
    case 1: //agregar detalle pedido      

        $productos = json_decode($_POST['productos']); //lo que llega desde la vista con ajax.
        $observacionP=json_decode($_POST['txtObservaciones']);//de frm pedir
        $cantidadP=json_decode($_POST['txtCantidad']);//de frm pedir
        $unPedido = new stdClass();
        $unPedido->estado="En proceso";
        $unPedido->tipo="Domicilio";
        $unPedido->fechaHora=date('Y-m-d h:i:s');
        $unPedido->cliente=$_SESSION['idCliente'];  //id del cliente
        $unPedido->detallePedido = array();
        $cantidad = count($productos);
        for($i=0;$i<$cantidad;$i++){
            $detalle = new stdClass();
            $detalle->idProducto = $productos[$i];
            $detalle->cantidad=1;
            $detalle->observacion=$observacionP;
            //obtener precio
            $resultado = $objDatosPedido->obtenerPrecioProducto
                    ($productos[$i]);
            $precioProducto = $resultado->datos->fetchObject()->proValor;
            $detalle->valor = $detalle->cantidadP * $precioProducto;
            $unPedido->detallePedido[$i] = $detalle;          
        }
        //llamar al método que agrega la venta
        $resultado = $objDatosPedido->agregarPedido($unPedido);
        $retorno['datos']=$resultado->datos;
        $retorno['mensaje']=$resultado->mensaje;
        echo json_encode($retorno);
        break;


        case 2://llenar arreglo pedido

        $pedido=array("idProducto"=>$txtIdProducto,"Cantidad"=>$txtCantidad,
        "Observaciones"=>$txtObservaciones,"Nombre"=>$txtNombre,"Valor"=>$txtValor);
        $_SESSION['pedido'][]=$pedido;
       
     
         echo json_encode( $_SESSION['pedido']);
        //$retorno["datos"]=$txtIdProducto;
        //echo json_encode($retorno);
        break;

        case 3: //Listar pedidos
        $resultado = $objDatosPedido->listarPedidos();
        if ($resultado->estado == true) {
            if ($resultado->datos->rowCount() > 0) {
                $pedidos['datos'] = $resultado->datos->fetchAll();
            } else {
                $retorno['mensaje'] = 'Error';
            }
        }
        echo json_encode(utf8_converter($pedidos));
    
        break;

        case 4: //obtener productos en la tabla
            
     /* 
      $resultado = $objDatosProducto->cargarProducto($_SESSION['idProducto']);

        if ($resultado->estado) {
            if ($resultado->datos->rowCount() > 0) {
            $productos["datos"] =  utf8_converter($resultado->datos->fetchAll());
            } else {
                $productos["mensaje"] = "no existe";
            }
        } else {
            $productos["mensaje"] = $resultado->mensaje;
        }
        echo json_encode($productos);*/

        break;
}

function utf8_converter($array) {
    array_walk_recursive($array, function(&$item, $key) {
        if (!mb_detect_encoding($item, 'utf-8', true)) {
            $item = utf8_encode($item);
        }
    });
    return $array;
}

