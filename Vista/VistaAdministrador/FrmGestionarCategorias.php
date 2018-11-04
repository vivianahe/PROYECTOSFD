<?php
session_start();
extract($_REQUEST);
if (!isset($_SESSION['idAdmin'])) {
    header("location:../../");
}
error_reporting(1);
include "../../Modelo/Conexion.php";
include "../../Modelo/DatosCategoria.php";
$objDatosCategoria = new DatosCategoria();
$resultado = $objDatosCategoria->listarCategoria();
?>
<head>
    <script src="../../Recursos/Librerias/Js/push.min.js"></script>
</head>
<p align="center">
    <?php
    if (@$x == 1) {
        echo '<script>
        Push.create("Excelente",{
            body: "Nueva categoría agregada.",
            icon: "../../Recursos/Img/correcto.png",
            timeout: 15000,
            onClick: function () {
                            this.close();
            }
                        });
    </script>';
    }
    if (@$x == 2) {
        echo '<script>
        Push.create("Error",{
            body: "No se pudo agregar el empleado.",
            icon: "../../Recursos/Img/error.png",
            timeout: 15000,
            onClick: function () {
                            this.close();
            }
        });
    </script>';
    }
    if (@$x == 3) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>La foto no cumplió con el tamaño o la extensión jpg.</strong> 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                      </div>';
    }
    ?>
</p>
<br>
<div class="card-columns">
    <form action="../../Controlador/CtrlCategoria.php" enctype="multipart/form-data" method="post">
        <input type="hidden" name="opcion" value="1">
        <div class="card bg-secondary text-white">
            <div class="card-body" id="cardProductos" >
                <center><i class="fas fa-box-open fa-8x"></i></center>
                <input type="file" required="required" name="fotoCategoria" class="form-control-file"><br>
                <h5 class="card-title"><b>Agregar nueva categoría</b></h5>
                <p class="card-text"></p>
                <input class="form-control" type="text" id="txtCategoria" required="required" name="txtCategoria" placeholder="Ingrese el nombre de la categoría"><br>
                <button type="submit" class="btn btn-danger" name="btnAgregar" id="btnAgregar">Agregar</button>&nbsp;
                <a href="?pg=FrmGestionarCategorias"><button type="button" class="btn btn-ligth">Cancelar</button></a><br>
            </div>
        </div>
    </form>
    <?php
    while ($unaCategoria = $resultado->datos->fetchObject()) {
        ?>
        <form action="" id="formularioCategoriaE" enctype="multipart/form-data" method="post">
        <div class="card bg-light" id="cardProductos" >
            <img class="card-img-top" src="../../Recursos/Img/Categorias/<?php echo $unaCategoria->catNombre ?>.jpg" style="height: 240px;">
            <div class="card-body">
            <input type="hidden" name="opcion" value="4">
            <input type="hidden" name="txtIdCategoria" id="txtIdCategoria" value="<?php echo $unaCategoria->idCategoria ?>">
            <h5 class="card-title"><?php echo $unaCategoria->catNombre;?></h5>
            <p class="card-text">Ingrese aquí para modificar la categoría.</p>
            <p class="card-text"><a href="?pg=FrmGestionarProducto&idCategoria=<?php echo $unaCategoria->idCategoria; ?>" id="btnCargarProductos" ><i class="fas fa-arrow-right"></i></a>&nbsp;

                <button type="button" class="btn btn-primary" data-toggle="modal" onclick="cargarModalCategoria(<?php echo $unaCategoria->idCategoria?>)" data-target="#exampleModalCenter" id="btnCargarCategoria">
                <i title="Editar" class="fa fa-edit"></i>
                </button>
                &nbsp;<a href=""><i title="Eliminar" id="btnEliminarCategoria" class="fa  fa-minus-circle" onclick="cargarModalCategoria(<?php echo $unaCategoria->idCategoria?>)"></i></a></p>
            </div>
            </form>
        </div>
    <?php } ?>
</div>
<!-- Modal categoria para editarlo-->
<form id="formularioCategoria" action="../../Controlador/CtrlCategoria.php" enctype="multipart/form-data" method="post">


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle"><b>Editar categoría</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="opcion" value="3">
                <input type="hidden" name="txtIdCategoria" id="txtIdCategoria">
                <div id="imgPrevia" value=>
                    <?php
                    $ruta="../../Recursos/Img/Categorias/".$unaCategoria->catNombre;
                        opendir($ruta);
                    ?>
                </div>
                <input type="file" required="required" name="fotoCategoria"  id="fotoCategoria" class="form-control-file" accept="image/*"><br>
                <label><b>Nombre</b> </label>
                <input type="text" class="form-control" name="txtC" id="txtC"><br>
                <button type="submit" class="btn btn-danger" name="btnActualizarCategoria" id="btnActualizarCategoria">Actualizar</button>&nbsp;
                <a href="?pg=FrmGestionarCategorias"><button type="button" class="btn btn-ligth">Cancelar</button></a><br>
            </div> 
        </div>
    </div>
</div>
</form>

