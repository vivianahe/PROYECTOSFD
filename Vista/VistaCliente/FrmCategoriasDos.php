<?php
session_start();
extract($_REQUEST);
if (!isset($_SESSION['idCliente'])) {
    header("location:../../");
}
error_reporting(1);
include "../../Modelo/Conexion.php";
include "../../Modelo/DatosCategoria.php";


$objDatosCategoria = new DatosCategoria();
$resultado = $objDatosCategoria->listarCategoria();
?>

<link rel="stylesheet" href="../../Recursos/Librerias/Css/bootstrap.css">
<style>
.card:hover .card-text {-webkit-transform:scale(0.95);transform:scale(0.95);}
.card {overflow:hidden;}
</style>
<center><br>
<h1>Categorías</h1>
</center><br>
<div class="container">
<div class="card-columns">
  <div class="">
<?php
    while ($unaCategoria = $resultado->datos->fetchObject()) {
?>
    <div class="card text-center">
      <div class="card-body">
      <h5 class="card-title"><?php echo $unaCategoria->catNombre ?></h5>
        <p class="card-text"><img src="../../Recursos/Img/Categorias/<?php echo $unaCategoria->catNombre ?>.jpg" style="height: 150px; width: 260px"></p>
        <a href="?pg=FrmListarProducto&idCategoria=<?php $cat=$unaCategoria->idCategoria; echo $cat;?>"  class="btn btn-danger">Ver</a>
      </div>
    </div>
    <?php } ?>
   </div>
</div><br>
</div>