<?php
session_start();

if (!isset($_SESSION['idCliente'])) {
    header("location:../../");
}

?>

<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Perfil Usuario</title>
	<link href="../../Recursos/Librerias/Css/style.css" rel='stylesheet' type='text/css'/>
	<link href="//fonts.googleapis.com/css?family=Alegreya+Sans" rel="stylesheet">
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="keywords" content="Easy Profile Widget Widget Responsive, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design" />
		<link rel="stylesheet" type="text/css" href="../../Recursos/Librerias/Css/bootstrap.css">
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		<script src="../../Recursos/Librerias/Jquery/jquery-1.11.1.min.js"></script> 
		<script src="../../Recursos/Librerias/Jquery/Chart.js"></script>
		<script src="../../Recursos/Librerias/Js/FuncionesCliente.js"></script>
		<script src="../../Recursos/Librerias/Jquery/external/jquery/jquery.js"></script>


</head>
<body>
<div class="main-agile col-sm-6">
	<div class="profile-agileits">
		
		<div class="profile-bottom-w3">
			<div class="profile-bottom-w3-part1 ">
				<div class="profile-bottom-w3-part1-left ">
					<div class="image">
						<img src="../../Recursos/Img/man.jpg" alt=" " />
					</div>
				</div>
				<div style="margin-top: 3%" class="profile-bottom-w3-part1-right h2">
					<h2>PERFIL</h2>
				</div>
				<div class="clear"></div>
			</div>
			<div class="profile-bottom-w3-part2">
	<form id="formularioPerfilCliente" method="post">
	<input type="hidden" name="txtIdCliente" id="txtIdCliente">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Identificacion</label>
      <input type="text" class="form-control" id="txtIdentificacion" disabled>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Nombres</label>
      <input type="text" class="form-control" readonly id="txtNombres" disabled>
    </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-6">
    <label for="inputAddress">Apellidos</label>
    <input type="text" class="form-control" id="txtApellidos" disabled>
  </div>
  <div class="form-group col-md-6">
    <label for="inputAddress2">Correo</label>
    <input type="email" class="form-control" id="txtCorreo" disabled>
  </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">Telefono</label>
      <input type="text" class="form-control" id="txtTelefono" disabled>
    </div>
    <div class="form-group col-md-6">
      <label for="inputZip">Direccion</label>
      <input type="text" class="form-control" id="txtDireccion" disabled>
    </div>
  </div>
  
</form>
				</div>
				<div class="clear"></div>
			</div>
		</div>
		<div class="row">
		<a style="margin-bottom: 5%; margin-left: 10%" href="" class="btn btn-danger">Editar</a>
		<a style="margin-bottom: 5%; margin-left: 16%" href="" class="btn btn-danger">Guardar</a>
		<a style="margin-bottom: 5%; margin-left: 20%" href="" class="btn btn-danger">Eliminar</a>
		</div>
	</div>
	


</body>
</html>