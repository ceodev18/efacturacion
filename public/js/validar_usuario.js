function enviar_ruc() {
    var parametros = {
        "ruc": $("#input_ruc").val()
    };

    if ($("#input_ruc").val().length === 11) {
        $.ajax({
            data: parametros,
            url: 'ajax_post/validar_ruc.php',
            type: 'post',
            beforeSend: function () {
                $("#error_ruc").html("<div class=\"alert alert-success\"><strong> Espere! </strong> Estamos procesando su peticion.</div>");
            },
            success: function (response) {
                $("#error_ruc").html("");
                var json_ruc = JSON.parse(response);
                console.log(json_ruc);
                var success = json_ruc.success;
                if (success === false) {
                    $("#error_ruc").html("<div class=\"alert alert-danger\"><strong> Error! </strong> El numero de RUC es incorrecto.</div>");
                }

                if (success === "existe") {
                    $("#error_ruc").html("<div class=\"alert alert-warning\"><strong> Alerta! </strong> Esta empresa ya esta registrada.</div>");
                    $("#input_ruc").prop('readonly', true);
                    $("#input_dni").prop('readonly', true);
                    $("#btn_comprueba_ruc").prop('disabled', true);
                    $("#btn_comprueba_dni").prop('disabled', true);
                    $("#input_razon_social").val(json_ruc.entity.nombre_o_razon_social);
                    $("#input_estado").val(json_ruc.entity.estado_del_contribuyente);
                    $("#input_condicion").val(json_ruc.entity.condicion_de_domicilio);
                }

                if (success === true) {
                    var estado = json_ruc.estado_del_contribuyente;
                    var condicion = json_ruc.condicion_de_domicilio;

                    if (condicion === "NO HABIDO" || estado === "BAJA DE OFICIO") {
                        $("#error_ruc").html("<div class=\"alert alert-warning\"><strong> Alerta! </strong> NO PODEMOS REGISTRAR A ESTA EMPRESA.</div>");
                        $("#input_razon_social").val(json_ruc.nombre_o_razon_social);
                        $("#input_estado").val(estado);
                        $("#input_condicion").val(condicion);
                        $("#input_ruc").prop('readonly', true);
                        $("#input_dni").prop('readonly', true);
                        $("#btn_comprueba_ruc").prop('disabled', true);
                        $("#btn_comprueba_dni").prop('disabled', true);
                    } else {
                        $("#input_ruc").prop('readonly', true);
                        $("#btn_comprueba_ruc").prop('disabled', true);
                        $("#input_nombre_comercial").focus();
                        $("#input_razon_social").val(json_ruc.nombre_o_razon_social);
                        $("#hidden_direccion").val(json_ruc.direccion_completa);
                        $("#input_estado").val(estado);
                        $("#input_condicion").val(condicion);
                    }
                }
            },
            error: function () {
                $("#error_ruc").html("<div class=\"alert alert-warning\"><strong> Error! </strong> Ocurrio un error al procesar.</div>");
                $("#input_ruc").prop('readonly', false);
                $("#input_razon_social").val("");
                $("#input_estado").val("");
                $("#input_condicion").val("");
                $("#input_ruc").focus();
            }
        });
    } else {
        $("#error_ruc").html("<div class=\"alert alert-danger\"><strong> Error! </strong> Numero de RUC incompleto.</div>");
    }
}

function enviar_dni() {
    var parametros = {
        "dni": $("#input_dni").val()
    };

    if ($("#input_dni").val().length === 8) {
        $.ajax({
            data: parametros,
            url: 'ajax_post/validar_dni.php',
            type: 'post',
            beforeSend: function () {
                $("#error_dni").html("<div class=\"alert alert-success\"><strong> Espere! </strong> Estamos procesando su peticion.</div>");
            },
            success: function (response) {
                $("#error_dni").html("");
                var json = response;
                console.log(json);
                var json_dni = JSON.parse(json);
                var success = json_dni.success;
                if (success === false) {
                    $("#error_dni").html("<div class=\"alert alert-danger\"><strong> Error! </strong> El numero de DNI es incorrecto.</div>");
                }

                if (success === true) {
                    $("#input_dni").prop('readonly', true);
                    $("#btn_comprueba_dni").prop('disabled', true);
                    $("#btn_validar_datos").prop('disabled', false);
                    $("#input_apellido_paterno").focus();
                    $("#input_nombres").val(json_dni.result.Nombres);
                    $("#hidden_apellidos").val(json_dni.result.apellidos);
                }
            },
            error: function () {
                $("#error_dni").html("<div class=\"alert alert-warning\"><strong> Error! </strong> Ocurrio un error al procesar.</div>");
                $("#input_dni").prop('readonly', false);
                $("#input_nombres").val("");
                $("#hidden_apellidos").val("");
                $("#input_dni").focus();
            }
        });
    } else {
        $("#error_dni").html("<div class=\"alert alert-danger\"><strong> Error! </strong> Numero de DNI incompleto.</div>");
    }
}

function validar_datos() {
    var apellidos = $("#hidden_apellidos").val().trim();
    var apellido_paterno = $("#input_apellido_paterno").val().trim().toUpperCase();
    var apellido_materno = $("#input_apellido_materno").val().trim().toUpperCase();

    var concat_apellido = apellido_paterno + " " + apellido_materno;

    if (apellidos === concat_apellido) {
        $("#error_dni").html("<div class=\"alert alert-success\"><strong> Ok! </strong> Apellidos coinciden correctamente.</div>");
        $("#btn_registrar").prop('disabled', false);
        $("#btn_validar_datos").prop('disabled', true);
        $("#input_apellido_paterno").prop('disabled', true);
        $("#input_apellido_materno").prop('disabled', true);
    } else {
        $("#error_dni").html("<div class=\"alert alert-danger\"><strong> Error! </strong> Apellidos no coinciden.</div>");
        $("#btn_registrar").prop('disabled', true);
        $("#btn_validar_datos").prop('disabled', false);
        $("#input_apellido_paterno").focus();
        console.log(apellidos);
        console.log(concat_apellido);
    }
}

function validar_email() {
    var email = $("#input_email").val();
    var emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
    //Se muestra un texto a modo de ejemplo, luego va a ser un icono
    if (email.length > 0) {
        if (emailRegex.test(email)) {
            $("#error_dni").html("<div class=\"alert alert-success\"><strong> Conforme! </strong> email valido.</div>");
        } else {
            $("#error_dni").html("<div class=\"alert alert-danger\"><strong> Error! </strong> Email no valido.</div>");
        }
    } else {
        $("#error_dni").html("");
    }
}

       