$(document).ready(function(){
    $('#p_caja').on('keyup',function(){
       var nro_caja = $('#nro_caja').val();
       $('#p_costo').val(($(this).val()/nro_caja).toFixed(1)+'0');
    });



    $('#cajas').on('keyup', function(){
        var nro_cajas = $('#nro_caja').val();
        var cajas = $(this).val()

        $('#cantidad').val(nro_cajas*cajas)

    });




    $('#utilidad').on('keyup', function(){
        var p_costo= $('#p_costo').val()
        var utilidad = $('#utilidad').val()

        var p_venta = parseFloat(p_costo) + parseFloat(utilidad*p_costo/100)

        $('#p_unitario').val(p_venta.toFixed(1)+'0');
        console.log(p_venta)
    });

    $('#utilidad_caja').on('keyup', function(){
        var p_caja= $('#p_caja').val();
        var utilidad_caja = $('#utilidad_caja').val()

        var p_venta_caja = parseFloat(p_caja) + parseFloat(utilidad_caja*p_caja/100)

        $('#p_venta_caja').val(p_venta_caja.toFixed(1)+'0');
        console.log(p_venta_caja)
    });

});
