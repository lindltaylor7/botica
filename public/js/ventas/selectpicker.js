$(document).ready(function(){

    $('#medicamentos_select').hide()
    $('#cant_blister').hide()
    $('#cant_caja').hide()

    $('#search').on('click', function(){
        $('#medicamentos_select').show()
    })

    $('#container-search').on('focusout', function(){
        //$('#medicamentos_select').hide()
    })

    $('#search').on('keyup', function(){
       var search = $(this).val()
       $('#medicamentos_select').trigger("click")
        $.ajax({
            url:"../medicamentos/medPrice",
            type: "POST",
            dataType: 'json',
            data:{
                search: search
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success:function(res){
                console.log(res);
                var list = '';

                $('#medicamentos_select').html('');

                $.each(res, function(index, value){
                    list = '<tr><td><a class="search-link" data-nbox="'+value.number_box+'" data-cant="'+value.sumatoria+'" data-box="'+value.sale_price+'" data-price="'+value.sale_price+'" data-bs-toggle="modal" data-bs-target="#ventaModal" id="'+value.id+'">'+value.generic_name+' - '+value.tradename+' - '+value.concentration+' - '+value.pesentation+' - Precio unitario: S./'+value.sale_price+' -Precio de Caja: S./'+value.sale_price+'</a></td></tr>'
                        $('#medicamentos_select').append(list);
                    
                    $('.search-link').on('click', function(){
                        $('#cant_stock').val($(this).data('cant'))
                        $('#medicamento_id').val($(this).attr('id'))
                        $('#info_medic').html($(this).text())
                        $('#price').val($(this).data('price'))
                        $('#nro_caja').val($(this).data('nbox'))
                        $('#nro_blister').val($(this).data('nbox'))

                        $('#pricebox').hide()

                        var price = $(this).data('price')
                        var pricebox= $(this).data('box')

                        $("select#cajaCheck").on( 'change', function() {
                            if( $(this).val() == "3" ) {
                                $('#cant_caja').show()
                                $('#cant_blister').hide()
                                $('#price').val(pricebox)
                            }
                            else if ( $(this).val() == "2") {
                                $('#cant_blister').show()
                                $('#cant_caja').hide()
                                $('#price').val(pricebox)
                            } else {
                                $('#cant_caja').hide()
                                $('#cant_blister').hide()
                                $('#price').val(price)
                            }
                        });
                    })




                });



            }

            });
    });
});
