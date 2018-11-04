<?php
session_start();
extract($_REQUEST);
if (!isset($_SESSION['idCliente'])) {
    header("location:../../");
}
error_reporting(1);
include "../../Modelo/Conexion.php";
include "../../Modelo/DatosProducto.php";
$objDatosProducto = new DatosProducto();
$resultado = $objDatosProducto->cargarProducto($idProducto);
$unProducto =  utf8_converter($resultado->datos->fetchObject());


function utf8_converter($array) {
    array_walk_recursive($array, function(&$item, $key) {
        if (!mb_detect_encoding($item, 'utf-8', true)) {
            $item = utf8_encode($item);
        }
    });
    return $array;
}
?>
<br><br>
<center>
<form action="" id="frmPedir" method="post">
<input type="hidden" value="2" name="opcion">
    <div class="card text-center border-info mb-3" style="max-width: 26rem;">
    <input type="" <?php print_r( $_SESSION['pedido'])?>>
        <input type="" name="txtIdProducto" id="txtIdProducto" value="<?php   echo $idProducto?>">
        <input type="" name="txtNombre" id="txtNombre" value="<?php   echo $unProducto->proNombre?>">
        <input type="" name="txtValor" id="txtValor" value="<?php   echo $unProducto->proValor?>">

            <div class="card-header " style="background: #00a4e4; color: white"><h4><?php echo $unProducto->proNombre ?><h4></div>
             <div class="card-body ">
                <a href="?pg=frmCategoriasdos" class="fa fa-plus-circle fa-2x"  style="color:black; float: right"></a>
                <h4><b>Ingredientes</b></h4>
             <div><br>
        <div class="form-check">
            <label class="form-check-label" for="defaultCheck1">
                <h5><?php echo $unProducto->proIngredientes ?><h5>
            </label>
        </div><br>
        <h5>Precio: $<?php echo $unProducto->proValor ?></h5>
    </div><br>
    <h5 style="float:left">Cantidad:</h5>
    <input type="text" style="border: 1px solid black" id="txtCantidad"  value ="1" name="txtCantidad" class="form-control-sm" onkeypress="inputNumero(event)" required>
    <br>
    <br>
    <textarea class="form-control" rows="3" placeholder="Observaciones" id="txtObservaciones" name="txtObservaciones"></textarea><br>
        <a class="btn btn-success" href="?pg=FrmMiPedido"  id="btnPedir">Pedir</a>
        <a href="?pg=frmCategoriasDos" class="btn btn-danger">Cancelar</a>
    </div>
    </div>
    </form>
</center>
