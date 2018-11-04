<?php
session_start();
extract($_REQUEST);

if (!isset($_SESSION['idEmpleado'])) {
    header("location:../../");
}
error_reporting(1);

?>    

<div id="menuEmple">
    <nav class="navbar navbar-expand-lg navbar-dark  bg-success" >

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="margenMenu">
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav">

                    <li class="nav-item active">
                        <a href="index.php"><input type="image" name="" src="../../Recursos/Img/logo.png" style="width: 50px;height: 50px;"></a>
                    </li>
                    <li class="nav-item active">
                        <label id="admin" class="nav-link"><b>EMPLEADO</b> <span class="sr-only">(current)</span></label>
                    </li>
                    
                    <li class="nav-item active">
                        <a class="nav-link" href="?pg=FrmCategoriasDos">Productos <span class="sr-only">(current)</span></a>
                    </li>
                  
                    <li class="nav-item active" id="subirPedido">                  
                        <a  class="nav-link " href="?pg=FrmPedidos">  Pedidos <span class="badge badge-light">6</span></a>  
                    </li>
                    
                    <li class="nav-item active">
                        <a class="nav-link" href="?pg=FrmFacturas">Facturas</a>
                    </li>
                  
                </ul>
            </div>
        </div>
        <div id="btnCerrarSesion" >
            <a href="../Salir.php"><button type="button" class="btn btn-dark">
                    Cerrar sesión <i class="fas fa-sign-out-alt"></i>
                </button></a>
        </div>
</div>



</nav>





