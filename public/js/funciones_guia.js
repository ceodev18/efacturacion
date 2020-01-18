function comprobarVenta() {
    var id_documento = $("#select_documento_venta").val();
    var serie = $("#input_serie_venta").val();
    var numero = $("#input_numero_venta").val();

    if (serie !== "" || numero !== "") {
        var parametros = {
            "idtido": id_documento,
            "serie": serie,
            "numero": numero
        };

        $.ajax({
            data: parametros,
            url: '../controller/datos/obtener_datos_venta.php',
            type: 'get',
            beforeSend: function () {

            },
            success: function (response) {
                var jsonresponse = JSON.parse(response);
                var success = jsonresponse.success;

                if (success === "error") {
                    swal({
                        title: "Error",
                        text: "No se encontro el Documento Ingresado",
                        type: "error",
                        showCancelButton: false,
                        cancelButtonText: "No, cancel plx!",
                        closeOnConfirm: true,
                        closeOnCancel: true
                    });
                }
                if (success === "existe") {
                    $('#input_id_venta_referencia').val(jsonresponse.idventa);
                    $('#input_datos_destinatario').val(jsonresponse.doc_cliente + " | " + jsonresponse.nom_cliente);
                    $('#hidden_datos_cliente').val(jsonresponse.nom_cliente);
                    $('#hidden_documento_cliente').val(jsonresponse.doc_cliente);
                    $('#input_datos_cliente').val(jsonresponse.nom_cliente);
                    $('#input_documento_cliente').val(jsonresponse.doc_cliente);
                    $('#input_total_venta').val(jsonresponse.total);
                    $('#input_dir_llegada').val(jsonresponse.dir_cliente);

                    $('#input_fecha').prop("disabled", false);
                    $('#btn_graba_guia').prop("disabled", false);
                    $('#input_documento_cliente').prop("readonly", false);

                    $('#input_dir_llegada').focus();

                    var datainput = {
                        action: 3
                    }
                    obtenerDetalle(datainput);
                }
            },
            error: function () {
                alert("error al procesar");
            }
        });
    } else {
        alert("FALTAN INGRESAR DATOS");
        $("#input_serie_venta").focus();
    }
}

function comprobarRucTransporte() {
    var documento_cliente = $("#input_documento_cliente").val();
    if (documento_cliente.length == 11) {
        validarDocumento();
    } else {
        swal("SOLO PUEDEN INGRESAR 11 DIGITOS");
    }
}

function obtenerDatosGuia() {

    var id_tido = 11;
    var parametros = {
        "idtido": id_tido
    };

    $.ajax({
        data: parametros,
        url: '../controller/datos/obtener_documento_sunat.php',
        type: 'get',
        beforeSend: function () {
            $("#input_serie_guia").val("");
            $("#input_numero_guia").val("");
        },
        success: function (response) {
            var json = JSON.parse(response);
            $("#input_serie_guia").val(json.serie);
            $("#input_numero_guia").val(json.numero);
        },
        error: function () {
            alert("error al procesar");
        }
    });
}

function obtenerProvincias() {
    var select_provincia =  $("#select_provincia");
    var parametros = {
        "departamento": $("#select_departamento").val()
    };

    $.ajax({
        data: parametros,
        url: '../controller/datos/obtener_provincias.php',
        type: 'post',
        beforeSend: function () {
            select_provincia.find('option').remove();
        },
        success: function (response) {
            var json_response = JSON.parse(response);
            select_provincia.find('option').remove();
            $(json_response).each(function (i, v) { // indice, valor
                select_provincia.append('<option value="' + v.provincia + '">' + v.nombre + '</option>');
            });
            select_provincia.prop('disabled', false);
            obtenerDistritos();
        },
        error: function () {
            alert("error al procesar");
        }
    });
}

function obtenerDistritos() {
    var select_distrito =  $("#select_distrito");
    var parametros = {
        "departamento": $("#select_departamento").val(),
        "provincia" : $("#select_provincia").val()
    };

    $.ajax({
        data: parametros,
        url: '../controller/datos/obtener_distritos.php',
        type: 'post',
        beforeSend: function () {
            select_distrito.find('option').remove();
        },
        success: function (response) {
            var json_response = JSON.parse(response);
            select_distrito.find('option').remove();
            $(json_response).each(function (i, v) { // indice, valor
                select_distrito.append('<option value="' + v.ubigeo + '">' + v.nombre + '</option>');
            });
            select_distrito.prop('disabled', false);
        },
        error: function () {
            alert("error al procesar");
        }
    });
}

function enviarDatosGuia() {
    var transporte = $("#input_documento_cliente").val();
    var vehiculo = $("#input_vehiculo").val();
    var chofer = $("#input_dni_chofer").val();
    var parametros = {
        "id_venta": $("#input_id_venta_referencia").val(),
        "fecha_emision" : $("#input_fecha").val(),
        "dir_llegada" : $("#input_dir_llegada").val(),
        "ubigeo" : $("#select_distrito").val(),
        "tipo_transporte" : $("#select_tipo_transporte").val(),
        "ruc_transporte" : $("#input_ruc_transporte").val(),
        "razon_transporte" : $("#input_datos_cliente").val(),
        "vehiculo" : $("#input_vehiculo").val(),
        "chofer" : $("#input_dni_chofer").val(),
        "peso" : $("#input_peso_total").val(),
        "nro_bultos" : $("#input_nro_bultos").val(),
    };

    $.ajax({
        data: parametros,
        url: '../controller/reg_guia_remision.php',
        type: 'post',
        beforeSend: function () {

        },
        success: function (response) {
            console.log(response);
        },
        error: function () {
            alert("error al procesar");
        }
    });
}