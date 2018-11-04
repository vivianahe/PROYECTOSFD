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
                        <div class="card-icon bg-red-active" id="icono">
                            <i class=" fa fa-file fa-2x"></i> 
                        </div>
                        <h2 class="card-title" id="tituloFa"><b>Facturación</b></h2>
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
                    <div>
                        <button type="button" class="btn btn-secondary" id="agregarMas" data-toggle="modal" data-target="#exampleModal">
                            Nueva <i class="fas fa-plus-circle"></i>
                        </button>

                    </div>
                </div>
                <div class="card-body">
                    <div class="toolbar">
                        <!--        Here you can write extra buttons/actions for the toolbar              -->
                    </div>
                    <div class="material-datatables">
                        <table id="tbReportes" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead><center>
                                <tr>
                                    <th class="text-center">N°</th>
                                    <th class="text-center">Fecha & Hora</th>
                                    <th class="text-center">Cliente</th>
                                    <th class="text-center">Producto</th>
                                    <th class="text-center">Valor</th>
                                    <th class="text-center">Negocio/Domicilio</th>
                                    <th class="text-center">Opciones</th>
                                </tr>
                            </center> </thead>
                            <tbody>
                                <tr>
                                    <td  class="text-center">1</td>
                                    <td  class="text-center">29/09/2018 6:55</td>
                                    <td  class="text-center">Juan Perez</td>
                                    <td  class="text-center">Hamburguesa,perro caliente
                                        ...</td>
                                    <td  class="text-center">$ 16.000</td>
                                    <td  class="text-center">Negocio</td>
                                    <td   <td  class="text-center">
                                        <a href="#" class="btn btn-secondary btn-just-icon like"><i class="fas fa-file-pdf"></i></a>
                                        <a href="#" class="btn btn- btn-success btn-just-icon edit"><i class="fas fa-file-excel"></i></a>
                                        <a href="#" class="btn btn-danger btn-danger btn-just-icon remove"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td  class="text-center">2</td>
                                    <td  class="text-center">09/08/2018 10:55</td>
                                    <td  class="text-center">Marta Gomez</td>
                                    <td  class="text-center">arepas rellenas...</td>
                                    <td  class="text-center">$ 20.000</td>
                                    <td  class="text-center">Domicilio</td>
                                    <td  class="text-center">
                                        <a href="#" class="btn btn-secondary btn-just-icon like"><i class="fas fa-file-pdf"></i></a>
                                        <a href="#" class="btn btn- btn-success btn-just-icon edit"><i class="fas fa-file-excel"></i></a>
                                        <a href="#" class="btn btn-danger btn-danger btn-just-icon remove"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td  class="text-center">3</td>
                                    <td  class="text-center">11/07/2018 08:30</td>
                                    <td  class="text-center">Tomar Muñoz</td>
                                    <td  class="text-center">Gaseoa..</td>
                                    <td  class="text-center">$ 3.000</td>
                                    <td  class="text-center">Negocio</td>
                                    <td  class="text-center">
                                        <a href="#" class="btn btn-secondary btn-just-icon like"><i class="fas fa-file-pdf"></i></a>
                                        <a href="#" class="btn btn- btn-success btn-just-icon edit"><i class="fas fa-file-excel"></i></a>
                                        <a href="#" class="btn btn-danger btn-danger btn-just-icon remove"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>


                            <td  class="text-center">4</td>
                            <td  class="text-center">29/09/2018 6:55</td>
                            <td  class="text-center">Juan Perez</td>
                            <td  class="text-center">Hamburguesa,perro caliente
                                ...</td>
                            <td  class="text-center">$ 16.000</td>
                            <td  class="text-center">Negocio</td>
                            <td   <td  class="text-center">
                                <a href="#" class="btn btn-secondary btn-just-icon like"><i class="fas fa-file-pdf"></i></a>
                                <a href="#" class="btn btn- btn-success btn-just-icon edit"><i class="fas fa-file-excel"></i></a>
                                <a href="#" class="btn btn-danger btn-danger btn-just-icon remove"><i class="fa fa-trash"></i></a>
                            </td>
                            </tr>
                            <tr>
                                <td  class="text-center">5</td>
                                <td  class="text-center">09/08/2018 10:55</td>
                                <td  class="text-center">Marta Gomez</td>
                                <td  class="text-center">arepas rellenas...</td>
                                <td  class="text-center">$ 20.000</td>
                                <td  class="text-center">Domicilio</td>
                                <td  class="text-center">
                                    <a href="#" class="btn btn-secondary btn-just-icon like"><i class="fas fa-file-pdf"></i></a>
                                    <a href="#" class="btn btn- btn-success btn-just-icon edit"><i class="fas fa-file-excel"></i></a>
                                    <a href="#" class="btn btn-danger btn-danger btn-just-icon remove"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td  class="text-center">6</td>
                                <td  class="text-center">11/07/2018 08:30</td>
                                <td  class="text-center">Tomar Muñoz</td>
                                <td  class="text-center">Gaseoa..</td>
                                <td  class="text-center">$ 3.000</td>
                                <td  class="text-center">Negocio</td>
                                <td  class="text-center">
                                    <a href="#" class="btn btn-secondary btn-just-icon like"><i class="fas fa-file-pdf"></i></a>
                                    <a href="#" class="btn btn- btn-success btn-just-icon edit"><i class="fas fa-file-excel"></i></a>
                                    <a href="#" class="btn btn-danger btn-danger btn-just-icon remove"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>


                            <td  class="text-center">7</td>
                            <td  class="text-center">29/09/2018 6:55</td>
                            <td  class="text-center">Juan Perez</td>
                            <td  class="text-center">Hamburguesa,perro caliente
                                ...</td>
                            <td  class="text-center">$ 16.000</td>
                            <td  class="text-center">Negocio</td>
                            <td   <td  class="text-center">
                                <a href="#" class="btn btn-secondary btn-just-icon like"><i class="fas fa-file-pdf"></i></a>
                                <a href="#" class="btn btn- btn-success btn-just-icon edit"><i class="fas fa-file-excel"></i></a>
                                <a href="#" class="btn btn-danger btn-danger btn-just-icon remove"><i class="fa fa-trash"></i></a>
                            </td>
                            </tr>
                            <tr>
                                <td  class="text-center">8</td>
                                <td  class="text-center">09/08/2018 10:55</td>
                                <td  class="text-center">Marta Gomez</td>
                                <td  class="text-center">arepas rellenas...</td>
                                <td  class="text-center">$ 20.000</td>
                                <td  class="text-center">Domicilio</td>
                                <td  class="text-center">
                                    <a href="#" class="btn btn-secondary btn-just-icon like"><i class="fas fa-file-pdf"></i></a>
                                    <a href="#" class="btn btn- btn-success btn-just-icon edit"><i class="fas fa-file-excel"></i></a>
                                    <a href="#" class="btn btn-danger btn-danger btn-just-icon remove"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td  class="text-center">9</td>
                                <td  class="text-center">11/07/2018 08:30</td>
                                <td  class="text-center">Tomar Muñoz</td>
                                <td  class="text-center">Gaseoa..</td>
                                <td  class="text-center">$ 3.000</td>
                                <td  class="text-center">Negocio</td>
                                <td  class="text-center">
                                    <a href="#" class="btn btn-secondary btn-just-icon like"><i class="fas fa-file-pdf"></i></a>
                                    <a href="#" class="btn btn- btn-success btn-just-icon edit"><i class="fas fa-file-excel"></i></a>
                                    <a href="#" class="btn btn-danger btn-danger btn-just-icon remove"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>

                            <td  class="text-center">10</td>
                            <td  class="text-center">29/09/2018 6:55</td>
                            <td  class="text-center">Juan Perez</td>
                            <td  class="text-center">Hamburguesa,perro caliente
                                ...</td>
                            <td  class="text-center">$ 16.000</td>
                            <td  class="text-center">Negocio</td>
                            <td   <td  class="text-center">
                                <a href="#" class="btn btn-secondary btn-just-icon like"><i class="fas fa-file-pdf"></i></a>
                                <a href="#" class="btn btn- btn-success btn-just-icon edit"><i class="fas fa-file-excel"></i></a>
                                <a href="#" class="btn btn-danger btn-danger btn-just-icon remove"><i class="fa fa-trash"></i></a>
                            </td>
                            </tr>
                            <tr>
                                <td  class="text-center">11</td>
                                <td  class="text-center">09/08/2018 10:55</td>
                                <td  class="text-center">Marta Gomez</td>
                                <td  class="text-center">arepas rellenas...</td>
                                <td  class="text-center">$ 20.000</td>
                                <td  class="text-center">Domicilio</td>
                                <td  class="text-center">
                                    <a href="#" class="btn btn-secondary btn-just-icon like"><i class="fas fa-file-pdf"></i></a>
                                    <a href="#" class="btn btn- btn-success btn-just-icon edit"><i class="fas fa-file-excel"></i></a>
                                    <a href="#" class="btn btn-danger btn-danger btn-just-icon remove"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td  class="text-center">12</td>
                                <td  class="text-center">11/07/2018 08:30</td>
                                <td  class="text-center">Tomar Muñoz</td>
                                <td  class="text-center">Gaseoa..</td>
                                <td  class="text-center">$ 3.000</td>
                                <td  class="text-center">Negocio</td>
                                <td  class="text-center">
                                    <a href="#" class="btn btn-secondary btn-just-icon like"><i class="fas fa-file-pdf"></i></a>
                                    <a href="#" class="btn btn- btn-success btn-just-icon edit"><i class="fas fa-file-excel"></i></a>
                                    <a href="#" class="btn btn-danger btn-danger btn-just-icon remove"><i class="fa fa-trash"></i></a>
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

<!-- Modal -->
<div class="modal bd-example-modal-lg" id="exampleModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <center><h4 class="modal-title"><strong>Nueva factura</strong></h4></center>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="box-body">

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Fecha & hora:</label>
                            <div class="col-sm-5">
                                <input type="date" class="form-control" disabled id="txtFechaPedido">
                            </div>
                            <label class="col-sm-1 col-form-label">N°:</label>
                            <div class="col-sm-3">
                                <input type="number" class="form-control"  disabled id="txtNumeroFactura">
                            </div>

                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Cliente:</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="txtClientePedido">
                            </div>
                            <label class="col-sm-1 col-form-label">Tipo:</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" disabled id="txtTipo">
                            </div>
                        </div>
                        <center><p><label><b><h5> Productos</h5></b></label></p></center>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"  >Categorias:</label>
                            <div class="col-sm-3">
                                <select class="custom-select custom-select-sm form-control form-control-sm">
                                    <option  selected="true" value="">Seleccione</option>
                                    <option value="">Hamburguesa</option>
                                    <option value="">Perro caliente</option>
                                    <option value="">Sandwiches</option>
                                    <option value="">Arepas rellenas</option>
                                    <option value="">Bebidas</option>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <select class="custom-select custom-select-sm form-control form-control-sm">
                                    <option value=""></option>
                                </select>
                            </div>
                            <label class="col-sm-1 col-form-label ">Cantidad:</label>
                            <div class="col-sm-2" id="categoriaFM">
                                <input type="number" class="form-control" >

                            </div>
                        </div>
                        <div>
                            <center>
                                   <i class="fas fa-plus-circle fa-2x"></i>
                                   <i class="fas fa-minus-circle fa-2x"></i>
                            </center>

                        </div>
                        <br>
                        <div class="from-group">
                            <textarea class="form-control" rows="4" disabled>
                           
                            </textarea>
                        </div>
                        <br>

                        <div class="form-group row">
                            <div class="col">
                                <label class="col-sm-4 col-form-label ">Total:</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control col-sm-6" >
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <center><div class="box-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="button" class="btn btn-primary">Imprimir</button>
                            </div></center>
                        <!-- /.box -->
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>

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

