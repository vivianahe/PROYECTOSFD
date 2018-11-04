<?php
/**
 * Description of Ctegoria
 *
 * @author USUARIO
 */
class Categoria {

    private $idCategoria;
    private $nombre;
    private $estado;
    
    function __construct($nombre=null, $estado=null) {
        $this->nombre = $nombre;
        $this->estado = $estado;
    }
    
    function getIdCategoria() {
        return $this->idCategoria;
    }

    function getNombre() {
        return $this->nombre;
    }

    function setIdCategoria($idCategoria) {
        $this->idCategoria = $idCategoria;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    
    function getEstado() {
        return $this->estado;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }


}
