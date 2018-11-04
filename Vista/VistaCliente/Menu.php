<link rel="stylesheet" href="../../Recursos/Librerias/Css/estilosCliente.css">

    <nav class="navbar navbar-expand-lg navbar-dark  bg " id="menu">
      
 
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="margenMenu">
          <div class="TodoMenu">
            
          
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
              <div class="ListaMenuCli">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                      <a href="index.php"><input type="image" name="" src="../../Recursos/Img/logo.png" style="width: 50px;height: 50px;"></a>
                    </li>
                    <li id="nombreC">
                      <a class="navbar-brand" style="font-size: 18px; color: black"><b>CLIENTE</b></a>
                    </li>
                    <li class="nav-item active">
                      <a class="nav-link" href="?pg=FrmCategoriasDos">Productos<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                      <a class="nav-link" href="?pg=FrmMiPedido">Mi Pedido<span class="sr-only">(current)</span></a>
                    </li>
                </div>
                <div class="ListaMenu">
                  <div class="perfilCliente">
              <form class="nav-item dropdown Perfil">
                <a class="nav-link dropdown-toggle" id="letra" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Perfil
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" id="tamañoC">
                  <center><p style="color: white;"><?php echo $_SESSION['nombreCliente']?></p></center>
                  <center>
                  <div>
                     <img src="../../Recursos/Img/Icono.JPG">
                  </div>
                  </center>
                  <div class="form-group">
                    <a class="btn " href="?pg=frmPerfil" id="BotonPerfil">Mi perfil</a>
                    <a class="btn " href="../Salir.php" id="BotonCerrarSesionC">Cerrar Sesión <i class="fas fa-sign-out-alt"></i></a>
                  </div>
                  </ul>
                </div>
              </form>
          </div>
          </div>
            </div>
        </div>
      </div>
</nav>
