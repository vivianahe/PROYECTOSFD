<?php


/**
 * Clase persona
 *
 * @author USUARIO
 */
class Persona {
    //put your code here
    private  $idPersona;
    private $identificacion;
    private $nombres;
    private $apellidos;
    private $telefono;
    private $direccion;
    private $correo;
    
    function __construct($identificacion, $nombres, $apellidos, $telefono, $direccion, $correo) {
        $this->identificacion = $identificacion;
        $this->nombres = $nombres;
        $this->apellidos = $apellidos;
        $this->telefono = $telefono;
        $this->direccion = $direccion;
        $this->correo = $correo;
    }
    
    function getIdPersona() {
        return $this->idPersona;
    }

    function getIdentificacion() {
        return $this->identificacion;
    }

    function getNombres() {
        return $this->nombres;
    }

    function getApellidos() {
        return $this->apellidos;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getCorreo() {
        return $this->correo;
    }

    function setIdPersona($idPersona) {
        $this->idPersona = $idPersona;
    }

    function setIdentificacion($identificacion) {
        $this->identificacion = $identificacion;
    }

    function setNombres($nombres) {
        $this->nombres = $nombres;
    }

    function setApellidos($apellidos) {
        $this->apellidos = $apellidos;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setCorreo($correo) {
        $this->correo = $correo;
    }



}
