function comprobarDocumento() {
    var parametros = {
        idtido: $('#select_documento_referencia').val(),
        serie: $('#input_serie_referencia').val(),
        numero: $('#input_numero_referencia').val()
    };
    $.ajax({
        data: parametros,
        url: '../controller/datos/obtener_datos_venta.php',
        type: 'get',
        //dataType: 'json',
        beforeSend: function () {
            $('#input_documento_cliente').val("");
            $('#input_datos_cliente').val("");
            $('#lbl_suma_pedido').html("S/ 0.00");
            $('#input_total_pedido').val("0");
        },
        success: function (r) {
            var jsonresponse = JSON.parse(r);
            var success = jsonresponse.success;

            if (success === "error") {
                swal({
                    title: "Error",
                    text: "No se encontro el Documento Ingresado",
                    type: "error",
                    showCancelButton: false,
                    //cancelButtonClass: 'btn-secondary ',
                    //confirmButtonColor: "#DD6B55",
                    //confirmButtonText: "Ver Ticket",
                    cancelButtonText: "No, cancel plx!",
                    closeOnConfirm: true,
                    closeOnCancel: true
                });
            }
            if (success === "existe") {
                $('#input_id_venta_referencia').val(jsonresponse.idventa);
                $('#input_datos_cliente').val(jsonresponse.nom_cliente);
                $('#input_documento_cliente').val(jsonresponse.doc_cliente);
                $('#btn_finalizar_pedido').prop("disabled", false);

                var datainput = {
                    action: 3
                }
                obtenerDetalle(datainput);
            }
        },
        error: function () {
            alert('Ocurrio un error en el servidor ..');
            $('#input_documento_cliente').val("");
            $('#input_datos_cliente').val("");
            $('#lbl_suma_pedido').html("S/ 0.00");
            $('#input_total_pedido').val("0");
        }
    });

}