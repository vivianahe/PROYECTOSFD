<?php
session_start();
extract($_REQUEST);
if (!isset($_SESSION['idAdmin'])) {
    header("location:../../");
}
error_reporting(1);
include "../../Modelo/Conexion.php";
include "../../Modelo/DatosProducto.php";
$objDatosProducto = new DatosProducto();
$resultado = $objDatosProducto->listarProductos($idCategoria);
?>
<style>
    section{
        background:#EAEDED
    };
</style>
<br>
<center><h4 class="card-title"><strong>Tipos de </h4></strong></center>
<br>
<div class="card-columns">
 <div class="card bg-ligth">
    <form action="../../Controlador/CtrlProducto.php" enctype="multipart/form-data" method="post">
        <input type="" name="opcion" value="2">
        <input type="" name="idCategoria" id="idCategoria" value="<?php echo $idCategoria?>">
        <center><i class="fab fa-opencart fa-7x"></i></center><br>
        <input type="file" class="form-control-file">
        <div class="card-body text-dark">
            <h6 class="card-title"><b>Nuevo producto</b></h6>
            <h5 class="card-title">
            <input class="form-control" type="text" id="txtProducto" name="txtProducto" placeholder="Ingrese el nombre producto"></h5>
                <div class="form-group">
                    <h6><b>Ingredientes</b></h6>
                    <textarea class="form-control" id="txtIngredientes" name="txtIngredientes" placeholder="Ingrese los ingredientes"></textarea>
                </div>
                <h6 class="card-title"><b>Precio</b></h6>
            <h5 class="card-title">
            <input class="form-control" type="text"  id="txtValor" name="txtValor" placeholder="Ingrese el precio del producto"></h5>
            <button type="submit" class="btn btn-dark">Agregar</button>&nbsp;
            <a href="?pg=FrmGestionarCategorias"><button type="button" class="btn btn-ligth">Cancelar</button></a>
        </div>
    </div>
    </form>

    <?php 
    while ($unProducto = $resultado->datos->fetchObject()) { ?>
    <div class="card bg-ligth"><br>
        <input type="" name="txtNombreP" id="txtNombreP">
        <input type="" name="txtIdCategoria" id="txtIdCategoria" value="<?php echo $idCategoria?>">
        <input type="" name="txtIngredientesP" id="txtIngredientesP">
        <input type="" name="txtPrecioP" id="txtPrecioP">
        <input type="text" name="">
        <center><img class="card-img-top" src="../../Recursos/Img/Productos/<?php echo $unProducto->proNombre?>.png" style="width:33%;"></center><br>
        <input type="file" class="form-control-file">
        <div class="card-body text-dark" id="cardSandwiches">
            <h6 class="card-text"><b>Producto</b></h6> 
            <h5 class="card-title">
            <input class="form-control" name="txtNombreP" id="txtNombreP" type="text"></h5>

            <h6 class="card-text"><b>Ingredientes</b></h6> 
            <div class="form-group">
                <textarea class="form-control"  name="txtIngredientesP" id="txtIngredientesP"></textarea>
            </div>
            <h6 class="card-text"><b>Precio</b></h6> 
            <input class="form-control" type="text"  name="txtPrecioP" id="txtPrecioP"></strong>
            <br>
            <button type="button" class="btn btn-dark">Guardar</button>&nbsp;
            <a href="?pg=FrmGestionarCategorias"><button type="button" class="btn btn-ligth">Cancelar</button></a>
        </div>
    </div>


 <?php }?>



   