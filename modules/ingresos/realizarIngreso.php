<?php
ob_start();
session_start();
if (!$_SESSION['idusuario']){
  header("location: ../../index.php");
}
include_once('../../include/functions.php');

    $ingresosClass = new Ingresos();
    $getProveedores = $ingresosClass -> getProveedores();
    $getCategories = $ingresosClass -> getCategories();

  ob_end_flush();
?>

<script>
document.getElementById('archivo').onchange = function(e) {
    // Creamos el objeto de la clase FileReader
    let reader = new FileReader();

    // Leemos el archivo subido y se lo pasamos a nuestro fileReader
    reader.readAsDataURL(e.target.files[0]);

    // Le decimos que cuando este listo ejecute el código interno
    reader.onload = function() {
        let image = document.getElementById('preview');
        image.src = reader.result;
    };
}
</script>

<link rel="stylesheet" href="css/contenedorrealizaringreso.css">
<div class="separador" style="height:20px; width: 100%;"></div>
<div class="contenedordeformingreso">

    <div class="subtitulocomponente">
        <h6>SELECCION DE PROVEEDOR</h6>
    </div>
    <div class="input-group mb-3">
        <span class="asteriscoxd" style="font-weight: bold; padding: 5px;">*</span>
        <select class="form-select form-select-sm form-control" aria-label=".form-select-sm example"
            id="rlz_ing_idproveedor">
            <option selected>SELECCIONE UN PROVEEDOR</option>
            <?php while ($nuevafila = mysqli_fetch_array($getProveedores)) {?>
            <option value="<?php echo $nuevafila['idpersona'];?>"><?php echo $nuevafila['nombre'];?></option>
            <?php };?>
        </select>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addNuevoProveedor">
            AÑADIR NUEVO PROVEEDOR</button>
    </div>

    <div class="subtitulocomponente">
        <h6> USUARIO QUE EFECTUA LA TRANSACCIÓN</h6>
    </div>
    <div class="infousuario">

        <div class="componentes">
            <div class="infoinsert">
                <span class="asteriscoxd">*</span>
                <span>ID</span>
            </div>
            <input type="text" placeholder="USUARIO QUE EFECTUA LA TRANSACCION" aria-label="USUARIO"
                value="<?php echo $_SESSION['idusuario'];?>" disabled="disabled" id="rlz_ing_idusuario">
        </div>
        <div class="componentes">
            <div class="infoinsert">
                <span class="asteriscoxd">*</span>
                <span>USUARIO</span>
            </div>
            <input type="text" placeholder="USUARIO QUE EFECTUA LA TRANSACCION" aria-label="USUARIO"
                value="<?php echo $_SESSION['user'];?>" disabled="disabled">
        </div>
        <div class="componentes">
            <div class="infoinsert">
                <span class="asteriscoxd">*</span>
                <span>NOMBRE</span>
            </div>
            <input type="text" placeholder="NOMBRE COMPLETO" aria-label="NOMBRE COMPLETO"
                value="<?php echo $_SESSION['nombre'];?>" disabled="disabled">
        </div>
    </div>

    <div class="subtitulocomponente">
        <h6> INSERTAR COMPROBANTE DE INGRESO</h6>
    </div>

    <div class="infodocument">
        <div class="componentes">
            <div class="infoinsert">
                <span class="asteriscoxd">*</span>
                <span>ej. Factura</span>
            </div>
            <input type="text" placeholder="TIPO COMPROBANTE" aria-label="TIPO COMPROBANTE" id="rlz_ing_tipo_documento">
        </div>
        <div class="componentes">
            <div class="infoinsert">
                <span class="asteriscoxd">*</span>
                <span">ej. A</span>
            </div>
            <input type=" text" placeholder="SERIE" aria-label="SERIE" id="rlz_ing_serie_documento">
        </div>
        <div class="componentes">
            <div class="infoinsert">
                <span class="asteriscoxd">*</span>
                <span>ej. 001</span>
            </div>
            <input type="number" placeholder="NUMERO" aria-label="NUMERO" id="rlz_ing_num_documento">
        </div>
    </div>

    <div class="subtitulocomponente">
        <h6>INFORMACION DEL INGRESO / PRODUCTO</h6>
    </div>

    <div class="infoproduct">
        <div class="componentes">
            <div class="infoinsert">
                <span class="asteriscoxd">*</span>
                <span>COSTO</span>
            </div>
            <input type="number" placeholder="0000.00" aria-label="0000.00" id="rlz_ing_costo"
                onkeyup="calcularImpuesto()">
        </div>
        <div class="componentes">
            <div class="infoinsert">
                <span class="asteriscoxd">*</span>
                <span>IVA</span>
            </div>
            <input type="number" placeholder="0000.00" aria-label="0000.00" id="rlz_ing_impuesto" disabled>
        </div>
        <div class="componentes">
            <div class="infoinsert">
                <span class="asteriscoxd">*</span>
                <span>COSTO NETO</span>
            </div>
            <input type="number" placeholder="0000.00" aria-label="0000.00" id="rlz_ing_total" disabled>
        </div>
        <div class="componentes">
            <div class="infoinsert">
                <span class="asteriscoxd">*</span>
                <span>CANTIDAD</span>
            </div>
            <input type="number" placeholder="CANTIDAD DE PRODUCTOS" aria-label="CANTIDAD DE PRODUCTOS"
                id="rlz_ing_cantidad">
        </div>
        <div class="componentes">
            <div class="infoinsert">
                <span class="asteriscoxd">*</span>
                <span>PRECIO VENTA</span>
            </div>
            <input type="number" placeholder="0000.00" aria-label="0000.00" id="rlz_ing_precio_venta">
        </div>
        <div class="componentes">
            <div class="infoinsert">
                <span class="asteriscoxd">*</span>
                <span>CODIGO</span>
            </div>
            <input type="text" placeholder="CODIGO DE PRODUCTO" aria-label="CODIGO DE PRODUCTO" id="rlz_ing_codigo">
        </div>
        <div class="componentes">
            <div class="infoinsert">
                <span class="asteriscoxd">*</span>
                <span>CATEGORIA</span>
            </div>
            <select class="inputselect" id="rlz_ing_idcategoria">
                <option selected>SELECCIONE UNA CATEGORIA</option>
                <?php while ($segundaFila = mysqli_fetch_array($getCategories)) {?>
                <option value="<?php echo $segundaFila['idcategoria'];?>"><?php echo $segundaFila['nombre'];?>
                </option>
                <?php };?>
            </select>
        </div>
        <div class="componentes">
            <div class="infoinsert">
                <span class="asteriscoxd">*</span>
                <span>NOMBRE</span>
            </div>
            <input type="text" placeholder="NOMBRE DE PRODUCTO" aria-label="NOMBRE DE PRODUCTO" id="rlz_ing_nombre">
        </div>
    </div>

    <div class="subtitulocomponente">
        <h6>CÁLCULO AUTOMÁTICO DE FECHA</h6>
    </div>

    <div class="infodate">
        <div class="componentes">
            <div class="infoinsert">
                <span class="asteriscoxd">*</span>
                <span>FECHA</span>
            </div>
            <input type="text" id="rlz_ing_fecha" placeholder="FECHA" aria-label="FECHA"
                value="<?php $hoy = getdate(); 
                echo $hoy['year']."-".$hoy['mon']."-".$hoy['mday']." ".$hoy['hours'].":".$hoy['minutes'].":".$hoy['seconds'];?>" disabled>
        </div>
    </div>

    <div class="subtitulocomponente">
        <h6>INTRODUZCA UN BREVE DESCRIPCIÓN</h6>
    </div>

    <div class="textarea">
        <div class="componentes">
            <div class="infoinsert">
                <span class="asteriscoxd">*</span>
                <span>Descripcion de la mercaderia o producto</span>
            </div>
            <textarea aria-label="With textarea" id="rlz_ing_descripcion"></textarea>
        </div>
    </div>

    <div class="subtitulocomponente">
        <h6>SELECCIONE UNA IMAGEN</h6>
    </div>

    <div class="infoimagen">
        <div class="componentes">
            <input type="file" name="archivo" id="archivo" style="width: fit-content;">
        </div>
        <div class="componentes">
            <img src="img/products/noproductimage.jpg" class="img-fluid"
                style="border: 1px solid; border-color: #288b41" alt="preview de imagen de producto" width="200"
                height="200" id="preview">
        </div>
    </div>

    <div class="separador"></div>
    <div class="buttoncontainer">
        <div style="padding: 10px;">
            <button type="button" class="bottonconfirmaringreso" id="bntConfirmarIngreso">REALIZAR INGRESO</button>
        </div>
    </div>
    <div class="separador"></div>
</div>

<!-- Modal -->
<div class="modal fade" id="addNuevoProveedor" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addNuevoProveedor">Agrega un nuevo proveedor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="listDetalle_listDetalle_tipo_persona"
                        placeholder="tipo_persona" value="proveedor" disabled>
                    <label for="nombre">TIPO</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="listDetalle_nombre" placeholder="nombre">
                    <label for="nombre">Nombre del proveedor</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="listDetalle_nit" placeholder="nit">
                    <label for="nit">NIT</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="listDetalle_dpi" placeholder="dpi" value="N/A" disabled>
                    <label for="dpi">DPI</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="listDetalle_direccion" placeholder="direccion">
                    <label for="direccion">Dirección</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="listDetalle_telefono" placeholder="telefono">
                    <label for="telefono">Teléfono</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="listDetalle_correo" placeholder="correo">
                    <label for="correo">Correo</label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-success" onclick="addProveedor_from_ingreso();">Añadir</button>
            </div>
        </div>
    </div>
</div>

<script src="js/muduloProveedores.js"></script>
<script src="js/moduloIngreso.js"></script>