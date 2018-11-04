<?php
session_start();
extract($_REQUEST);

if (!isset($_SESSION['idCliente'])) {
    header("location:../../");
}
error_reporting(1);
if (!isset($_GET['pg'])) {
    $pg = "../VistaCliente/FrmCategoriasDos";
}

?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>SFD</title>
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0">
        <link rel="stylesheet" type="" href="../../Recursos/Librerias/Css/bootstrap.min.css">
        <link rel="stylesheet" type="" href="../../Recursos/Librerias/Css/estilosCliente.css">
        <link rel="stylesheet" type="" href="../../Recursos/Librerias/Css/estilosProductosC.css">
        <link href="../../Recursos/Librerias/fontawesome/css/all.css" rel="stylesheet" type="text/css"/>
        <link href="../../Recursos/Librerias/fontawesome/css/fontawesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../Recursos/Librerias/iChek/_all-skins.min.css" rel="stylesheet" type="text/css"/>
        <link rel="shortcut icon" type="image/x-icon" href="../../Recursos/Img/logo.png">
        
        
        <script src="../../Recursos/Librerias/Jquery/jquery-1.7.2.min.js"></script>
        <script type="text/javascript" src="../../Recursos/Librerias/Js/Efectos.js"></script>
        <script type="text/javascript" src="../../Recursos/Librerias/Js/Funciones.js"></script>
        <script type="text/javascript" src="../../Recursos/Librerias/Js/FuncionesCliente.js"></script>
    </head>

    <body>
        <header class="principal"><?php include "../VistaCliente/Encabezado.php" ?></header>	
        <nav class="principal"><?php include "../VistaCliente/menu.php" ?></nav>	
        <section class="principal"><?php include $pg . ".php" ?></section>       
        <footer class="principal"><?php include "../VistaCliente/piePagina.php" ?></footer>

        <script src="../../Recursos/Librerias/Jquery/external/jquery/jquery.js"></script>
        <script src="../../Recursos/Librerias/Jquery/jquery.min.js" type="text/javascript"></script>
        <script src="../../Recursos/Librerias/iChek/icheck.min.js" type="text/javascript"></script>
        <script src="../../Js/bootstrap.min.js"></script> 
    </body>
</html>