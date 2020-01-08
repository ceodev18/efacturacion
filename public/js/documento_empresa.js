function obtenerDatos() {
    var parametros = {
        "idtido": $("#select_documento").val()
    };

    var id_tido = $("#select_documento").val();

    $.ajax({
        data: parametros,
        url: '../controller/datos/obtener_documento_sunat.php',
        type: 'get',
        beforeSend: function () {
            $("#input_serie").val("");
            $("#input_numero").val("");
        },
        success: function (response) {
            if (id_tido == 6) {
                $("#input_documento_cliente").val("0");
                $("#input_datos_cliente").val("CLIENTES GENERALES");
                $("#input_documento_cliente").prop("readonly", true);
                $("#input_datos_cliente").prop("readonly", true);
            } else {
                $("#input_documento_cliente").val("");
                $("#input_datos_cliente").val("");
                $("#input_documento_cliente").prop("readonly", false);
                $("#input_datos_cliente").prop("readonly", false);
                $("#input_documento_cliente").focus();
            }
            var json = JSON.parse(response);
            $("#input_serie").val(json.serie);
            $("#input_numero").val(json.numero);
        },
        error: function () {
            alert("error al procesar");
        }
    });
}