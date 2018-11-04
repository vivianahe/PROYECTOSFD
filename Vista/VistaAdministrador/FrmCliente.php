<?php
session_start();
extract($_REQUEST);
if (!isset($_SESSION['idAdmin'])) {
    header("location:../../");
}
error_reporting(1);

?>
<head>

    <script src="../../Recursos/Librerias/Jquery/jquery-3.3.1.js" type="text/javascript"></script>   
</head>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card" id="cajaPrincipal" style="background: #f3f4f7">
                    <center><h3 id="TituloEmpleados"><b>Clientes</b></h3></center>
                </div>
                <br>
                <div class="table-responsive">
                <div id="tablaUsuario"></div>
                </div>
            </div>
            <!-- end content-->
        </div>
        <!--  end card  -->
    </div>
    <!-- end col-md-12 -->
</div>
<!-- end row -->
</div>
