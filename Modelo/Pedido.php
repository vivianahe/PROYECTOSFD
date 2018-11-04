<?php
/**
 * Clase persona
 *
 * @author USUARIO
 */
class Pedido {
    //put your code here
    private $idPedido;
    private $estado;
    private $tipo;
    private $fechaHora;
    private $cliente;
    //lista detalle pedido
    private $detallePedido=array();

    function __construct($estado=null, $tipo=null, $fechaHora=null, Cliente $cliente=null) {
        $this->estado = $estado;
        $this->tipo = $tipo;
        $this->fechaHora = $fechaHora;
        $this->cliente = $cliente;
    }

    public function getIdPedido()
    {
        return $this->idPedido;
    }

    public function setIdPedido($idPedido)
    {
        $this->idPedido = $idPedido;

        return $this;
    }

    public function getEstado()
    {
        return $this->estado;
    }

  
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    public function getTipo()
    {
        return $this->tipo;
    }

    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    public function getFechaHora()
    {
        return $this->fechaHora;
    }

    public function setFechaHora($fechaHora)
    {
        $this->fechaHora = $fechaHora;

        return $this;
    }

    public function getCliente()
    {
        return $this->cliente;
    }

   
    public function setCliente($cliente)
    {
        $this->cliente = $cliente;

        return $this;
    }
}
