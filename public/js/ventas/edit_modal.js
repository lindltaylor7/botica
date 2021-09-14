$(document).ready(function(){

    $('#btn-edit-detail').on('click',function(){
        var id = $(this).val();
        $('#cant_caja_edit').hide()

        $.ajax({
            url:"../detail/infoedit",
            type: "POST",
            dataType: 'json',
            data:{
                id: id
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success:function(res){
                $('#detail_id').val(id)
                $('#cantidad_edit').val(res.cantidad)
                $('#cant_stock_edit').val(res.total)
                $('#price_edit').val(res.p_unitario.toFixed(2))
                $('#pricebox_edit').val(res.p_venta_caja.toFixed(2))
                $('#utilidad_edit').val(res.utilidad.toFixed(2))
                $('#nro_caja_edit').val(res.nro_caja)
                $('#pricebox_edit').hide()


                $("#cajaCheck_edit").on( 'change', function() {
                    if( $(this).is(':checked') ) {
                        // Hacer algo si el checkbox ha sido seleccionado
                        $('#cant_caja_edit').show()
                        $('#price_edit').val(res.p_venta_caja.toFixed(2))
                    } else {
                        // Hacer algo si el checkbox ha sido deseleccionado
                        $('#cant_caja_edit').hide()
                        $('#price_edit').val(res.p_unitario.toFixed(2))
                    }
                });

                $('#cantidad_edit').on('keyup',function(){

                    var cant = $(this).val()
                    var price = $('#price_edit').val()
                    var pricebox = $('#pricebox_edit').val()
                    var nro_caja = $('#nro_caja_edit').val()
                    var cant_stock = $('#cant_stock_edit').val()

                    if( $('#cajaCheck_edit').is(':checked') ) {

                        var cant2 = cant
                        var cant = cant * nro_caja
                        var utl = cant2 * $('#price_edit').val()

                        $('#utilidad_edit').val(utl.toFixed(2))


                    }else{
                    var utl = cant * price
                    $('#utilidad_edit').val(utl.toFixed(2))

                    }

                    console.log(cant_stock - cant)
                    if(cant_stock - cant < 0){
                        $('#ad-danger-edit').show();
                        $('#btn-agregar-edit').prop('disabled',true)
                    }else{
                        $('#ad-danger-edit').hide();
                        $('#btn-agregar-edit').prop('disabled',false)
                    }


                })

            }

            });

    })



})
