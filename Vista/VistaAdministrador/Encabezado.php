<?php
session_start();
extract($_REQUEST);
if (!isset($_SESSION['idAdmin'])) {
    header("location:../../");
}
error_reporting(1);

?>
<div class="jumbotron" id="encabezadoAdmin">

    <div class="container">

        <div class="logoo">
            <input type="image" name="" src="../../Recursos/Img/logo.png" style="width: 100px;height: 100px;">
        </div>

        <h2 class="SFD">Bienvenido Administrador</h2>
    </div>
</div>