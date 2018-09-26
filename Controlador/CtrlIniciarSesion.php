<?php

extract($_REQUEST);
include "../Modelo/Conexion.php";
include "../Modelo/DatosSFD.php";

$objDatosSFD = new DatosSFD();
switch ($_REQUEST['opcion']) {
    case 1:

        $usuario = new stdClass();
        $usuario->login = $txtLogin;
        $usuario->password = $txtPassword;

        $resultado = $objDatosSFD->iniciarSesionCliente($usuario);
        if ($resultado->estado == true) {
            if ($resultado->datos->rowCount() > 0) {
                $user = $resultado->datos->fetchObject();
     
                 header("location:../Vista/VistaCliente/");
               /*  
                $_SESSION['idCliente'] = $user->idCliente;
                $_SESSION['nombreCliente'] = $user->perNombre . " " . $user->perApellido;
                $_SESSION['identifica'] = $user->perIdentificacion;*/
                
            } else {
                header("location:../index.php");
            }
        }
        break;
        
         case 2 :

        $usuario = new stdClass();
        $usuario->login = $txtLogin;
        $usuario->password = $txtPassword;

        $resultado = $objDatosSFD->iniciarSesionEmpleados($usuario);
        if ($resultado->estado == true) {
            if ($resultado->datos->rowCount() > 0) {
                $user = $resultado->datos->fetchObject();
             
               /*  
                $_SESSION['idCliente'] = $user->idCliente;
                $_SESSION['nombreCliente'] = $user->perNombre . " " . $user->perApellido;
                $_SESSION['identifica'] = $user->perIdentificacion;*/
                switch ($user->usuRol) {
                    case "Empleado":
                        header("location:../Vista/VistaEmpleado/");
                        break;
                    case "Administrador":
                        header("location:../Vista/VistaAdministrador/");
                        break;
                }
            } else {
                header("location:../index.php");
            }
        }
           break;
}