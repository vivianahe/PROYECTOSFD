<?php

extract($_REQUEST);
include '../Modelo/Conexion.php';
include '../Modelo/Persona.php';
include '../Modelo/Cliente.php';
include '../Modelo/DatosCliente.php';

date_default_timezone_set('America/Bogota');

$objDatosCliente = new DatosCliente();
$clientes = array('datos', 'mensaje', 'estado');
error_reporting(1);
//echo ($_REQUEST['opcion']);  
switch ($_REQUEST['opcion']) {
    case 1:

        $fechaIngreso = date("Y-m-d");
        $estado = 'Activo';
        $rol = 'Cliente';

        $unCliente = new Cliente($fechaIngreso, $estado, $txtIdentificacion, $txtNombres, $txtApellidos, $txtTelefono, $txtDireccion, $txtCorreo);

        //print_r($unCliente);
        $resultado = $objDatosCliente->agregarCliente($unCliente, $rol);
        //$objDatosCliente->agregarCliente($unCliente, $rol);
        //echo $resultado->mensaje;
        if ($resultado->estado == true) {

            header("location:../index.php");
        } else {
            header("location:../index.php");
        }

        break;

    case 2:
        //$txtIdentificacion =1222222222221;
        $resultado = $objDatosCliente->existeCliente($identificacion);

        if ($resultado->estado == true) {
            if ($resultado->datos->rowCount() > 0) {
                $unCliente = $resultado->datos->fetchObject();
                echo '<div class="form-group has-error">
                            <label class="control-label" for="inputError">
                            <i class="fa fa-times-circle-o">
                            </i> Identificación ya existe.</label>
                     </div>';
                //      print_r($otraPersona);
            } else {
                echo '';
            }
        } else {
            echo '';
        }
        break;
        
        case 3:
        //$txtCorreo ='karenyulierr@gmailss.com';
        $resultado = $objDatosCliente->existeCorreo($correo);

        if ($resultado->estado == true) {
            if ($resultado->datos->rowCount() > 0) {
                $unCliente = $resultado->datos->fetchObject();
                echo '<div class="form-group has-error">
                            <label class="control-label" for="inputError">
                            <i class="fa fa-times-circle-o">
                            </i> Correo ya existe.</label>
                     </div>';
                     print_r($otraPersona);
            } else {
                echo '';
            }
        } else {
            echo '';
        }
}