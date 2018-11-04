<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Clase empleado
 *
 * @author USUARIO
 */
class Empleado extends Persona{
    
    private $idEmpleado;
    private $cargo;
    private $estado;
    
    function __construct($cargo=null, $estado=null,$identificacion=null, $nombres=null, $apellidos=null,
		$telefono=null, $direccion=null,$correo=null)
	{
		parent::__construct($identificacion, $nombres, $apellidos, $telefono, $direccion, $correo);
		$this->cargo=$cargo;
        $this->estado = $estado;
	}
    
        function getIdEmpleado() {
            return $this->idEmpleado;
        }

        function getCargo() {
            return $this->cargo;
        }

        function getEstado() {
            return $this->estado;
        }

        function setIdEmpleado($idEmpleado) {
            $this->idEmpleado = $idEmpleado;
        }

        function setCargo($cargo) {
            $this->cargo = $cargo;
        }

        function setEstado($estado) {
            $this->estado = $estado;
        }




}

