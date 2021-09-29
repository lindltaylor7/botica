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
                                        <td>${value.sale_price}</td>
                                        <td id="subtotal${value.id}" class="subtotal"></td>
                                        <td><a id="close${value.id}" class="btn btn-danger">X</a></td>
                                        </tr>`
                            $('#cart-shop').append(row);

                            $('#cant'+value.id).on('keyup',function(){
                                $('#subtotal'+value.id).html(parseFloat($(this).val()*value.sale_price*$('#tipo'+value.id).val()).toFixed(1)+'0')
                                var suma = 0;
                                $('.subtotal').each(function() {
                                    suma = suma + parseFloat($(this).html())
                                    $('#total').html(suma.toFixed(1)+'0')
                                })
                            })

                            $('#close'+value.id).on('click', function() {
                                var total = parseFloat($('#total').html()) - parseFloat($('#subtotal'+value.id).html())
                                $('#total').html(total.toFixed(1)+'0')
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
