<?php
class DatosProducto {
    private $miConexion;
    private $mensaje;
    private $retorno;

    function __construct() {
        $this->miConexion = Conexion::singleton();
        $this->retorno = new stdClass();
    }

    /**
     * Metodo que agrega un producto 
     */
    public function agregarProducto(Producto $unProducto) {
        $this->mensaje = null;
        try {
            $consulta = "INSERT INTO productos VALUES (null,?,?,?,?,?)";
            $resultado = $this->miConexion->prepare($consulta);
            $resultado->bindParam(1, $unProducto->getCategoria()->getIdCategoria());
            $resultado->bindParam(2, $unProducto->getNombre());
            $resultado->bindParam(3, $unProducto->getValor());
            $resultado->bindParam(4, $unProducto->getIngredientes());
            $resultado->bindParam(5, $unProducto->getEstado());
            $resultado->execute();
            $this->retorno->estado = true;
            $this->retorno->datos = $resultado;
            $this->retorno->mensaje = "producto agregado.";
        } catch (PDOException $ex) {
            $this->retorno->estado = false;
            $this->retorno->datos = null;
            $this->retorno->mensaje = $ex->getMessage();
        }
        return $this->retorno;
    }
     /**
     * Método que lista los productos
     */
    public function listarProductos($idCategoria){
        $this->mensaje=null;
        try{
            $consulta="SELECT productos.*, idCategoria FROM productos"
            ." INNER JOIN categorias ON categorias.idCategoria=productos.proCategoria "
            ." WHERE idCategoria=?";
            $resultado=$this->miConexion->prepare($consulta);
            $resultado->bindParam(1, $idCategoria);
            $resultado->execute();
            $this->retorno->estado=true;
            $this->retorno->datos=$resultado;
            $this->retorno->mensaje="Lista productos.";
        } catch (Exception $ex) {
            $this->retorno->estado=false;
            $this->retorno->datos=null;
            $this->retorno->mensaje=$ex->getMessage();
        }
        return $this->retorno;
        }
        	
    /**
     * Método que lista un producto
     */
    public function cargarProducto($idProducto){
        $this->mensaje=null;
        try{
            $consulta="SELECT * FROM productos WHERE idProducto=?";
            $resultado=$this->miConexion->prepare($consulta);
            $resultado->bindParam(1, $idProducto);
            $resultado->execute();
            $this->retorno->estado=true;
            $this->retorno->datos=$resultado;
            $this->retorno->mensaje="Datos producto.";
        } catch (Exception $ex) {
            $this->retorno->estado=false;
            $this->retorno->datos=null;
            $this->retorno->mensaje=$ex->getMessage();
        }
        return $this->retorno;
        }

             
    /**
     * Método que Actualiza un producto
     * @param  [type] $unProducto 
     * @return [type]              
     */
    public function actualizarCategoria(Producto $unProducto){
        $this->mensaje=null;
        try{
            $consulta="UPDATE categorias SET categorias.catNombre=? WHERE categorias.idCategoria=?";
            $resultado=$this->miConexion->prepare($consulta);
            $resultado->bindParam(1, $unaCategoria->getNombre());
            $resultado->bindParam(2, $unaCategoria->getIdCategoria());
            $resultado->execute();
            $this->retorno->estado=true;
            $this->retorno->datos=$resultado;
            $this->retorno->mensaje="Datos categoría actualizados.";
        } catch (Exception $ex) {
            $this->retorno->estado=false;
            $this->retorno->datos=null;
            $this->retorno->mensaje=$ex->getMessage();
        }
        return $this->retorno;
        }

}
?>