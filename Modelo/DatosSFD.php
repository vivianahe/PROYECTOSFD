<?php

/**
 * Clase que gestiona el ingreso al sistema de los clientes y admin
 *
 * @author USUARIO
 */
class DatosSFD {
    private $miConexion;
    private $mensaje;
    private $retorno;
       
    public function __construct(){
    	$this->miConexion = conexion::singleton();
        $this->retorno= new stdClass();
    }
    /**
     * Metodo que retorna datos del cliente al iniciar sesión
     * @param stdClass $usuario
     * @return type
     */
    public function iniciarSesionCliente(stdClass $usuario){
        try {
            $consulta="SELECT personas.perIdentificacion, personas.perNombre, "
                    . " personas.perApellido, clientes.idCliente, usuarios.usuRol"
                    . " FROM personas INNER JOIN clientes "
                    . " ON personas.idPersona=clientes.cliPersona"
                    . " INNER JOIN usuarios "
                    . " ON usuarios.usuPersona=personas.idPersona"
                    . " WHERE usuarios.usuUsuario=? AND usuarios.usuPassword=?";
            
            $resultado = $this->miConexion->prepare($consulta);
            $resultado->bindParam(1, $usuario->login);
            $resultado->bindParam(2, md5($usuario->password));
            $resultado->execute();
            
            $this->retorno->estado=true;
            $this->retorno->datos=$resultado;
            $this->retorno->mensaje="Datos del cliente.";
        } catch (PDOException $ex) {
            $this->mensaje=$ex->getMessage();
            $this->retorno->estado=false;
            $this->retorno->datos=NULL;
            
        }
        return $this->retorno;
    }
     /**
     * Metodo que retorna datos del los empleados ya sean administradores o empleados al iniciar sesión
     * @param stdClass $usuario
     * @return type
     */
    public function iniciarSesionEmpleados(stdClass $usuario){
        try {
            $consulta="SELECT personas.perIdentificacion, personas.perNombre, "
            . " personas.perApellido, empleados.idEmpleado, usuarios.usuRol "
            . " FROM personas INNER JOIN empleados " 
            . " ON personas.idPersona=empleados.empPersona "
            . " INNER JOIN usuarios "
            . " ON usuarios.usuPersona=personas.idPersona "
            . " WHERE usuarios.usuUsuario=? AND usuarios.usuPassword=? ";
            
            $resultado = $this->miConexion->prepare($consulta);
            $resultado->bindParam(1, $usuario->login);
            $resultado->bindParam(2, md5($usuario->password));
            $resultado->execute();
            
            $this->retorno->estado=true;
            $this->retorno->datos=$resultado;
            $this->retorno->mensaje="Datos del cliente.";
        } catch (PDOException $ex) {
            $this->mensaje=$ex->getMessage();
            $this->retorno->estado=false;
            $this->retorno->datos=NULL;
        }
        return $this->retorno;
    }
}
