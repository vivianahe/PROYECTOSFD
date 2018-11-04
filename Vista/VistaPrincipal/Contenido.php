<?php
extract($_REQUEST);
error_reporting(1);
if (!isset($_GET['pg'])) {
    $pg = "Vista/VistaPrincipal/Contenido";
}
?>



<br>
<section class="main container">
    <!--Carrusel-->
    <article id="carrusel">

        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="Recursos/Img/Categorias/Hamburguesas.jpg" style="height: 420px;" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100"  src="Recursos/Img/Categorias/Perros calientes.jpg" style="height: 420px;" alt="Second slide">
                </div>
                <div class="carousel-item" id="log">
                    <img class="d-block w-100"  src="Recursos/Img/Categorias/Arepas rellenas.jpg" style="height: 420px;" alt="Third slide">
                </div>
                <div class="carousel-item" id="log">
                    <img class="d-block w-100"  src="Recursos/Img/Categorias/Sandwiches.jpg" style="height: 420px;" alt="fifth  slide">
                </div>
                
            </div>

            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span> 
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next"> <a name="nosotros"></a>


                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>


            </a>
        </div>

    </article>
</section>
<br><br><br>

<!--Nosotros-->

<article>

    <div class="nosotros jumbotron" id="contenidoJum"><br>
        <div class="container">
            <center><h1>Nosotros</h1></center>
<div class="row" style="width: 100%">
  <div class="col-sm-6">

      <div class="card-body">
        <h5 class="card-title"><center><h3><em>Misión</em></h3></center></h5>
    
    <p class="card-text" align="justify"><i class="fas fa-diagnoses fa-5x"></i> &nbsp;Ser una empresa rentable que ofrezca a las familias  y turistas, la mejor comida rápida con un sazón único, ofreciendo un excelente servicio y generando un ambiente familiar para sus clientes y de armonía y desarrollo para sus empleados.</p>
      </div>

  </div>
  <div class="col-sm-6">

      <div class="card-body">
        <h5 class="card-title"><center><h3><em>Visión</em></h3></center></h5>
    
    <p class="card-text" align="justify"><i class="fas fa-chart-line fa-6x"></i> &nbsp;Ser una empresa líder que proporcione bienestar a todo nuestro equipo de trabajo, clientes y proveedores. Consolidar el liderazgo de nuestra Empresa, sosteniendo un crecimiento y mejora integral continua y actuando responsablemente con nuestra sociedad.</p>
      </div>
    </div>

</div>
</div>
    </div>
</article> 

<!--Productos-->
<article>

<?php 

error_reporting(1);
include "Modelo/Conexion.php";
include "Modelo/DatosCategoria.php";
$objDatosCategoria = new DatosCategoria();
$resultado = $objDatosCategoria->listarCategoria();

?>

<center><h1>Productos</h1></center>
<div class="row col-sm-12">
    
    <?php
    while ($unaCategoria = $resultado->datos->fetchObject()) {
    ?>
    <div class="containerP">
        <div class="div-img" >
            <img class="img img-responsive" src="Recursos/Img/Categorias/<?php echo $unaCategoria->catNombre ?>.jpg" style="width:250px; height:140px;">
            <a href="?pg=Vista/VistaPrincipal/FrmListarProductosIndex&idCategoria=<?php $cat=$unaCategoria->idCategoria; echo $cat;?> " ><div class="text"><?php echo $unaCategoria->catNombre ?></div></a>
        </div>
        </div>
        <?php } ?>
   
</div>
</article><br>
<br><br><br><br><br><br><br>
<!--Contactos-->

<article><div class="jumbotron" id="jumContactenos">
        <a name="contacto"></a>
        <center><h1>Contáctenos </h1></center><br>
        <center><div class="iconContactos">
                <i class="fab fa-facebook-square fa-7x" id="contacto1"></i>&nbsp;
                <i class="fab fa-instagram fa-7x" id="contacto2"></i>&nbsp;
                <i class="fab fa-twitter-square fa-7x" id="contacto3 "></i>
            </div></center><br>
        <div align="center">
            <span>Tel: 3142960806 - 3227631972</span><br>
            <span>Calle 56 N° 13-24</span><br>
            <span>Neiva - Huila</span><br>
        </div>
    </div>

</article>
