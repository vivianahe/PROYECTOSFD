

<a name="inicio"></a>
<section class="jumbotron" id="indexEnca">

    <div class="container">

        <div class="logo">
            <input type="image" name="" src="Recursos/Img/logo.png" style="width: 150px;height: 150px;">
        </div>

        <h1 class="SFD">Sistema de facturación y domicilios</h1>
        <p></p>

        <!-- Button trigger modal -->


        <!-- Modal -->
        <div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="cuerpo">


                            <div class="login-box">
                                <!-- /.login-logo -->
                                <div class="login-box-body">
                                    <label id="iniciarSesionTitulo" style="color:#000"><b>Iniciar sesión</b></label>
                                    <p class="login-box-msg"></p>

                                    <form action="Controlador/CtrlIniciarSesion.php" method="post">
                                        <!-- Usuario-->
                                        <div class="TxtUsuPass">
                                            <div class="form-group">
                                                <div class="input-group col-md-10">
                                                    <input  type="hidden" name="opcion" value="2">
                                                    <input class="form-control" placeholder="Usuario" type="text" name="txtLogin" id="txtLogin">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"> <i class="fa fa-user"></i></span>
                                                    </div>
                                                </div>
                                                <!-- /.input group -->
                                            </div>
                                            <!-- Contraseña-->
                                            <div class="form-group">
                                                <div class="input-group col-md-10" >

                                                    <input class="form-control" placeholder="Contraseña" type="password" name="txtPassword" id="txtPassword">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"> <i class="fas fa-unlock-alt"></i></span>
                                                    </div>
                                                </div>
                                                <!-- /.input group -->
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-8">
                                                <div class="checkbox icheck">
                                                    <label class="">
                                                        <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false" style="position: relative;"><input type="checkbox" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> Recordar
                                                    </label>
                                                </div>
                                            </div>
                                            <!-- /.col -->

                                            <!-- /.col -->
                                        </div>
                                        <div>
                                            <button type="submit"  class="btn btn btn-block btn-flat" >Enviar</button>
                                        </div>
                                    </form>
                                    <a href="#">Olvidé mi contraseña</a><br><br>

                                    <div id="redesSociales" class="social-auth-links text-center col-md-10">

                                        <a href="#" class="btn btn-block btn-social btn-facebook"><i class="fa fa-facebook"></i> Iniciar Sesion con Facebook</a>
                                        <a href="#" class="btn btn-block btn-social btn-google"><i class="fa fa-google-plus"></i> Iniciar Sesion con Google</a>
                                    </div>
                                    <!-- /.social-auth-links -->

                                    <br>

                                    <div class="col-md-10 boton">
                                        <a href="Vista/VistaPrincipal/FrmRegistrarse.php"><button type="button" id="boton2" class="btn btn btn-block btn-flat" >Registrarse</button></a>
                                    </div>


                                </div>

                            </div>

                            <!-- /.login-box -->
                        </div>
                        <!-- jQuery 3 -->


                        <script>
                            $(function () {
                                $('input').iCheck({
                                    checkboxClass: 'icheckbox_square-blue',
                                    radioClass: 'iradio_square-blue',
                                    increaseArea: '20%' /* optional */
                                });
                            });
                        </script>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

    <button type="button" id="btnIniciarSes" class="btn btn-default btn-flat" data-toggle="modal" data-target="#myModal"  >
        Iniciar sesión
    </button>



</div>
</section>