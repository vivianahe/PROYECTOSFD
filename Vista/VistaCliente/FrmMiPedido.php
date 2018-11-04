<?php
session_start();
if (!isset($_SESSION['idCliente'])) {
    header("location:../../");
}
?>
<br>
<center>
  <br><h1>Mi Pedido</h1><br>

<table class="table" id="tbMiPedido" style="width:1000px;height:200px"> 
  <thead>
    <tr style="background: #d2d6de">
      <th scope="col">Producto</th>
      <th scope="col">Observciones</th>
      <th scope="col">Cantidad</th>
      <th scope="col">Valor Unitario</th>
      <th scope="col">Valor Total</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  <?php  
  //eliminar el registro o fila
    $idProdu= $_GET['Id']; //->id del producto de la fila a eliminar
    $ban= $_GET['ban']; // bandera para verificar y eliminar
    for($i=0;$i<count($_SESSION['pedido']);$i++){

      if ($_SESSION['pedido'][$i]['idProducto']==$idProdu and $ban==3){
        unset($_SESSION['pedido'][$i]);
      }
      //ordenar el array, cuando se elimina
      $_SESSION['pedido']=array_values($_SESSION['pedido']);
    }

    for($i=0;$i<count($_SESSION['pedido']);$i++){
    // valor total
    $total=  $_SESSION['pedido'][$i]['Valor']* $_SESSION['pedido'][$i]['Cantidad'];
    //total a pagar
    $totalPagar=0;
    //total a pgar
    $totalProd= $_SESSION['pedido'][$i]['Valor']* $total;
    $totalPagar= $totalPagar + $totalProd;
    }
    
  for($i=0;$i<count($_SESSION['pedido']);$i++){

  ?>
    <tr id="fila">
      <td id="producto"> <?php  echo $_SESSION['pedido'][$i]['Nombre']?></td>
      <td id="observaciones"> <?php  echo $_SESSION['pedido'][$i]['Observaciones']?></td>
      <td id="cantidad"><?php  echo $_SESSION['pedido'][$i]['Cantidad']?></td>
      <td id="valorUnidad"> $ <?php  echo $_SESSION['pedido'][$i]['Valor']?></td>
      <td id="valorTotal"> $ <?php echo $total ?></td>
      <td><a class="fa  fa-times" href="?pg=FrmMiPedido&ban=3&Id=<?php echo $_SESSION['pedido'][$i]['idProducto'] ?>" style="color: black" id="eliminarP"></a></td>
    </tr>

    <?php }

    ?>
    
  </tbody>
</table><br>

    <div style="float:right">
      <label for="inputPassword6"><b>Total a Pagar:</b></label>&nbsp;&nbsp;
      <input type="text" style="border:1px solid black" id="TotalPagar" value="$ <?php echo $totalPagar?>" name="totalPagar" class="form-control col-sm-6" readonly>
    </div>
    <br><br>
<button class="btn btn-danger" id="btnPedido">Pedir</button>
<a class="btn btn-danger" href="?pg=FrmCategoriasDos">Volver</a>
</center><br>
