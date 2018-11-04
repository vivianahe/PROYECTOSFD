<?php

session_start();
extract($_REQUEST);
include '../Modelo/Conexion.php';
include '../Modelo/Categoria.php';
include '../Modelo/DatosCategoria.php';
$objDatosCategoria = new DatosCategoria();
$categorias = array('datos', 'mensaje', 'estado');
error_reporting(1);

switch ($_REQUEST['opcion']) {
 //Agregar categoría
    case 1:
        $txtEstado="Activo";
        $unaCategoria = new Categoria($txtCategoria,$txtEstado);
        //print_r($unaCategoria);
        $resultado = $objDatosCategoria->agregarCategoria($unaCategoria);
        //echo $resultado->mensaje;
        if ($resultado->estado == true) {
            $nombre = $_FILES['fotoCategoria']['name'];
            $error = "";
            try {
                if (txtCategoria != "" && nombre != "") {
                    $nombreArchivo = $_POST['txtCategoria'] . ".jpg";
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

        case 2: // cargar categoria al modal

        $resultado = $objDatosCategoria->cargarCategoria($idCategoria);
        if ($resultado->estado) {
            if ($resultado->datos->rowCount() > 0) {
            $categorias["datos"] =  utf8_converter($resultado->datos->fetchObject());
            } else {
                $categorias["mensaje"] = "no existe";
            }
        } else {
            $categorias["mensaje"] = $resultado->mensaje;
        }

        echo json_encode($categorias);
    break;

    case 3: //actualizar  categoria
    $unaCategoria=new Categoria($txtC);
    $unaCategoria->setIdCategoria($txtIdCategoria);
    $resultado = $objDatosCategoria->actualizarCategoria($unaCategoria);
    if ($resultado->datos->rowCount() > 0) {
        $categorias["datos"] =  utf8_converter($resultado->datos->fetchObject());
    
            $nombre = $_FILES['fotoCategoria']['name'];
            $error = "";
            $ruta = "../Recursos/Img/Categorias/";
            try {
                if(opendir($ruta)){
                    $nombreArchivo = $_POST['txtCategoria'] . ".jpg";
                    if(!file_exists($nombreArchivo)){
                       move_uploaded_file($_FILES['fotoCategoria']['tmp_name'], $ruta . $nombreArchivo);
                    }else{
                        unlink($_FILES['fotoCategoria']['tmp_name'], $ruta . $nombreArchivo);
                        if(!file_exists($nombreArchivo)){
                            move_uploaded_file($_FILES['fotoCategoria']['tmp_name'], $ruta . $nombreArchivo);
                        }
                    }
                }
            } catch (Exception $ex) {
                $error = $ex->getMessage();
            }
        }

   json_encode($categorias);

    break;

    case 4: // eliminar categoria
    $resultado = $objDatosCategoria->eliminarCategoria($idCategoria);
    if ($resultado->datos->rowCount() > 0) {
        $categorias["datos"] =  utf8_converter($resultado->datos->fetchObject());
        echo "Eliminada";
    }else{
        echo "No eliminada";
    }
    break;
      
   echo json_encode($categorias);

    }

function utf8_converter($array) {
    array_walk_recursive($array, function(&$item, $key) {
        if (!mb_detect_encoding($item, 'utf-8', true)) {
            $item = utf8_encode($item);
        }
    });
    return $array;
}
