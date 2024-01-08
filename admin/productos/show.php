<?php
include('../../app/config.php');
include('../layout/parte1.php');

$id_producto = $_GET['id_producto'];
include('../../app/controlador/productos/verProductosControlador.php');

?>


<div class="container-fluid">
    <h1>Ver Producto</h1>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-success">
                <div class="card-header">
                    <h3 class="card-title">Datos del Producto</h3>

                </div>

                <div class="card-body">


                    <div class="row">
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="codigo">Código</label>
                                        <input type="text" class="form-control" value="<?= $codigo; ?>" placeholder="Código del Producto" disabled>

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="codigo">Nombre del producto</label>
                                        <input type="text" name="nombre_producto" id="nombre_producto" class="form-control" value="<?= $nombre_producto; ?>" placeholder="Nombre del Producto" disabled>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="codigo">Descripción del producto</label>
                                        <input type="text" name="descripcion" id="descripcion" value="<?= $descripcion; ?>" class="form-control" placeholder="Descripción del Producto" disabled>

                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="stock">Stock</label>
                                        <input type="number" name="stock" id="stock" value="<?= $stock; ?>" class="form-control" disabled>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="stock_minimo">Stock Mínimo</label>
                                        <input type="number" name="stock_minimo" id="stock_minimo" value="<?= $stock_minimo; ?>" class="form-control" disabled>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="stock_maximo">Stock Máximo</label>
                                        <input type="number" name="stock_maximo" id="stock_maximo" value="<?= $stock_maximo; ?>" class="form-control" disabled>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="precio_compra">Precio Compra</label>
                                        <input type="number" step="0.01" name="precio_compra" value="<?= $precio_compra; ?>" id="precio_compra" class="form-control" disabled>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="precio_venta">Precio Venta</label>
                                        <input type="number" step="0.01" name="precio_venta" value="<?= $precio_venta; ?>" id="precio_venta" class="form-control" disabled>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="fecha_de_ingreso">Fecha de Ingreso</label>
                                        <input type="text" name="fecha_de_ingreso" id="fecha_de_ingreso" value="<?= $fecha_de_ingreso; ?>" class="form-control" disabled>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="stock">Usuario que registró el Producto</label>
                                        <input class="form-control" type="text" name="id_usuario" value="<?= $nombre_completo; ?>" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="file">Imagen del producto</label>
                                <br>
                                <center>
                                    <img src="<?= $URL . "/public/img/productos/" . $imagen; ?>" width="200px" alt="">
                                </center>

                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12 ml-3 mb-2">
                            <a href="index.php" class="btn btn-danger">Regresar</a>

                        </div>
                    </div>
                </div>



            </div>

        </div>
    </div>

</div>


<?php include('../layout/parte2.php');
include('../layout/mensaje.php'); ?>