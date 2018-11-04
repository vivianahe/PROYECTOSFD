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
                <div class="card" id="cajaPrincipal">
                    <div class="card-header card-header-primary card-header-icon">
                        <br>
                        <h4 class="card-title" id="tituloFa"><b>Nuevos pedidos</b></h4>
                        <a type="button" href="?pg=FrmListaPedidos" class="btn btn-success" id="agregarMas">
                            Lista pedidos <i class="fas fa-plus-circle"></i>
                        </a>
                    </div>


                </div>
                <div class="card-body">
                    <div class="toolbar">
                        <!--        Here you can write extra buttons/actions for the toolbar              -->
                    </div>
                    <div class="table-responsive">
                        <table class="table table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-center">Fecha & Hora</th>
                                    <th class="text-center">Cliente</th>
                                    <th class="text-center">Producto</th>
                                    <th class="text-center">Dirección</th>
                                    <th class="text-center">Valor</th>
                                    <th class="text-center">Numero de pedido</th>
                                    <th class="text-center">Estado del pedido</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr id="fila">
                                    <td class="text-center"id="fechaHora"></td>
                                    <td class="text-center" id="cliente"></td>
                                    <td class="text-center" id="producto"></td>
                                    <td class="text-center" id="direccion"></td>
                                    <td class="text-center" id="valorTotal"></td>
                                    <td class="text-center" id="numPedido"></td>
                                    <td  class="text-center">
                                        <select class="custom-select" id="cbEstadoP" name="cbEstadoP">
                                                <option value="Solicitado">Solicitado</option>
                                                <option value="En proceso">En proceso</option>
                                                <option value="Entregado">Entregado</option>
                                                <option value="Cancelado">Cancelado</option>
                                            </select>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
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
