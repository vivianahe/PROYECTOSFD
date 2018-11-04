<?php
session_start();
extract($_REQUEST);
include '../Modelo/Conexion.php';
include '../Modelo/DatosProducto.php';
include '../Modelo/Producto.php';
error_reporting(0);


$objDatosProducto = new DatosProducto();
$productos = array('datos', 'mensaje', 'estado');
error_reporting(1);
 
switch ($_REQUEST['opcion']) {
    case 1: //cargar productos de cada categoria
    $resultado = $objDatosProducto->listarProductos($idCategoria);
        if ($resultado->estado) {
            if ($resultado->datos->rowCount() > 0) {
            $productos["datos"] =  utf8_converter($resultado->datos->fetchAll());
            } else {
                $productos["mensaje"] = "no existe";
            }
        } else {
            $productos["mensaje"] = $resultado->mensaje;
        }
        echo json_encode($productos);
    break;

    case 2:// agregar producto a una categoria
    $txtEstado="Activo";
    $idCategoria=2;
    $txtIngredientes="aaa";
    $txtProducto="holi";
    $txtValor="333";
    $unProducto= new Producto();
    $resultado = $objDatosProducto->agregarProducto($unProducto);
    if ($resultado->estado == true) {
        $nombre = $_FILES['fotoCategoria']['name'];
        $error = "";
        try {
            if (txtCategoria != "" && nombre != "") {
                $nombreArchivo = $_POST['txtProducto'] . ".jpg";
                $ruta = "../Recursos/Img/Categorias/";
                echo $ruta . $nombreArchivo;
                move_uploaded_file($_FILES['fotoCategoria']['tmp_name'], $ruta . $nombreArchivo);

                header("location:../Vista/VistaAdministrador/?pg=FrmGestionarCategorias&x=1");
            } else {
                header("location:../Vista/VistaAdministrador/?pg=FrmGestionarCategorias&x=3");
            }
        } catch (Exception $ex) {
            $error = $ex->getMessage();
        }
    } else {
        header("location:../Vista/VistaAdministrador/?pg=FrmGestionarCategorias&x=2");
    }

    break;
    case 3:
    



    break;
}
function utf8_converter($array)
{
     array_walk_recursive($array, function(&$item, $key){
      if(!mb_detect_encoding($item, 'utf-8', true)){
              $item = utf8_encode($item);
          }
      });

return $array;
}