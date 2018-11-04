<?php
session_start();
extract($_REQUEST);
if (!isset($_SESSION['idAdmin'])) {
    header("location:../../");
}
error_reporting(1);

?>
<br>
<div class="card-columns">
 <div class="card bg-ligth" id="cardHamburguesas">
        <center><img class="card-img-top" src="../../Recursos/Img/resize (1).png" style="width:45%;"></center>
    

        <div class="card-body text-dark">
            <h6 class="card-text"><b>Producto</b></h6> 
            <h5 class="card-title"><input class="form-control" type="text"
                                          placeholder="Hamburguesa de pan"></h5>

            <h6 class="card-text"><b>Observaciones</b></h6> 
            <div class="form-group">
                <textarea class="form-control" placeholder="Sin cebolla,gracias"></textarea>
            </div>
           
    </div>
 </div>

      
    <div class="card bg-ligth" id="cardHamburguesas"><br>
        <center><img class="card-img-top" src="../../Recursos/Img/SandwichSencillo (1).png"
                     style="width:30%;"></center><br>

        <div class="card-body text-dark">
            <h6 class="card-text"><b>Producto</b></h6> 
            <h5 class="card-title"><input class="form-control" type="text"
                                          placeholder="Sandwich cubano sencillo"></h5>

            <h6 class="card-text"><b>Observaciones</b></h6> 
            <div class="form-group">
                <textarea class="form-control" placeholder=""></textarea>
            </div>
            
           
    </div>
    </div>

    <div class="card bg-ligth" id="cardHamburguesas"><br>
        <center><img class="card-img-top" src="../../Recursos/Img/Cocacola (1).png"
                     style="width:35%;"></center><br>
  
        <div class="card-body text-dark">

            <h6 class="card-text"><b>Producto</b></h6> 
            <h5 class="card-title"><input class="form-control" type="text"
                                          placeholder="Gaseosa Personal"></h5>
              <h6 class="card-text"><b>Observaciones</b></h6> 
            <div class="form-group">
                <textarea class="form-control" placeholder="Sabor manzana"></textarea>
            </div>
           
            
        </div>
    </div>
</div>

<br>
<center><a type="button" class="btn btn-dark" href="?pg=FrmPedidos">Listo</a></center>