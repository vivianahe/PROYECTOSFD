<?php

/**
 * Description of DatosNegocio
 *
 * @author USUARIO
 */
class DatosNegocio {

    //put your code here

    private $miConexion;
    private $mensaje;
    private $retorno;

    function __construct() {
        $this->miConexion = Conexion::singleton();
        $this->retorno = new stdClass();
    }

}


