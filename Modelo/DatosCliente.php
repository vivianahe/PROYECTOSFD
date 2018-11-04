<?php


/**
 * Clase que permite gestionar un cliente
 *
 * @author USUARIO
 */
class DatosCliente {
    private $miConexion;
    private $mensaje;
    private $retorno;
    
    function __construct() {
        $this->miConexion = Conexion::singleton();
        $this->retorno = new stdClass();
    }
    
    /**
     * Método que permite agregar un cliente.Ctrl. 
     * @param Cliente $unCliente Objeto cliente
     * @param type $rol Rol del cliente
     * @return type
     */
    public function agregarCliente(Cliente $unCliente, $unUsuario){
        $this->mensaje = null;
        
        try {
            $this->miConexion->beginTransaction();
            $consulta = "INSERT INTO personas VALUES (null,?,?,?,?,?,?)";
            $resultado = $this->miConexion->prepare($consulta);
            $resultado->bindParam(1, $unCliente->getIdentificacion());
            $resultado->bindParam(2, $unCliente->getNombres());
            $resultado->bindParam(3, $unCliente->getApellidos());
            $resultado->bindParam(4, $unCliente->getTelefono());
            $resultado->bindParam(5, $unCliente->getDireccion());
            $resultado->bindParam(6, $unCliente->getCorreo());
            $resultado->execute();
            $idPersona = $this->miConexion->lastInsertId();      
            //echo "Persona". $idPersona;
            $consulta = "insert into clientes values(null,?,?,?)";
            $resultado = $this->miConexion->prepare($consulta);
            $resultado->bindParam(1, $idPersona);
            $resultado->bindParam(2, $unCliente->getFechaIngreso());
            $resultado->bindParam(3, $unCliente->getEstado());
            $resultado->execute();
            $idPersona = $this->miConexion->lastInsertId();      
            //$idCliente = $this->miConexion->lastInsertId();
            //echo "Cliente".$idCliente;
           // echo "Persona". $idPersona;
            $consulta="INSERT INTO usuarios VALUES (null,?,?,?,?)";
            $resultado=$this->miConexion->prepare($consulta);
            $resultado->bindParam(1, $unUsuario->getUsuario());
            $resultado->bindParam(2, $unUsuario->getPassword());
            $resultado->bindParam(3, $rol);
            $resultado->bindParam(4, $idPersona);
            //echo "Persona". $idPersona;
            $resultado->execute();
       
            $this->miConexion->commit();
            $this->retorno->estado=true;
            $this->retorno->datos=$resultado;
            $this->retorno->mensaje="Cliente agregado correctamente.";

        } catch (PDOException $ex) {
            $this->mensaje=$ex->getMessage();
            $this->miConexion->rollBack();
            $this->retorno->estado=false;
            $this->retorno->datos=NULL;
            $this->retorno->mensaje=$this->mensaje;
        }
        return $this->retorno;
    }
    
    /**
     * Método que verifica si el cliente ya existe registrado.Ajax
     * @param type $identificacion Identificación cliente
     * @return type
     */
    public function existeCliente($identificacion){
        $this->mensaje=null;
        try {
            $consulta ="SELECT * FROM personas WHERE personas.perIdentificacion=?";
            
            $resultado = $this->miConexion->prepare($consulta);
            $resultado->bindParam(1, $identificacion);
            $resultado->execute();
            $this->retorno->estado=true;
            $this->retorno->datos=$resultado;
            $this->retorno->mensaje="Cliente..";
        } catch (Exception $ex) {
            $this->retorno->estado=false;
            $this->retorno->datos=null;
            $this->retorno->mensaje=$ex->getMessage();
        }
        return $this->retorno;
    }
    
    /**
     * Método que verifica si el correo del cliente ya existe.Ajax
     * @param type $correo Correo cliente
     * @return type
     */
    public function existeCorreo($correo){
        $this->mensaje=null;
        try {
            $consulta = "SELECT * FROM personas WHERE personas.perCorreo=?";
            
            $resultado = $this->miConexion->prepare($consulta);
            $resultado->bindParam(1, $correo);
            $resultado->execute();
            $this->retorno->estado=true;
            $this->retorno->datos=$resultado;
            $this->retorno->mensaje="Correo.";
        } catch (Exception $ex) {
            $this->retorno->estado=false;
            $this->retorno->datos=null;
            $this->retorno->mensaje=$ex->getMessage();
        }
        return $this->retorno;
    }

   /**
    * Método que verifica si el usuario ya existe.Ajax
    * @param  [type] $usuario Usuario cliente
    * @return [type]        
    */
    public function existeUsuario($usuario){
        $this->mensaje=null;
        try {
            $consulta = "SELECT * FROM usuarios WHERE usuarios.usuUsuario=?";
            
            $resultado = $this->miConexion->prepare($consulta);
            $resultado->bindParam(1, $usuario);
            $resultado->execute();
            $this->retorno->estado=true;
            $this->retorno->datos=$resultado;
            $this->retorno->mensaje="Usuario.";
        } catch (Exception $ex) {
            $this->retorno->estado=false;
            $this->retorno->datos=null;
            $this->retorno->mensaje=$ex->getMessage();
        }
        return $this->retorno;
    }
    
    /*
     * Método que retorna la lista de clientes
     */
    public function listarClientes(){
        $this->mensaje=null;
        try { 
            $consulta = "Select personas.*, clientes.* from personas "
                    . " inner join clientes "
                    . " on clientes.cliPersona=personas.idPersona";
            $resultado = $this->miConexion->query($consulta);
            $this->retorno->estado=true;
            $this->retorno->datos=$resultado;
            $this->retorno->mensaje="Lista clientes.";
        } catch (Exception $ex) {
            $this->retorno->estado=false;
            $this->retorno->datos=null;
            $this->retorno->mensaje=$ex->getMessage();
        }
        return $this->retorno;
    }
     /**
     * Método que permite cargar datos de un cliente
     * @return type cliente
     */
    public function cargarClientePerfil($idCliente) {
        $this->mensaje = null;
        try {
            $consulta = "SELECT personas.*,clientes.* FROM personas "
            ." INNER JOIN clientes on personas.idPersona= clientes.cliPersona WHERE"
            ." clientes.idCliente=?";
          
            $resultado = $this->miConexion->prepare($consulta);
            $resultado->bindParam(1, $idCliente);
            $resultado->execute();
            $this->retorno->estado = true;
            $this->retorno->datos = $resultado;
            $this->retorno->mensaje = "Datos Cliente.";
        } catch (PDOException $ex) {
            $this->retorno->estado = false;
            $this->retorno->datos = null;
            $this->retorno->mensaje = $ex->getMessage();
        }
        return $this->retorno;
    }
   /**
     * Método que permite actualizar perfil cliente
     */

    public function ActualizarPerfilCliente(Cliente $unCliente){
        $this->mensaje = null;
        try{
             $consulta=" UPDATE personas INNER JOIN clientes"
             ." on personas.idPersona=clientes.cliPersona SET personas.perIdentificacion=?,"
             ." personas.perNombre=?,personas.perApellido=?, personas.perTelefono=?, personas.perDireccion=?,"
             ." personas.perCorreo=? WHERE clientes.idCliente = ?";
             $resultado = $this->miConexion->prepare($consulta);
             $resultado->bindParam(1, $unCliente->getIdentificacion());
             $resultado->bindParam(2, $unCliente->getNombres());
             $resultado->bindParam(3, $unCliente->getApellidos());
             $resultado->bindParam(4, $unCliente->getTelefono());
             $resultado->bindParam(5, $unCliente->getDireccion());
             $resultado->bindParam(6, $unCliente->getCorreo());
             $resultado->bindParam(7, $unCliente->getFechaIngreso());
             $resultado->bindParam(8, $unCliente->getEstado());
             $resultado->bindParam(9, $unCliente->getIdCliente());
             $resultado->execute();
             $this->retorno->estado = true;
             $this->retorno->datos = $resultado;
             $this->retorno->mensaje = "Datos cliente actualizados.";
        }catch (PDOException $ex) {
             $this->retorno->estado = false;
             $this->retorno->datos = null;
             $this->retorno->mensaje = $ex->getMessage();
        }
           return $this->retorno;
 }

    /**
     * Método que inactiva un cliente
     */
    public function eliminarCliente($idCliente){
        $this->mensaje = null;
        try{
            $consulta="UPDATE personas INNER JOIN clientes"
            ." on personas.idPersona= clientes.cliPersona"
            ." SET clientes.cliEstado='Inactivo' where clientes.idCliente=?";
            $resultado = $this->miConexion->prepare($consulta);
            $resultado->bindParam(1, $idCliente);
            $resultado->execute();
            $this->retorno->estado = true;
            $this->retorno->datos = $resultado;
            $this->retorno->mensaje = "Cliente Eliminado.";
        }catch (PDOException $ex) {
            $this->retorno->estado = false;
            $this->retorno->datos = null;
            $this->retorno->mensaje = $ex->getMessage();
            }
            
         return $this->retorno;
}
}
