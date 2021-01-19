function validarDocumento () {

    var parametros = {
        "documento": $("#input_documento_cliente").val()
    };

    $.ajax({
        data: parametros,
        url: '../controller/verificar_documento_cliente.php',
        type: 'get',
        beforeSend: function () {
            $.toast({
                heading: 'Validacion de Documento',
                text: 'Estamos buscando los datos de este cliente',
                position: 'top-right',
                loaderBg: '#fff',
                icon: 'info',
                hideAfter: 5000,
                stack: 1
            });
        },
        success: function (response) {
            console.log(response);
            $("#input_datos_cliente").val("DATOS NO ENCONTRADOS");
            var json = JSON.parse(response);

            var success = json.success;

            if (success === "nuevo" || success === "existe") {
               // $("#btn_guardar").prop('disabled', false);
                //$("#input_documento_cliente").prop('readonly', true);
                //$("#btn_comprueba").prop('disabled', true);
                //$("#input_datos_cliente").prop('readonly', true);
                $("#input_datos_cliente").val(json.datos);
                $("#input_direccion_cliente").val(json.direccion);
            }
            if (success === "existe") {
                $("#input_datos_cliente").val(json.datos);
               // $("#btn_guardar").prop('disabled', true);
              //  alertarClienteExiste();

            }
            if (success === "error") {
               // $("#btn_guardar").prop('disabled', true);
                $("#btn_comprueba").prop('disabled', false);
                $("#input_datos_cliente").prop('readonly', false);
                alertarErrorDocumento();
            }


        },
        error: function () {
            alert("error al procesar");
        }
    });
}

function alertarClienteExiste () {
    $.toast({
        heading: 'Validacion de Documento',
        text: 'Este cliente ya existe!!.',
        position: 'top-right',
        loaderBg: '#fff',
        icon: 'error',
        hideAfter: 3000,
        stack: 1
    });
}
function alertarErrorDocumento () {
    $.toast({
        heading: 'Validacion de Documento',
        text: 'Error al ingresar el Documento!',
        position: 'top-right',
        loaderBg: '#fff',
        icon: 'error',
        hideAfter: 3000,
        stack: 1
    });
}