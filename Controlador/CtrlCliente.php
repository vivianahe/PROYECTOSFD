<?php

session_start();
extract($_REQUEST);
include '../Modelo/Conexion.php';
include '../Modelo/Persona.php';
include '../Modelo/Cliente.php';
include '../Modelo/Usuario.php';
include '../Modelo/DatosCliente.php';
error_reporting(0);

date_default_timezone_set('America/Bogota');

$objDatosCliente = new DatosCliente();
$clientes = array('datos', 'mensaje', 'estado');
error_reporting(1);
//echo ($_REQUEST['opcion']);
switch ($_REQUEST['opcion']) {
    case 1: // agregar cliente

        $fechaIngreso = date("Y-m-d");
        $estado = 'Activo';
        $rol = 'Cliente';
        $unUsuario = new Usuario($txtUsuario,$txtContrasena,$rol);
        $unCliente = new Cliente($fechaIngreso, $estado, $txtIdentificacion, $txtNombre, $txtApellido, $txtTelefono, $txtDireccion, $txtCorreo);

        //print_r($unCliente);
        $resultado=$objDatosCliente->agregarCliente($unCliente,$unUsuario);
        //$objDatosCliente->agregarCliente($unCliente, $rol);
        //echo $resultado->mensaje;

       if ($resultado->estado == true) {

            header("location:../index.php");
        } else {
           header("location:../index.php");
        }

        break;

    case 2: // verificar si ya existe identificacion por ajax
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

    case 3:// verificar si ya existe correo por ajax
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
        break;

        case 4: 
//listar los clientes
        $resultado = $objDatosCliente->listarClientes();
        if ($resultado->estado == true) {
            if ($resultado->datos->rowCount()>0) {
                
                
                $clientes['estado']=$resultado->estado;
                $clientes['datos']=$resultado->datos->fetchAll();
            }else{
                //echo 'nada';
            }
            $clientes['mensaje'] = $resultado->mensaje;
           
        } else {
            $clientes['mensaje'] = 'Error al obtener lista de clientes' . $resultado->mensaje;
            $clientes['datos'] = $resultado->datos;
        }
  
        echo json_encode(utf8_converter($clientes));
        

        break;
        case 5:
        //Cargar Datos del Cliente en el perfil
        $idCliente= $_SESSION['idCliente'];
        $resultado = $objDatosCliente->cargarClientePerfil($idCliente);
        if ($resultado->estado) {
            if ($resultado->datos->rowCount() > 0) {
                $clientes["datos"] =  utf8_converter($resultado->datos->fetchObject());
            } else {
                $clientes["mensaje"] = "No existe";
            }
        } else {
            $clientes["mensaje"] = $resultado->mensaje;
        }
        echo json_encode($clientes);
    break;

    case 6:

    $Identificación= $_POST["txtIdentificacion"];
    $nombre= $_POST["txtNombres"];
    $apellidos= $_POST["txtApellidos"];
    $telefono= $_POST["txtTelefono"];
    $direccion=$_POST["txtDireccion"];
    $correo=$_POST["txtCorreo"];
    $idCliente=$_POST["txtIdCliente"];

    $unCliente = new Cliente($Identificación,$nombre,$apellidos,$telefono,$direccion,$correo);
    $unCliente->setIdCliente($idCliente);
    $resultado = $objDatosCliente->ActualizarPerfilCliente($unCliente);

        if ($resultado->estado == true) {
            if ($resultado->datos->rowCount() > 0) {
                $clientes["datos"] = $resultado->datos->fetchObject();
            }else{
                $clientes["mensaje"] = "Error al actualizar.";
            }
        } else {
            $clientes["mensaje"] = $resultado->mensaje;
        }
        echo json_encode($clientes);
        break;

        case 7:
         $resultado = $objDatosCliente->eliminarCliente($idCliente);
        if ($resultado->estado == true) {
                $res=$objDatosCliente->cargarClientePerfil($idCliente);
                $clientes["datos"] =utf8_converter( $res->datos->fetchObject());
        } else {
            $clientes["mensaje"] = $resultado->mensaje;
        }
        echo json_encode($clientes);
    break;

    case 8:// verificar si ya existe usuario por ajax
        //$usuario ='11';
        $resultado = $objDatosCliente->existeUsuario($usuario);

        if ($resultado->estado == true) {
            if ($resultado->datos->rowCount() > 0) {
                $unCliente = $resultado->datos->fetchObject();
                echo '<div class="form-group has-error">
                            <label class="control-label" for="inputError">
                            <i class="fa fa-times-circle-o">
                            </i> Usuario ya existe.</label>
                     </div>';
                
            } else {
                echo '';
            }
        } else {
            echo '';
        }
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