<?php
session_start();
extract($_REQUEST);
if (!isset($_SESSION['idAdmin'])) {
    header("location:../../");
}
error_reporting(1);
if (!isset($_GET['pg'])) {
   $pg = "FrmGestionarCategorias";
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Administrador</title>
        
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0">
       
        <link href="../../Recursos/Librerias/Css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../Recursos/Librerias/fontawesome/css/all.css" rel="stylesheet" type="text/css"/>
        <link href="../../Recursos/Librerias/Ionicons/css/ionicons.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../Recursos/Librerias/fontawesome/css/fontawesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../Recursos/Librerias/iChek/_all-skins.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../Recursos/Librerias/Css/AdminLTE.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../Recursos/Librerias/Css/estilosAdmin.css" rel="stylesheet" type="text/css"/>
        <link rel="shortcut icon" type="image/x-icon" href="../../Recursos/Img/logo.png">

    </head>
    <body>
        <header ></header>	
        <nav class="principalAdmin"><?php include "../VistaAdministrador/Menu.php" ?></nav>	
        <section class="principalAdmin"><?php include $pg . ".php" ?></section>       
        <footer class="principalAdmin"><?php include "../VistaAdministrador/PiePagina.php" ?></footer>

     <!--   <script src="../../Recursos/Librerias/Jquery/external/jquery/jquery.js" type="text/javascript"></script> -->
        <script src="../../Recursos/Librerias/Jquery/jquery.min.js" type="text/javascript"></script>
        <script src="../../Recursos/Librerias/iChek/icheck.min.js" type="text/javascript"></script>
   <!--     <script src="../../Recursos/Librerias/Jquery/jquery-1.7.2.min.js" type="text/javascript"></script> -->
        <script src="../../Recursos/Librerias/Js/EfectosAdmin.js" type="text/javascript"></script>

<!--        <script src="../../Js/Funciones.js" type="text/javascript"></script>-->
       <!-- <script src="../../Js/jquery-3.3.1.slim.min.js" type="text/javascript"></script> -->
        <script src="../../Recursos/Librerias/Css/bootstrap.min.js" type="text/javascript"></script>
        <script src="../../Js/popper.min.js" type="text/javascript"></script>
        <script src="../../Recursos/Librerias/Js/Funciones.js" type="text/javascript"></script>
        <script src="../../Recursos/Librerias/Js/FuncionesCliente.js" type="text/javascript"></script>
        <script src="../../Recursos/Librerias/Js/FuncionesEmpleado.js" type="text/javascript"></script>
        <script src="../../Recursos/Librerias/Js/FuncionesCategoria.js" type="text/javascript"></script>
        <script src="../../Recursos/Librerias/Js/FuncionesPedido.js" type="text/javascript"></script>
        <script src="../../Recursos/Librerias/Js/FuncionesProducto.js" type="text/javascript"></script>
        <!--  DATA TABLE-->
        <script src="../../Recursos/Librerias/Jquery/jquery-3.3.1.js" type="text/javascript"></script>
        <script src="../../Recursos/Librerias/Js/datatables.js" type="text/javascript"></script>
        <link href="../../Recursos/Librerias/Css/datatables.css" rel="stylesheet" type="text/css"/>
        <script src="../../Recursos/Librerias/Js/jquery.dataTables.js" type="text/javascript"></script>
        <link href="../../Recursos/Librerias/Css/dataTables.bootstrap.css" rel="stylesheet" type="text/css"/>

    </body>
</html>