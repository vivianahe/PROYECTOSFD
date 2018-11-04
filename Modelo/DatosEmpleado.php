<?php

/**
 * Clase que le permite al administrador gestionar su perfil
 *
 * @author USUARIO
 */
class DatosEmpleado {

    private $miConexion;
    private $mensaje;
    private $retorno;

    function __construct() {
        $this->miConexion = Conexion::singleton();
        $this->retorno = new stdClass();
    }

    /**
     * Método que le permite a un administrador agregar un empleado
     * @param Empleado $unEmpleado
     * @param type $rol
     * @return type
     */
    public function agregarEmpleado(Empleado $unEmpleado, $rol) {
        $this->mensaje = null;

        try {
            $this->miConexion->beginTransaction();
            $consulta = "INSERT INTO personas VALUES (null,?,?,?,?,?,?)";
            $resultado = $this->miConexion->prepare($consulta);
            $resultado->bindParam(1, $unEmpleado->getIdentificacion());
            $resultado->bindParam(2, $unEmpleado->getNombres());
            $resultado->bindParam(3, $unEmpleado->getApellidos());
            $resultado->bindParam(4, $unEmpleado->getTelefono());
            $resultado->bindParam(5, $unEmpleado->getDireccion());
            $resultado->bindParam(6, $unEmpleado->getCorreo());
            $resultado->execute();
            $idPersona = $this->miConexion->lastInsertId();
            // echo "Persona". $idPersona;
            $consulta = "insert into empleados values(null,?,?,?)";
            $resultado = $this->miConexion->prepare($consulta);
            $resultado->bindParam(1, $unEmpleado->getCargo());
            $resultado->bindParam(2, $unEmpleado->getEstado());
            $resultado->bindParam(3, $idPersona);
            $resultado->execute();

            $password = md5($unEmpleado->getIdentificacion());
            $consulta = "INSERT INTO usuarios VALUES (null,?,?,?,?)";
            $resultado = $this->miConexion->prepare($consulta);
            $resultado->bindParam(1, $unEmpleado->getIdentificacion());
            $resultado->bindParam(2, $password);
            $resultado->bindParam(3, $rol);
            $resultado->bindParam(4, $idPersona);
            $resultado->execute();
            $this->miConexion->commit();
            $this->retorno->estado = true;
            $this->retorno->datos = $resultado;
            $this->retorno->mensaje = "Empleado agregado correctamente.";
        } catch (PDOException $ex) {
            $this->mensaje = $ex->getMessage();
            $this->miConexion->rollBack();
            $this->retorno->estado = false;
            $this->retorno->datos = NULL;
            $this->retorno->mensaje = $this->mensaje;
        }
        return $this->retorno;
    }

    /**
     * Método que permite listar los empleados
     * @return type Lista empleados
     */
    public function listarEmpleados() {
        $this->mensaje = null;
        try {
            $consulta = "SELECT personas.*, empleados.* FROM personas "
                    . " INNER JOIN empleados "
                    . " ON empleados.empPersona=personas.idPersona";
            $resultado = $this->miConexion->query($consulta);
            $this->retorno->estado = true;
            $this->retorno->datos = $resultado;
            $this->retorno->mensaje = "Lista empleados.";
        } catch (PDOException $ex) {
            $this->retorno->estado = false;
            $this->retorno->datos = null;
            $this->retorno->mensaje = $ex->getMessage();
        }
        return $this->retorno;
    }
    
     /**
     * Método que permite cargar datos de un empleado
     * @return type empleado
     */
    public function cargarEmpleadoModal($idEmpleado) {
        $this->mensaje = null;
        try {
            $consulta = "SELECT personas.*, empleados.* FROM personas "
                    . " INNER JOIN empleados ON personas.idPersona=empleados.empPersona WHERE empleados.idEmpleado=?";
          
            $resultado = $this->miConexion->prepare($consulta);
            $resultado->bindParam(1, $idEmpleado);
            $resultado->execute();
            $this->retorno->estado = true;
            $this->retorno->datos = $resultado;
            $this->retorno->mensaje = "Datos empleado.";
        } catch (PDOException $ex) {
            $this->retorno->estado = false;
            $this->retorno->datos = null;
            $this->retorno->mensaje = $ex->getMessage();
        }
        return $this->retorno;
    }

    /**
     * Método que permite actualizar un empleado
     */
    public function actualizarEmpleado(Empleado $unEmpleado){
        $this->mensaje = null;
        try {
            $consulta = "UPDATE personas INNER JOIN empleados"
            . " on personas.idPersona=empleados.empPersona "
            . " set personas.perIdentificacion=?, perNombre=?, perApellido=?, perTelefono=?,"
            . " perDireccion=?, perCorreo=?, empleados.empCargo=?, empleados.empEstado=?"
            . " WHERE empleados.idEmpleado=?";
            $resultado = $this->miConexion->prepare($consulta);

            $resultado->bindParam(1, $unEmpleado->getIdentificacion());
            $resultado->bindParam(2, $unEmpleado->getNombres());
            $resultado->bindParam(3, $unEmpleado->getApellidos());
            $resultado->bindParam(4, $unEmpleado->getTelefono());
            $resultado->bindParam(5, $unEmpleado->getDireccion());
            $resultado->bindParam(6, $unEmpleado->getCorreo());
            $resultado->bindParam(7, $unEmpleado->getCargo());
            $resultado->bindParam(8, $unEmpleado->getEstado());
            $resultado->bindParam(9, $unEmpleado->getIdEmpleado());
            $resultado->execute();
            $this->retorno->estado = true;
            $this->retorno->datos = $resultado;
            $this->retorno->mensaje = "Datos empleado actualizados.";
        } catch (PDOException $ex) {
            $this->retorno->estado = false;
            $this->retorno->datos = null;
            $this->retorno->mensaje = $ex->getMessage();
        }
        return $this->retorno;
    }
    /**
     * Métod que inactiva un empleado
     */
    public function eliminarEmpleado($idEmpleado){
        $this->mensaje = null;
        try {
            $consulta = "UPDATE personas INNER JOIN empleados "
            . " ON personas.idPersona=empleados.empPersona "
            . " SET empleados.empEstado='Inactivo' WHERE empleados.idEmpleado=?";
          
            $resultado = $this->miConexion->prepare($consulta);
            $resultado->bindParam(1, $idEmpleado);
            $resultado->execute();
            $this->retorno->estado = true;
            $this->retorno->datos = $resultado;
            $this->retorno->mensaje = "Empleado eliminado.";
        } catch (PDOException $ex) {
            $this->retorno->estado = false;
            $this->retorno->datos = null;
            $this->retorno->mensaje = $ex->getMessage();
        }
        return $this->retorno;
    }

}
