<?php
session_start();
extract($_REQUEST);
include '../Modelo/Conexion.php';
include '../Modelo/Persona.php';
include '../Modelo/Empleado.php';
include '../Modelo/Categoria.php';
include '../Modelo/DatosEmpleado.php';
$objDatosEmpleado = new DatosEmpleado();
$empleados = array('datos', 'mensaje', 'estado');
error_reporting(1);

switch ($_REQUEST['opcion']) {
    //Agregar empleados
    case 1:
        $cargo = "Empleado";
        $estado = 'Activo';
        $rol = 'Empleado';
        $unEmpleado = new Empleado($cargo, $estado, $txtIdentificacion, $txtNombres,
        $txtApellidos, $txtTelefono, $txtDireccion, $txtCorreo);
        $resultado = $objDatosEmpleado->agregarEmpleado($unEmpleado, $rol);
        //echo $resultado;
        if ($resultado->estado == true) {
            if ($resultado->datos->rowCount() > 0) {
                header("location:../Vista/VistaAdministrador/?pg=FrmAgregarEmpleado&x=1");
            }
        } else {
            header("location:../Vista/VistaAdministrador/?pg=FrmAgregarEmpleado&x=2");
        }
        break;
    //Listar empleados
    case 2:
        $resultado = $objDatosEmpleado->listarEmpleados();
        if ($resultado->estado == true) {
            if ($resultado->datos->rowCount() > 0) {
                $empleados['datos'] = $resultado->datos->fetchAll();
                //print_r($empleados);
            } else {
                echo ' error';
            }
        }
        echo json_encode(utf8_converter($empleados));
        break;

        case 3: //falta 
        break;
   
    // cargar el empleado al modal
    case 4:
        //$idEmpleado = $_POST['txtIdEmpleadoM'];
        $resultado = $objDatosEmpleado->cargarEmpleadoModal($idEmpleado);
        if ($resultado->estado) {
            if ($resultado->datos->rowCount() > 0) {
                $empleados["datos"] =  utf8_converter($resultado->datos->fetchObject());
            } else {
                $empleados["mensaje"] = "no existe";
            }
        } else {
            $empleados["mensaje"] = $resultado->mensaje;
        }
        echo json_encode($empleados);
    break;
    //Actualizar empleado
    case 5:

    $cargo=$_POST["cbCargoM"];
    $estado=$_POST["cbEstadoM"];
    $txtIdentificacion=$_POST["txtIdentificacionM"];
    $txtNombres=$_POST["txtNombreM"];
    $txtApellidos=$_POST["txtApellidoM"];
    $txtTelefono=$_POST["txtTelefonoM"];
    $txtDireccion=$_POST["txtDireccionM"];
    $txtCorreo=$_POST["txtCorreoM"];

    $idEmpleado=$_POST["txtIdEmpleadoM"];

    $unEmpleado = new Empleado($cargo, $estado,$txtIdentificacion, $txtNombres,
    $txtApellidos, $txtTelefono, $txtDireccion, $txtCorreo);
    $unEmpleado->setIdEmpleado($idEmpleado);

        $resultado = $objDatosEmpleado->actualizarEmpleado($unEmpleado);

        if ($resultado->estado == true) {
            if ($resultado->datos->rowCount() > 0) {
                $empleados["datos"] = $resultado->datos->fetchObject();
            }else{
                $empleados["mensaje"] = "Error al actualizar.";
            }
        } else {
            $empleados["mensaje"] = $resultado->mensaje;
        }
        echo json_encode($empleados);
    break;

    //Eliminar empleado
    case 6:
        $resultado = $objDatosEmpleado->eliminarEmpleado($idEmpleado);
        if ($resultado->estado == true) {
                $res=$objDatosEmpleado->cargarEmpleadoModal($idEmpleado);
                $empleados["datos"] =utf8_converter( $res->datos->fetchObject());
        } else {
            $empleados["mensaje"] = $resultado->mensaje;
        }
        echo json_encode($empleados);
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
