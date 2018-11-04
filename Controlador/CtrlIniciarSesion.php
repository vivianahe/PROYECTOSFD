<?php

session_start();
extract($_REQUEST);
include "../Modelo/Conexion.php";
include "../Modelo/DatosSFD.php";

$objDatosSFD = new DatosSFD();
switch ($_REQUEST['opcion']) {
    case 1:
        $usuario = new stdClass();
        $usuario->login = $txtLogin;
        $usuario->password = $txtPassword;
        $resultado = $objDatosSFD->validarUsuarioPassword($usuario);
        if ($resultado->estado) {

            if ($resultado->datos->rowCount() > 0) {
                $user = $resultado->datos->fetchObject();
                $_SESSION['idUsuario'] = $user->usuUsuario;

                switch ($user->usuRol) {
                    case "Empleado":
                        $idPersona = $user->idPersona;
                        $resultado = $objDatosSFD->iniciarSesionEmpleados($idPersona);
                        if ($resultado->estado) {
                            if ($resultado->datos->rowCount() > 0) {
                                $empleado = $resultado->datos->fetchObject();
                                $_SESSION['idEmpleado'] = $empleado->idEmpleado;
                                $_SESSION['nombreEmpleado'] = $empleado->perNombre . " " . $user->perApellido;
                                $_SESSION['identificaEmpleado'] = $empleado->perIdentificacion;
                                header("location:../Vista/VistaEmpleado/");
                            } else {
                                header("location:../index.php?x=1");
                                //alert de notificaciones
                            }
                        }
                        break;
                    case "Administrador":
                        $idPersona = $user->idPersona;
                        $resultado = $objDatosSFD->iniciarSesionEmpleados($idPersona);
                        if ($resultado->estado) {
                            if ($resultado->datos->rowCount() > 0) {
                                $administrador = $resultado->datos->fetchObject();
                                $_SESSION['idAdmin'] = $administrador->idEmpleado;
                                $_SESSION['nombreAdmin'] = $administrador->perNombre . " " . $user->perApellido;
                                $_SESSION['identificaAdmin'] = $administrador->perIdentificacion;
                                header("location:../Vista/VistaAdministrador/");
                            } else {
                                header("location:../index.php?x=1");
                                //alert de notificaciones
                            }
                        }


                        break;
                    case "Cliente":
                        $idPersona = $user->idPersona;
                        $resultado = $objDatosSFD->iniciarSesionCliente($idPersona);
                        if ($resultado->estado) {
                            if ($resultado->datos->rowCount() > 0) {
                                $cliente = utf8_converter($resultado->datos->fetchObject());
                                $_SESSION['idCliente'] = $cliente->idCliente;
                                $_SESSION['nombreCliente'] = $cliente->perNombre . " " . $cliente->perApellido;
                                $_SESSION['identificaCliente'] = $cliente->perIdentificacion;
                                $_SESSION['pedido']=array('idProducto','Cantidad','Observaciones','Nombre','Valor');
                                header("location:../Vista/VistaCliente/");
                            } else {
                                header("location:../index.php?x=1");
                                //alert de notificaciones
                            }
                        }
                }
            } else {
                header("location:../index.php?x=1");
            }
        }


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