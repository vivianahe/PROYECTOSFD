<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Clase cliente
 *
 * @author USUARIO
 */
class Cliente extends Persona{
    
    private $idCliente;
    private $fechaIngreso;
    private $estado;
    
      function __construct($fechaIngreso=null, $estado=null,$identificacion=null, $nombres=null, $apellidos=null, 
		$telefono=null, $direccion=null,$correo=null)
	{
		parent::__construct($identificacion, $nombres, $apellidos, $telefono, $direccion, $correo);
		$this->fechaIngreso=$fechaIngreso;
                $this->estado = $estado;
	}
    
    function getIdCliente() {
        return $this->idCliente;
    }

    function getFechaIngreso() {
        return $this->fechaIngreso;
    }

    function getEstado() {
        return $this->estado;
    }

    function setIdCliente($idCliente) {
        $this->idCliente = $idCliente;
    }

    function setFechaIngreso($fechaIngreso) {
        $this->fechaIngreso = $fechaIngreso;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }





}
