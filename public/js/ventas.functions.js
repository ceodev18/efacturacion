function comprobarCliente() {
    var documento_venta = $("#select_documento").val();
    var documento_cliente = $("#input_documento_cliente").val();
    if (documento_venta == 1) {
        if (documento_cliente.length == 8) {
            validarDocumento();
        } else {
            swal("SOLO PUEDEN INGRESAR 8 DIGITOS");
        }
    }
    if (documento_venta == 2) {
        if (documento_cliente.length == 11) {
            validarDocumento();
        } else {
            swal("SOLO PUEDEN INGRESAR 11 DIGITOS");
        }
    }
}

function validar_detalle() {
    var permitir = false;
    var cantidad = $('#input_cantidad_producto').val();
    if (cantidad === "") {
        swal("NO HA INGRESADO CANTIDAD DEL PRODUCTO A VENDER!");
        $('#input_cantidad_producto').focus();
    } else {
        permitir = true;
    }
    return permitir;
}

function agregarProducto() {
    var datainput = {
        id_producto: $('#hidden_codigo_producto').val(),
        descripcion: $('#input_descripcion_producto').val(),
        precio: $('#input_precio_producto').val(),
        costo: $('#input_costo_producto').val(),
        cantidad: $('#input_cantidad_producto').val(),
        action: 1
    }
    obtenerDetalle(datainput);
}

function eliminarProducto(idproducto) {
    var datainput = {
        id_producto: idproducto,
        action: 2
    }
    obtenerDetalle(datainput);
}

function obtenerDetalle(datainput) {
    $.ajax({
        data: datainput,
        url: '../controller/ProductosVentaSession.php',
        type: 'POST',
        //dataType: 'json',
        beforeSend: function () {
            $('table tbody').html("");
        },
        success: function (r) {
            //alert(r);
            $('table tbody').append(r);
            clean();
        },
        error: function () {
            alert('Ocurrio un error en el servidor ..');
            $('table tbody').html("");
        }
    });
}

function clean() {
    $('#input_cactual_producto').val('');
    $('#input_descripcion_producto').val('');
    $('#input_precio_producto').val('0.00');
    $('#input_costo_producto').val('0.00');
    $('#input_cantidad_producto').val('1');
    $('#btn_add_producto').prop("disabled", true);
    $('#btn_finalizar_pedido').prop("disabled", false);
    $('#input_cantidad_producto').prop("readonly", true);
    $('#input_precio_producto').prop("readonly", true);
    $('#input_buscar_productos').focus();
}

function enviar_datos() {
    var parametros = {
        datos_cliente: $('#input_datos_cliente').val(),
        documento_cliente: $('#input_documento_cliente').val(),
        direccion_cliente: $('#input_direccion_cliente').val(),
        total_pedido: $('#input_total_pedido').val(),
        documento_venta: $('#select_documento').val(),
    };
    $.ajax({
        data: parametros, //datos que se envian a traves de ajax
        url: '../controller/reg_venta.php', //archivo que recibe la peticion
        type: 'post', //método de envio
        beforeSend: function () {
            $("#resultado").html("Procesando, espere por favor...");
        },
        success: function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
            $("#resultado").html(response);
            var json_response = JSON.parse(response);
            if (response.valor == 0) {
                swal({
                    title: "Error al Registrar",
                    text: response,
                    type: "error",
                    showCancelButton: false,
                    //cancelButtonClass: 'btn-secondary ',
                    confirmButtonColor: "#DD6B55",
                    //confirmButtonText: "Ver Ticket",
                    cancelButtonText: "No, cancel plx!",
                    closeOnConfirm: true,
                    closeOnCancel: true
                });
            } else {
                swal({
                    title: "Venta Registrada",
                    text: "El documento de venta se registro con exito!",
                    type: "success",
                    showCancelButton: false,
                    //cancelButtonClass: 'btn-secondary ',
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Ver Ticket",
                    //cancelButtonText: "No, cancel plx!",
                    closeOnConfirm: false,
                    //closeOnCancel: false
                }, function (isConfirm) {
                    if (isConfirm) {

                        window.location.href = 'ver_preimpresion_venta.php?id_venta=' + json_response.valor;
                    }
                });
            }
        }
    });
}