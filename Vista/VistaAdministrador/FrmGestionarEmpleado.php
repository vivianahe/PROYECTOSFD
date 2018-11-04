<?php
session_start();
extract($_REQUEST);
if (!isset($_SESSION['idAdmin'])) {
    header("location:../../");
}
error_reporting(1);
?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card" id="cajaPrincipal" style="background: #f3f4f7">
                    <center><h3 id="TituloEmpleados"><b>Empleados</b></h3></center>
                    <div>
                        <a href="?pg=FrmAgregarEmpleado"><button type="button" class="btn btn-primary" id="btnEmpleadoNuevo" data-toggle="modal" data-target="#exampleModal">
                                Agregar <i class="fas fa-user-plus"></i>
                            </button></a>
                    </div>
                </div>
                <br>
                <!-- Modal -->
                <form id="formularioEmpleado" class="form" method="post">
                    <div class="table-responsive">
                        <div id="tblEmpleados"></div>
                    </div>
                    <div class="modal fade" id="modalEditarEmpleado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLa
                         bel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"><b>Editar empleado</b></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" name="txtIdEmpleadoM" id="txtIdEmpleadoM" >
                                     <input type="hidden" name="opcion" value="5">
                                    <div class="form-group row justify-content-center">
                                        <label class="control-label col-md-3">Identificación:</label>
                                        <div class="col-md-6">
                                        <div id="mensaje"></div>
                                            <input class="form-control" onkeypress="inputNumero(event)" type="text" name="txtIdentificacionM" id="txtIdentificacionM"required>
                                        </div>
                                    </div>
                                    <div class="form-group row justify-content-center"> 
                                        <label class="control-label col-md-3">Nombre:</label>
                                        <div class="col-md-6">
                                            <input class="form-control" type="text" name="txtNombreM" id="txtNombreM" required>
                                        </div>  
                                    </div>
                                    <div class="form-group row justify-content-center"> 
                                        <label class="control-label col-md-3">Apellido:</label>
                                        <div class="col-md-6">
                                            <input class="form-control" type="text" name="txtApellidoM" id="txtApellidoM" required>
                                        </div>
                                    </div>
                                    <div class="form-group row justify-content-center">
                                        <label class="control-label col-md-3">Teléfono:</label>
                                        <div class="col-md-6">
                                            <input class="form-control" type="text" name="txtTelefonoM" id="txtTelefonoM" required>
                                        </div>
                                    </div>
                                    <div class="form-group row justify-content-center"> 
                                        <label class="control-label col-md-3">Dirección:</label>
                                        <div class="col-md-6">
                                            <input class="form-control" type="text" name="txtDireccionM" id="txtDireccionM" required>
                                        </div>  
                                    </div>
                                    <div class="form-group row justify-content-center"> 
                                        <label class="control-label col-md-3">Correo:</label>
                                        <div class="col-md-6">
                                            <input class="form-control" type="email" name="txtCorreoM" id="txtCorreoM" required>
                                        </div>
                                    </div>
                                    <div class="form-group row justify-content-center" >
                                        <label class="control-label col-md-3">Cargo:</label>
                                        <div class="col-md-6">
                                            <select class="custom-select" id="cbCargoM" name="cbCargoM">
                                                <option value="Administrador">Administrador</option>
                                                <option value="Empleado">Empleado</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row justify-content-center">
                                        <label class="control-label col-md-3">Estado:</label>
                                        <div class="col-md-6">
                                            <select class="custom-select" disabled id="cbEstadoM" name="cbEstadoM">
                                                <option value="Activo">Activo</option>
                                                <option value="Inactivo">Inactivo</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    <button type="button" class="btn btn-dark" data-dismiss="modal" id="btnActualizarM">Actualizar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- end content-->
    </div>
    <!--  end card  -->
</div>
