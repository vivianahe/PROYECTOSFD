<?php
session_start();
extract($_REQUEST);
if (!isset($_SESSION['idAdmin'])) {
    header("location:../../");
}
error_reporting(1);

?>
<section>
<div>
    <br><center><b><h3><strong>Estadísticas del negocio</strong></h3></b></center>
<br>
<br>
<div class="card" id="graficas" style="width:400px;">
  <img class="card-img-top" id="imagenG" src="../../Recursos/Img/grafica1.png" alt="Card image cap">
  <div class="card-body">
      <h4 class="card-title" id="tituloG">Resultados por ventas</h4>
    <p class="card-text">
    
  </div>
</div>
</div>
<div class="card" id="grafica2" style="width:400px;">
  <img class="card-img-top" id="imagenG" src="../../Recursos/Img/grafica2.png" alt="Card image cap">
  <div class="card-body">
      <h4 class="card-title" id="tituloG">Resultados por ventas</h4>
    <p class="card-text">
    
  </div>
</div>

</div>
</section><br>