$(document).ready(function(){

    $('#medicamentos_select').hide()
    $('#cant_blister').hide()
    $('#cant_caja').hide()
    $('#stock_blister').hide()
    $('#stock_caja').hide()

    $('#search').on('click', function(){
        $('#medicamentos_select').show()
    })

    $('#container-search').on('focusout', function(){
        //$('#medicamentos_select').hide()
    })

  /*   $('#radio_form').on('change', function(){
        if($('.radiobtn').is(':checked')){
            var tipo = $('.radiobtn').val()
            alert(tipo)
           }
    }) */



    $('#search').on('keyup', function(){
       var search = $(this).val()
       var tipo = $("input[name='type']:checked").val();
       if(tipo == 1){
        $.ajax({
            url:"../medicamentos/medPrice",
            type: "POST",
            dataType: 'json',
            data:{
                search: search,
                tipo:tipo
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success:function(res){

                console.log(res);
                var list = '';

                $('#medicamentos_select').html('');

                $.each(res, function(index, value){
                    list = '<tr><td><a class="search-link'+index+'" data-price="'+value.sale_price+'" data-box="'+value.sale_price+'" id="'+value.id+'">'+value.generic_name+' - '+value.tradename+' - '+value.concentration+' - '+value.presentation+' - '+value.laboratory+' - Precio unitario: S./'+value.sale_price+'</a></td></tr>'
                        $('#medicamentos_select').append(list);

                        $('.search-link'+index).on('click', function(){
                            $('#medicamentos_select').html('');
                            $('#search').val('')
                                row = `<tr id="row${value.id}">
                                        <td>${value.generic_name}</td>
                                        <td>${value.tradename}</td>
                                        <td>${value.concentration}</td>
                                        <td>
                                        <select id="tipo${value.id}" class="form-control">
                                            <option value="1">Unidad</option>
                                            <option value=${value.number_box}>Caja</option>
                                            <option value=${value.number_blister}>Blister</option>
                                        </select>
                                        </td>
                                        <td><input id="cant${value.id}" type="text" class="form-control"></td>
                                        <td id="vunit${value.id}" class="vunit">${value.sale_price}</td>
                                        <td id="subtotal${value.id}" class="subtotal"></td>
                                        <td id="igv_unique${value.id}"></td>
                                        <td id="importe${value.id}" class="importe"></td>
                                        <td><a id="close${value.id}" class="btn btn-danger">X</a></td>
                                        </tr>`
                            $('#cart-shop').append(row);

                            $('#cant'+value.id).on('keyup',function(){
                                var importe1= parseFloat($(this).val()*parseFloat($('#vunit'+value.id).html())*$('#tipo'+value.id).val()).toFixed(1)+'0'
                                $('#importe'+value.id).html(importe1)
                                var subtotal1 = parseFloat(importe1/1.18).toFixed(2)
                                $('#subtotal'+value.id).html(subtotal1)
                                $('#igv_unique'+value.id).html((subtotal1*0.18).toFixed(2))

                                var suma = 0;

                                $('.subtotal').each(function() {
                                    suma = suma + parseFloat($(this).html())

                                })
                                $('#total_igv').html((suma*0.18).toFixed(2));
                                var importe = 0;

                                $('.importe').each(function() {
                                    importe = importe + parseFloat($(this).html())
                                    $('#total').html(importe.toFixed(1)+'0')
                                })

                                $('#total_noigv').html(($('#total').html()-$('#total_igv').html()).toFixed(2))
                            })

                            $('#tipo'+value.id).on('change', function(){
                                $('#vunit'+value.id).html(($(this).val()*value.sale_price).toFixed(2))
                                var importe1= parseFloat($('#vunit'+value.id).html()).toFixed(1)
                                $('#importe'+value.id).html(importe1)
                                var subtotal1 = parseFloat(importe1/1.18).toFixed(2)
                                $('#subtotal'+value.id).html(subtotal1)
                                $('#igv_unique'+value.id).html((subtotal1*0.18).toFixed(2))

                                var suma = 0;

                                $('.subtotal').each(function() {
                                    suma = suma + parseFloat($(this).html())
                                })
                                $('#total_igv').html((suma*0.18).toFixed(2));

                                var importe = 0;

                                $('.importe').each(function() {
                                    importe = importe + parseFloat($(this).html())
                                })
                                $('#total').html(importe.toFixed(1)+'0')

                                $('#total_noigv').html(($('#total').html()-$('#total_igv').html()).toFixed(2))
                            })

                            $('#close'+value.id).on('click', function() {
                                var total = parseFloat($('#total').html()) - parseFloat($('#importe'+value.id).html())
                                $('#total').html(total.toFixed(1)+'0')
                                var subtotal = parseFloat($('#total').html()/1.18)
                                $('#total_noigv').html(subtotal.toFixed(2))
                                $('#total_igv').html((subtotal*0.18).toFixed(2))
                                $('#row'+value.id).remove()

                            })


                        })
                });
            }
        });
       }else{
        $.ajax({
            url:"../medicamentos/artPrice",
            type: "POST",
            dataType: 'json',
            data:{
                search: search,
                tipo:tipo
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success:function(res){

                console.log(res);
                var list = '';

                $('#medicamentos_select').html('');

                $.each(res, function(index, value){
                    list = '<tr><td><a class="search-link" data-price="'+value.sale_price+'" data-box="'+value.sale_price+'" id="'+value.id+'">'+value.tradename+' - '+value.trademark+' - '+value.presentation+' - Precio unitario: S./'+value.sale_price+'</a></td></tr>'
                        $('#medicamentos_select').append(list);

                        $('.search-link').on('click', function(){
                            $('#medicamentos_select').append('');

                        })
                });
            }
        });
       }
       $('#medicamentos_select').trigger("click")

    });
});
