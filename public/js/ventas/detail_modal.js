$(document).ready(function(){
    $('#ad-danger').hide();
    $('#quantity').on('keyup',function(){
        var cant = $(this).val()
        var price = $('#price').val()
        var nro_caja = $('#number_box').val()
        var nro_blister = $('#number_blister').val()

        var cant_stock = $('#cant_stock').val()

        if( $('#cajaCheck').val() == "1") {
            var utl = cant * price
            $('#partial_utility').val(utl.toFixed(2))
        }
        else if ( $('#cajaCheck').val() == "2") {
            var cant2 = cant
            var cant = cant * nro_blister
            var utl = cant2 * $('#price').val()
            $('#partial_utility').val(utl.toFixed(2))
        }
        else {
            var cant2 = cant
            var cant = cant * nro_caja
            var utl = cant2 * $('#price').val()
            $('#partial_utility').val(utl.toFixed(2))
        }

        console.log(cant_stock - cant)
        if(cant_stock - cant < 0){
            $('#ad-danger').show();
            $('#btn-agregar').prop('disabled',true)
        }else{
            $('#ad-danger').hide();
            $('#btn-agregar').prop('disabled',false)
        }
    })
})
