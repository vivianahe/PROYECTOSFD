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
$resultado = $objDatosProducto->listarProductos($idCategoria);

function utf8_converter($array) {
    array_walk_recursive($array, function(&$item, $key) {
        if (!mb_detect_encoding($item, 'utf-8', true)) {
            $item = utf8_encode($item);
        }
    });
    return $array;
}

?>
<br>
<br>
<div class="body">
    <div class="container">
        <?php
            while ($unProducto=utf8_converter($resultado->datos->fetchObject())) {
        ?>
    <div class="col-lg-12">
        <ul class="timeline">
            <li>
                <div class="timeline-image ">
                    <img class="img-circle img-responsive" src="../../Recursos/Img/Productos/<?php echo $unProducto->proNombre?>.png" style="height: 100px; width: 130px;">
                </div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4><?php echo $unProducto->proNombre ?></h4><br>
                        <h5 class="subheading">Ingredientes</h5>
                    </div>
                    <div class="timeline-body">
                   
                    <p class="text-muted"><?php echo $unProducto->proIngredientes ?></p>
                    <p><b>Precio: </b>$<?php echo $unProducto->proValor ?></div><br></p>
                    <center>
                   
                    <a class="btn btn-info" href="?pg=FrmPedir&idProducto=<?php echo $unProducto->idProducto ?> ">Pedir</a>
                    </center>
                    </div>
                </div>
            </li>
        </ul>
    </div>
        <?php } ?>
    </div>
</div>

