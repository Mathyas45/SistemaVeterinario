<?php
include('../../app/config.php');
include('../layout/parte1.php');
include('../../app/controlador/productos/listadoProductosControlador.php');

?>
<?php
$contador = 1;
foreach ($productos as $producto) {
    $contador = $contador + 1;
}
function ceros($numero)
{
    $len = 0;
    $cantidad_ceros = 5;
    $aux = $numero;
    $pos = strlen($numero);
    $len = $cantidad_ceros - $pos;
    for ($i = 0; $i < $len; $i++) {
        $aux = "0" . $aux;
    }
    return $aux;
}
?>

<div class="container-fluid">
    <h1>Crear Nuevo Producto</h1>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Introducir datos del Producto</h3>

                </div>

                <div class="card-body">

                    <form action="../../app/controlador/productos/createProductosControlador.php" method="post" enctype="multipart/form-data">

                        <div class="row">
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="codigo">Código</label>
                                            <input type="text"  class="form-control" value="P-<?= ceros($contador); ?>" placeholder="Código del Producto" disabled>
                                            <input type="text" name="codigo" id="codigo" class="form-control" value="P-<?= ceros($contador); ?>" placeholder="Código del Producto" hidden>

                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="codigo">Nombre del producto</label><b>*</b>
                                            <input type="text" name="nombre_producto" id="nombre_producto" class="form-control" placeholder="Nombre del Producto" required>
                                            <input type="text" name="id_usuario" value="<?= $id_usuario_sesion; ?>" hidden>
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="codigo">Descripción del producto</label>
                                            <input type="text" name="descripcion" id="descripcion" class="form-control" placeholder="Descripción del Producto">

                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="stock">Stock</label><b>*</b>
                                            <input type="number" name="stock" id="stock" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="stock_minimo">Stock Mínimo</label><b>*</b>
                                            <input type="number" name="stock_minimo" id="stock_minimo" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="stock_maximo">Stock Máximo</label>
                                            <input type="number" name="stock_maximo" id="stock_maximo" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="precio_compra">Precio Compra</label><b>*</b>
                                            <input type="number" step="0.01" name="precio_compra" id="precio_compra" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="precio_venta">Precio Venta</label><b>*</b>
                                            <input type="number" step="0.01" name="precio_venta" id="precio_venta" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="fecha_de_ingreso">Fecha de Ingreso</label><b>*</b>
                                            <input type="date" name="fecha_de_ingreso" id="fecha_de_ingreso" class="form-control" required>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="file">Imagen del producto</label>
                                    <input type="file" name="file" id="file" class="form-control">
                                    <br>
                                    <center>
                                        <output id="list"></output>
                                    </center>

                                </div>
                            </div>
                        </div>
                <hr>

                        <div class="row">
                    <div class="col-md-12 ml-3 mb-2">
                        <a href="index.php" class="btn btn-danger">Cancelar</a>
                        <input type="submit" class="btn btn-primary" value="Registrar Producto">

                    </div>
                </div>
                </form>
                </div>
              

            </div>

        </div>
    </div>

</div>


<?php include('../layout/parte2.php');
include('../layout/mensaje.php'); ?>

<script>
    function archivo(evt) {
        var files = evt.target.files; // FileList object
        // Obtenemos la imagen del campo "file".
        for (var i = 0, f; f = files[i]; i++) {
            //Solo admitimos imágenes.
            if (!f.type.match('image.*')) {
                continue;
            }
            var reader = new FileReader();
            reader.onload = (function(theFile) {
                return function(e) {
                    // Insertamos la imagen
                    document.getElementById("list").innerHTML = ['<img class="thumb thumbnail" src="', e.target.result, '" width="200px" title="', escape(theFile.name), '"/>'].join('');
                };
            })(f);
            reader.readAsDataURL(f);
        }
    }
    document.getElementById('file').addEventListener('change', archivo, false);
</script>