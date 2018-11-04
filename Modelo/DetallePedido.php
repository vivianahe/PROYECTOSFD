<?php
/**
 * Clase detalle pedido
 *
 * @author USUARIO
 */
class DetallePedido {
    //put your code here
    private $idDetallePedido;
    private $pedido;
    private $producto;
    private $cantidad;
    private $valorTotal;
    private $observacion;

    function __construct(Pedido $pedido, Producto $producto, $cantidad, $valorTotal, $observacion) {
        $this->pedido = $pedido;
        $this->producto = $producto;
        $this->cantidad = $cantidad;
        $this->valorTotal = $valorTotal;
        $this->observacion = $observacion;
    }

    public function getIdDetallePedido()
    {
        return $this->idDetallePedido;
    }

    public function setIdDetallePedido($idDetallePedido)
    {
        $this->idDetallePedido = $idDetallePedido;

        return $this;
    }

   
    public function getPedido()
    {
        return $this->pedido;
    }

    
    public function setPedido($pedido)
    {
        $this->pedido = $pedido;

        return $this;
    }

   
    public function getProducto()
    {
        return $this->producto;
    }

   
    public function setProducto($producto)
    {
        $this->producto = $producto;

        return $this;
    }

   
    public function getCantidad()
    {
        return $this->cantidad;
    }

   
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    public function getValorTotal()
    {
        return $this->valorTotal;
    }

    public function setValorTotal($valorTotal)
    {
        $this->valorTotal = $valorTotal;

        return $this;
    }

    public function getObservacion()
    {
        return $this->observacion;
    }

    public function setObservacion($observacion)
    {
        $this->observacion = $observacion;

        return $this;
    }
}
