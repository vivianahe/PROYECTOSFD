<?php
/**
 * Description of Producto
 * @author USUARIO
 */
class Producto {
    private $idProducto;
    private $categoria;
    private $nombre;
    private $valor;
    private $ingredientes;
    private $estado;
    
    function __construct(Categoria $categoria, $nombre = null, $valor = null, $ingredientes = null, $estado=null)
    {
        $this->categoria = $categoria;
        $this->nombre = $nombre;
        $this->valor = $valor;
        $this->ingredientes = $ingredientes;
        $this->estado=$estado;
    }
    
    function getCategoria() {
        return $this->categoria;
    }
    function getNombre() {
        return $this->nombre;
    }
    function getValor() {
        return $this->valor;
    }
    function getIngredientes() {
        return $this->ingredientes;
    }

    function setCategoria($categoria) {
        $this->categoria = $categoria;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setValor($valor) {
        $this->valor = $valor;
    }

    function setIngredientes($ingredientes) {
        $this->ingredientes = $ingredientes;
    }
    function getEstado() {
        return $this->estado;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }


}
