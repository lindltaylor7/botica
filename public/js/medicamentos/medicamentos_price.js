$(document).ready(function(){


    $('.btn-price').on("click", function (){

        var id = $(this).attr('id')

        $.ajax({
            url:"../admin/medicamentos/precios",
            type: "POST",
            dataType: 'json',
            data:{
                id: id
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success:function(res){

                console.log(res)
                $('#id_precio').val(res.id);
                $('#p_costo').val(res.p_costo);
                $('#p_unitario').val(res.p_unitario);
                $('#p_caja').val(res.p_caja);
                $('#p_venta_caja').val(res.p_venta_caja);

                $('#utilidad').on('keyup', function(){
                    var p_costo= $('#p_costo').val()
                    var utilidad = $('#utilidad').val()

                    var p_venta = parseFloat(p_costo) + parseFloat(utilidad*p_costo/100)

                    $('#p_unitario').val(p_venta.toFixed(2));
                    console.log(p_venta)
                });

                $('#utilidad_caja').on('keyup', function(){
                    var p_caja= $('#p_caja').val();
                    var utilidad_caja = $('#utilidad_caja').val()

                    var p_venta_caja = parseFloat(p_caja) + parseFloat(utilidad_caja*p_caja/100)

                    $('#p_venta_caja').val(p_venta_caja.toFixed(2));
                    console.log(p_venta_caja)
                });
            }
        });


    })


    $('.btn-close').on('click', function(){
        $('#p_costo').val('');
        $('#utilidad').val('');
        $('#p_unitario').val('');
        $('#p_caja').val('');
        $('#utilidad_caja').val('');
        $('#p_venta_caja').val('');
        console.log('limpieza hecha')
    })


});
