<?php
/**
 *  Clase pedido
 */
class DatosPedido{
    private $miConexion;
    private $mensaje;
    private $retorno;
    
    function __construct() {
        $this->miConexion = Conexion::singleton();
        $this->retorno = new stdClass();
    }
    /**
     * Método que agrega un pedido
     * @param  stdClass $unPedido
     * @return [type]
     */
    public function agregarPedido(stdClass $unPedido){
        $this->mensaje = null;
        
        try {
            $this->miConexion->beginTransaction();
            $consulta = "INSERT INTO pedidos VALUES (null,?,?,?,?)";
            $resultado = $this->miConexion->prepare($consulta);
            $resultado->bindParam(1, $unPedido->estado);
            $resultado->bindParam(2, $unPedido->tipo);
            $resultado->bindParam(3, $unPedido->fechaHora);
            $resultado->bindParam(4, $unPedido->cliente);
            $resultado->execute();          
            //obtener el id del pedido que se acaba de crear
            $unPedido->idPedido = $this->miConexion->lastInsertId();
            //agregar a la tabla detallepedido
            $consulta = "INSERT INTO detallepedido VALUES (NULL, ?, ?, ?, ?, ?)";
            $resultado = $this->miConexion->prepare($consulta); 
            $cantidad = count($unPedido->detallePedido);
            for($i=0;$i<$cantidad;$i++){
                $resultado->bindParam(1,$unPedido->idPedido);
                $resultado->bindParam(2,$unPedido->detallePedido[$i]->idProducto);
                $resultado->bindParam(3,$unPedido->detallePedido[$i]->cantidad);
                $resultado->bindParam(4,$unPedido->detallePedido[$i]->valorTotal);
                $resultado->bindParam(5,$unPedido->detallePedido[$i]->observacion);
                $resultado->execute();            
            }
            $this->miConexion->commit();
            $this->retorno->estado=true;
            $this->retorno->datos=$resultado;
            $this->retorno->mensaje="Venta Registrada";                  
        } catch (PDOException $ex) {
            $this->miConexion->rollBack();
            $this->retorno->estado=false;
            $this->retorno->datos=null;
            $this->retorno->mensaje=$ex->getMessage();      
        }
        return $this->retorno;
        
    }
    /**
     * Método obtener precio del producto
     * @param  [type] $idProducto 
     * @return [type]             
     */
    public function obtenerPrecioProducto($idProducto){
        try{
            $consulta="SELECT proValor FROM productos WHERE idProducto=?";
            $resultado=$this->miConexion->prepare($consulta);
            $resultado->bindParam(1,$idProducto);
            $resultado->execute();
            $this->retorno->estado=true;
            $this->retorno->datos=$resultado;
            $this->retorno->mensaje="Precio del Producto";              
        } catch (PDOException $ex) {
            $this->retorno->estado=false;
            $this->retorno->datos=null;
            $this->retorno->mensaje=$ex->getMessage(); 
        }
        return $this->retorno;
    }

    /**
     * Método que lista los pedidos
     * @return type lista pedidos
     */
    public function listarPedidos() {
        $this->mensaje = null;
        try {
            $consulta = "SELECT personas.perNombre, personas.perApellido, personas.perDireccion, clientes.*,"
                    . " pedidos.pedFechaHora,pedidos.pedEstado, pedidos.pedTipo, "
                    . "detallepedido.detValorTotal, productos.proNombre, clientespedidos.clipeNumero"
                    . " FROM personas INNER JOIN clientes on clientes.cliPersona=personas.idPersona "
                    . "INNER JOIN clientespedidos ON clientes.idCliente=clientespedidos.clipeCliente "
                    . "INNER JOIN pedidos ON pedidos.pedCliente=clientes.idCliente "
                    . "INNER JOIN detallepedido ON detallepedido.detPedido=pedidos.idPedido "
                    . "INNER JOIN productos on productos.idProducto=pedidos.idPedido";
            $resultado = $this->miConexion->query($consulta);
            $this->retorno->estado = true;
            $this->retorno->datos = $resultado;
            $this->retorno->mensaje = "Lista pedidos.";
        } catch (PDOException $ex) {
            $this->retorno->estado = false;
            $this->retorno->datos = null;
            $this->retorno->mensaje = $ex->getMessage();
        }
        return $this->retorno;
    }



}