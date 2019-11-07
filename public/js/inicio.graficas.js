$(function () {
    $.getJSON(getAbsolutePath() + "../controller/json/cargar_datos_inicio.php?tipo=1", function (result) {
        $("#total_ventas").html(formatNumber(result.ventas));
        $("#total_clientes").html(formatNumber(result.contar_clientes));
        $("#total_documentos").html(formatNumber(result.contar_documentos));
        $("#venta_maxima").html(formatNumber(result.maximo));
        $("#venta_minima").html(formatNumber(result.minimo));
        $("#venta_promedio").html(formatNumber(result.promedio));
    });

    $.getJSON(getAbsolutePath() + "../controller/json/cargar_datos_inicio.php?tipo=2", function (result) {
        $("#total_ventas_hoy").html(formatNumber(result.total_hoy));
    });

    //llenar datos ventas por mes
    $.getJSON(getAbsolutePath() + "../controller/json/cargar_datos_inicio.php?tipo=3", function (result) {
        Morris.Line({
            element: 'morris-line-chart',
            data: result,
            xkey: 'id',
            ykeys: ['ventas'],
            parseTime: false,
            labels: ['Ingresos'],
            hideHover: 'auto',
            resize: true,
            lineColors: ['#4CAF50']
        });
    });

    //llenar datos ventas por mes
    $.getJSON(getAbsolutePath() + "../controller/json/cargar_datos_inicio.php?tipo=4", function (result) {
        //console.log(result);
        var array_total = Array();
        var array_cantidad = Array();
        $.each(result, function (key, val) {
            array_total[val.dia] = [val.total_dia, val.cantidad_dia];
        });

        array_resultado = [
            {
                "dia": 1,
                "total_dia": 0,
                "cantidad_dia": 0
            },
            {
                "dia": 2,
                "total_dia": 1000,
                "cantidad_dia": 1
            }
        ];

        Morris.Line({
            element: 'morris-line-diario',
            data: array_resultado,
            xkey: 'dia',
            ykeys: ['total_dia', 'cantidad_dia'],
            parseTime: false,
            labels: ['Ventas', 'Documentos'],
            hideHover: 'auto',
            resize: true,
            lineColors: ['#4CAF50', '#0296ca']
        });

    });

});

function formatNumber(num) {
    num = parseFloat(num).toFixed(2);
    return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');
}

function zeroFill(number, width) {
    width -= number.toString().length;
    if (width > 0) {
        return new Array(width + (/\./.test(number) ? 2 : 1)).join('0') + number;
    }
    return number + ""; // siempre devuelve tipo cadena
}

function getAbsolutePath() {
    var loc = window.location;
    var pathName = loc.pathname.substring(0, loc.pathname.lastIndexOf('/') + 1);
    return loc.href.substring(0, loc.href.length - ((loc.pathname + loc.search + loc.hash).length - pathName.length));
}