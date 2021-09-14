$(document).ready(function(){
    $('#ad-danger').hide();
    $('#cantidad').on('keyup',function(){
        var cant = $(this).val()
        var price = $('#price').val()
        var nro_caja = $('#nro_caja').val()

        var cant_stock = $('#cant_stock').val()

        if( $('#cajaCheck').is(':checked') ) {

            var cant2 = cant
            var cant = cant * nro_caja
            var utl = cant2 * $('#price').val()
            $('#utilidad').val(utl.toFixed(2))
        }else{
        var utl = cant * price
        $('#utilidad').val(utl.toFixed(2))
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
