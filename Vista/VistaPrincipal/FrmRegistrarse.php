<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="../../Recursos/Librerias/Css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="../../Recursos/Librerias/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="../../Recursos/Librerias/Ionicons/css/ionicons.min.css" rel="stylesheet" type="text/css"/>
    <link href="../../Recursos/Librerias/Css/AdminLTE.min.css" rel="stylesheet" type="text/css"/>
    <link href="../../Recursos/Librerias/Css/estilos.css" rel="stylesheet" type="text/css"/>
    <link href="../../Recursos/Librerias/Jquery/jquery-ui.css" rel="stylesheet" type="text/css"/>
    <script src="../../Recursos/Librerias/Jquery/external/jquery/jquery.js" type="text/javascript"></script>
    <script src="../../Recursos/Librerias/Jquery/jquery-ui.js" type="text/javascript"></script>
    <script src="../../Js/Funciones.js" type="text/javascript"></script>

</head>

<br>
<body id="FrmRegistrar">
    <form action="../../Controlador/CtrlCliente.php" method="post">
        <div class="formulario">
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 id="tituloRegistrarse" class="box-title"><b>Registrarse</b></h3>
                </div>
                <div class="box-body">
                    <!-- Identificacion -->
                    <div class="form-group">
                        <input  name="opcion" type="hidden" value="1">
                        <label>Identificación:</label>

                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-list-alt"></i></span>
                            </div>
                            <input type="text" class="form-control" name="txtIdentificacion" id="txtIdentificacion" required="required">

                        </div>
                       <div id="mensaje">
                        </div>
                        <!-- /.input group -->
                    </div>
                    <!-- /.form group -->

                    <!-- Nombres -->
                    <div class="form-group">
                        <label>Nombres:</label>

                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-edit "></i></span>
                            </div>
                            <input type="text" class="form-control" name="txtNombres" id="txtNombres" required="required" >
                        </div>
                        <!-- /.input group -->
                    </div>
                    <!-- /.form group -->

                    <!-- Apellidos -->
                    <div class="form-group">
                        <label>Apellidos:</label>

                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-edit "></i></span>
                            </div>
                            <input type="text" class="form-control" name="txtApellidos" id="txtApellidos" required="required">
                        </div>
                        <!-- /.input group -->
                    </div>
                    <!-- /.form group -->

                    <!-- Télefono -->
                    <div class="form-group">
                        <label>Teléfono:</label>

                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-phone"></i></span>
                            </div>
                            <input type="tel"  pattern="[0-9]{10}" name="txtTelefono" id="txtTelefono" class="form-control" required="required">
                        </div>
                        <!-- /.input group -->
                    </div>
                    <!-- /.form group -->

                    <!-- Dirección -->
                    <div class="form-group">
                        <label>Dirección:</label>

                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa  fa-map"></i></span>
                            </div>
                            <input type="text" name="txtDireccion" id="txtDireccion" class="form-control" required="required">
                        </div>
                        <!-- /.input group -->
                    </div>
                    <!-- /.form group -->

                    <!--  Correo -->
                    <div class="form-group">
                        <label>Correo: </label>

                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa  fa-envelope"></i></span>
                            </div>
                            <input type="email" name="txtCorreo" id="txtCorreo" class="form-control" required="required">
                        </div>
                        <div id="mensajeCorreo">
                        </div>
                        <!-- /.input group -->
                    </div>
                    <!-- /.form group -->

                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <a href="../../index.php"><button type="button" class="btn btn-default">Cancelar</button></a>
                    <button type="submit" class="btn btn-warning pull-right">Enviar</button>
                </div>
            </div>
            <!-- /.box -->


        </div>
    </form>
</body>