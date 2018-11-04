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
                        <h4 class="card-title" id="tituloFa"><b> Registros pedidos</b></h4>
                    </div>
                      <div class="input-group" id="buscar" >
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-search"></i></span>
                        </div>
                        <input type="search" class="form-control form-control-md" placeholder="Buscar" aria-controls="datatables">
                    </div>
                    <label id="opciones">Mostrar</label>
                    <div class="dataTables_length" id="datatablesEnca">

                        <select name="datatables_lenght" aria-controls="datatables" class="custom-select custom-select-sm form-control form-control-sm">
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                    </div>
                    <br>


                </div>
                <div class="card-body">
                    <div class="toolbar">
                        <!--        Here you can write extra buttons/actions for the toolbar              -->
                    </div>
                    <div class="table-responsive">
                        <table id="tbReportes" class="table  table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead><center>
                                <tr>
                                    <th class="text-center">N°</th>
                                    <th class="text-center">Fecha & Hora</th>
                                    <th class="text-center">Cliente</th>
                                    <th class="text-center">Producto</th>
                                    <th class="text-center">Valor</th>
                                    <th class="text-center">Negocio/Domicilio</th>
                                    <th class="text-center">Estado</th>
                                </tr>
                            </center> </thead>
                            <tbody>
                                <tr class="table-success">
                                    <td  class="text-center">1</td>
                                    <td  class="text-center">29/09/2018 6:55</td>
                                    <td  class="text-center">Juan Perez</td>
                                    <td  class="text-center">Perro caliente
                                        ...</td>
                                    <td  class="text-center">$ 16.000</td>
                                    <td  class="text-center">Negocio</td>
                                    <td   <td  class="text-center">
                                        <select class="form-control form-control-sm">
                                            <option >Entregado</option>
                                            <option>Cancelado</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr class="table-success">
                                    <td  class="text-center">2</td>
                                    <td  class="text-center">29/09/2018 6:55</td>
                                    <td  class="text-center">Karla Tovar</td>
                                    <td  class="text-center">Hamburguesa,perro caliente
                                        ...</td>
                                    <td  class="text-center">$ 16.000</td>
                                    <td  class="text-center">Negocio</td>
                                    <td   <td  class="text-center">
                                        <select class="form-control form-control-sm">
                                            <option selected="true" >Entregado</option>
                                            <option>Cancelado</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr class="table-danger">
                                    <td  class="text-center">3</td>
                                    <td  class="text-center">29/09/2018 6:55</td>
                                    <td  class="text-center">Tomas Torrez</td>
                                    <td  class="text-center">Hamburguesa,perro caliente
                                        ...</td>
                                    <td  class="text-center">$ 16.000</td>
                                    <td  class="text-center">Negocio</td>
                                    <td   <td  class="text-center">
                                        <select class="form-control form-control-sm">
                                            <option>Entregado</option>
                                            <option selected="true" >Cancelado</option>
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
<br>
<div class="row" id="numeros">
    <div class="dataTables_paginate paging_full_numbers" id="datatables_paginate">
        <ul class="pagination">

            <li class=" pagination_button page-item previous " id="datatables_previous">
                <a href="#" aria-controls="datatables" data-dt-idx="1" tabindex="0" class="page-link">&larr;Anterior </a>
            </li>

            <li class="pagination_button page-item active">
                <a href="#" aria-controls="datatables" data-dt-idx="2" tabindex="0" class="page-link">1 </a>
            </li>
            <li class="pagination_button page-item ">
                <a href="#" aria-controls="datatables" data-dt-idx="3" tabindex="0" class="page-link">2 </a>
            </li>
            <li class="pagination_button page-item ">
                <a href="#" aria-controls="datatables" data-dt-idx="4" tabindex="0" class="page-link">3 </a>
            </li>
            <li class="pagination_button page-item ">
                <a href="#" aria-controls="datatables" data-dt-idx="5" tabindex="0" class="page-link">4 </a>
            </li>
            </li>
            <li class="pagination_button page-item next" id="datatables_next">
                <a href="#" aria-controls="datatables" data-dt-idx="6" tabindex="0" class="page-link">Siguiente &rarr; </a>
            </li>

            </li>
        </ul>
    </div>
</div>
