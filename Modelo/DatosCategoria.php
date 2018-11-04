<?php 
class DatosCategoria {

    //put your code here

    private $miConexion;
    private $mensaje;
    private $retorno;

    function __construct() {
        $this->miConexion = Conexion::singleton();
        $this->retorno = new stdClass();
    }

    /**
     * Método que agregar una categoría
     * @param Categoria $unaCategoria
     * @return type
     */
    public function agregarCategoria(Categoria $unaCategoria) {
        $this->mensaje = null;
        try {
            $consulta = "INSERT INTO categorias VALUES (null,?,'Activo')";
            $resultado = $this->miConexion->prepare($consulta);
            $resultado->bindParam(1, $unaCategoria->getNombre());
            $resultado->execute();
            $this->retorno->estado = true;
            $this->retorno->datos = $resultado;
            $this->retorno->mensaje = "Categoría agregada.";
        } catch (PDOException $ex) {
            $this->retorno->estado = false;
            $this->retorno->datos = null;
            $this->retorno->mensaje = $ex->getMessage();
        }
        return $this->retorno;
    }
    




 /*
     * Método que lista las categorías
     */
    public function listarCategoria() {
        $this->mensaje = null;
        try {
            $consulta = "SELECT * FROM categorias WHERE catEstado='Activo'";
            $resultado=$this->miConexion->query($consulta);
            $this->retorno->estado=true;
            $this->retorno->datos=$resultado;
            $this->retorno->mensaje="Lista categorias.";
        } catch (Exception $ex) {
            $this->retorno->estado=false;
            $this->retorno->datos=null;
            $this->retorno->mensaje=$ex->getMessage();
        }
        return $this->retorno;
    }


    /**
     * Método que lista una categoría
     * @param  [type] $idCategoria 
     * @return [type]              
     */
    public function cargarCategoria($idCategoria){
        $this->mensaje=null;
        try{
            $consulta="SELECT * FROM categorias WHERE idCategoria=?";
            $resultado=$this->miConexion->prepare($consulta);
            $resultado->bindParam(1, $idCategoria);
            $resultado->execute();
            $this->retorno->estado=true;
            $this->retorno->datos=$resultado;
            $this->retorno->mensaje="Datos categoría.";
        } catch (Exception $ex) {
            $this->retorno->estado=false;
            $this->retorno->datos=null;
            $this->retorno->mensaje=$ex->getMessage();
        }
        return $this->retorno;
        }


        
    /**
     * Método que Actualiza una categoría
     * @param  [type] $idCategoria 
     * @return [type]              
     */
    public function actualizarCategoria(Categoria $unaCategoria){
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

             
    /**
     * Método que Actualiza una categoría y le deja el estado inactivo
     * @param  [type] $idCategoria 
     * @return [type]              
     */
    public function eliminarCategoria($idCategoria){
        $this->mensaje=null;
        try{
            $consulta="UPDATE categorias SET categorias.catEstado='Inactivo' WHERE categorias.idCategoria=?";
            $resultado=$this->miConexion->prepare($consulta);
            $resultado->bindParam(1,$idCategoria);
            $resultado->execute();
            $this->retorno->estado=true;
            $this->retorno->datos=$resultado;
            $this->retorno->mensaje="Datos categoría eliminada.";
        } catch (Exception $ex) {
            $this->retorno->estado=false;
            $this->retorno->datos=null;
            $this->retorno->mensaje=$ex->getMessage();
        }
        return $this->retorno;
        }
}
 ?>