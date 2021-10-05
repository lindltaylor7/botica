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
       var tipo = $("input[name='u_type']:checked").val();
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
                // console.log(res);
                var list = '';

                $('#medicamentos_select').html('');

                $.each(res, function(index, value){
                    list = '<tr><td><a class="search-link'+index+'" data-price="'+value.sale_price+'" data-box="'+value.sale_price+'" id="'+value.id+'">'+value.generic_name+' - '+value.tradename+' - '+value.concentration+' - '+value.presentation+' - '+value.laboratory+' - Precio unitario: S./'+value.sale_price+'</a></td></tr>'
                    $('#medicamentos_select').append(list);

                    $('.search-link'+index).on('click', function(){
                        $('#medicamentos_select').html('');
                        $('#search').val('')

                        /*==========================================
                            * Crear filas dinamicamente a treves del
                            evento click
                        ==========================================*/
                        row = `<tr id="row${value.id}">
                                <td>${value.generic_name}</td>
                                <td>${value.tradename}</td>
                                <td>${value.concentration}</td>
                                <td>
                                    <select id="tipo${value.id}" class="form-control">
                                        <option value="1">Unidad</option>
                                        <option value=${value.number_blister}>Blister</option>
                                        <option value=${value.number_box}>Caja</option>
                                    </select>
                                </td>
                                <td>
                                    <input name="detail[${$('#table_sales tr').length-1}][quantity]" id="cant${value.id}" class="form-control quantity" type="number"/>
                                    <input type="hidden" name="detail[${$('#table_sales tr').length-1}][unit_type]" value="${tipo}"/>
                                    <input type="hidden" id="partial_utility${value.id}" name="detail[${$('#table_sales tr').length-1}][partial_utility]" />
                                    <input type="hidden" id="partial_igv${value.id}" name="detail[${$('#table_sales tr').length-1}][partial_igv]" />
                                    <input type="hidden" id="partial_sale${value.id}" name="detail[${$('#table_sales tr').length-1}][partial_sale]" />
                                    <input type="hidden" id="medicine${value.id}" value="${value.id}" name="detail[${$('#table_sales tr').length-1}][medicine_id]" />
                                </td>
                                <td id="vunit${value.id}" class="vunit">${value.sale_price}</td>
                                <td id="subtotal${value.id}" class="subtotal"></td>
                                <td id="igv_unique${value.id}"></td>
                                <td id="importe${value.id}" class="importe"></td>
                                <td><a id="close${value.id}" class="btn btn-danger">X</a></td>
                            </tr>`

                        /*==========================================
                            * Validación de agregar duplicidad de 
                            medicamentos 
                        ==========================================*/
                        if (!document.getElementById(`row${value.id}`)) {
                            $('#cart-shop').append(row);
                        } else {
                            alert("Este producto ya está en venta");
                        }
                    /*      $('#td-cant'+value.id).html($('<input>').attr({
                            type: 'text',
                            id: 'cant'+value.id,
                            name: 'quantity'+index,
                            class:'form-control'
                        }).appendTo('form'));*/

                        /*==========================================
                            * Calcular Precio del a travez del input
                                creado dinamicamente
                        ==========================================*/
                        $('#cant'+value.id).on('keyup',function(){
                            var importe1= parseFloat($(this).val()*parseFloat($('#vunit'+value.id).html())*$('#tipo'+value.id).val()).toFixed(1)+'0'
                            $('#importe'+value.id).html(importe1)
                            $('#partial_sale'+value.id).val(importe1)
                            var subtotal1 = parseFloat(importe1/1.18).toFixed(2)
                            $('#subtotal'+value.id).html(subtotal1)
                            $('#partial_utility'+value.id).val(subtotal1)
                            $('#igv_unique'+value.id).html((subtotal1*0.18).toFixed(2))
                            $('#partial_igv'+value.id).val((subtotal1*0.18).toFixed(2))
                            var suma = 0;

                            $('.subtotal').each(function() {
                                suma = suma + parseFloat($(this).html())

                            })
                            $('#total_igv').val((suma*0.18).toFixed(2));
                            var importe = 0;

                            $('.importe').each(function() {
                                importe = importe + parseFloat($(this).html())
                                $('#total').val(importe.toFixed(1)+'0')
                            })

                            $('#total_noigv').val(($('#total').val()-$('#total_igv').val()).toFixed(2))
                        })

                        $('#cant'+value.id).on('click',function(){

                            var importe1= parseFloat($(this).val()*parseFloat($('#vunit'+value.id).html())*$('#tipo'+value.id).val()).toFixed(1)+'0'
                            $('#importe'+value.id).html(importe1)
                            $('#partial_sale'+value.id).val(importe1)
                            var subtotal1 = parseFloat(importe1/1.18).toFixed(2)
                            $('#subtotal'+value.id).html(subtotal1)
                            $('#partial_utility'+value.id).val(subtotal1)
                            $('#igv_unique'+value.id).html((subtotal1*0.18).toFixed(2))
                            $('#partial_igv'+value.id).val((subtotal1*0.18).toFixed(2))
                            var suma = 0;

                            $('.subtotal').each(function() {
                                suma = suma + parseFloat($(this).html())

                            })
                            $('#total_igv').val((suma*0.18).toFixed(2));
                            var importe = 0;

                            $('.importe').each(function() {
                                importe = importe + parseFloat($(this).html())
                                $('#total').val(importe.toFixed(1)+'0')
                            })

                            $('#total_noigv').val(($('#total').val()-$('#total_igv').val()).toFixed(2))
                        })

                        /*==========================================
                            *
                        ==========================================*/
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
                            $('#total_igv').val((suma*0.18).toFixed(2));

                            var importe = 0;

                            $('.importe').each(function() {
                                importe = importe + parseFloat($(this).html())
                            })
                            $('#total').val(importe.toFixed(1)+'0')

                            $('#total_noigv').val(($('#total').val()-$('#total_igv').val()).toFixed(2))
                        })

                        /*==========================================
                            * Cancelar compra por el boton x 
                        ==========================================*/
                        $('#close'+value.id).on('click', function() {
                            var total = parseFloat($('#total').val()) - parseFloat($('#importe'+value.id).html())
                            $('#total').val(total.toFixed(1)+'0')
                            var subtotal = parseFloat($('#total').val()/1.18)
                            $('#total_noigv').val(subtotal.toFixed(2))
                            $('#total_igv').val((subtotal*0.18).toFixed(2))
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
                    list = '<tr><td><a class="search-link'+index+'" data-price="'+value.sale_price+'" data-box="'+value.sale_price+'" id="'+value.id+'">'+value.tradename+' - '+value.trademark+' - '+value.presentation+' - '+value.supplier+' - Precio unitario: S./'+value.sale_price+'</a></td></tr>'
                    $('#medicamentos_select').append(list);

                    $('.search-link'+index).on('click', function(){
                        $('#medicamentos_select').html('');
                        $('#search').val('')
                            row = `<tr id="rowart${value.id}">
                                    <td>${value.tradename}</td>
                                    <td>${value.tradename}</td>
                                    <td>${value.presentation}</td>
                                    <td>
                                    <select name="detail[${$('#table_sales tr').length-1}][unit_type]" id="tipoart${value.id}" class="form-control">
                                        <option value="1">Unidad</option>
                                        <option value=${value.number_box}>Caja (${value.number_box})</option>
                                    </select>
                                    </td>
                                    <td>
                                            <input name="detail[${$('#table_sales tr').length-1}][quantity]" id="cantart${value.id}" class="form-control quantity" type="number"/>
                                            <input type="hidden" name="detail[${$('#table_sales tr').length-1}][unit_type]" value="${tipo}"/>
                                            <input type="hidden" id="a_partial_utility${value.id}" name="detail[${$('#table_sales tr').length-1}][partial_utility]" />
                                            <input type="hidden" id="a_partial_igv${value.id}" name="detail[${$('#table_sales tr').length-1}][partial_igv]" />
                                            <input type="hidden" id="a_partial_sale${value.id}" name="detail[${$('#table_sales tr').length-1}][partial_sale]" />
                                            <input type="hidden" id="medicine${value.id}" value="${value.id}" name="detail[${$('#table_sales tr').length-1}][article_id]" />
                                    </td>
                                    <td id="vunitart${value.id}" class="vunit">${value.sale_price}</td>
                                    <td id="subtotalart${value.id}" class="subtotal"></td>
                                    <td id="igv_uniqueart${value.id}"></td>
                                    <td id="importeart${value.id}" class="importe"></td>
                                    <td><a id="closeart${value.id}" class="btn btn-danger">X</a></td>
                                    </tr>`
                                    $('#cart-shop').append(row);

                                    $('#cantart'+value.id).on('keyup',function(){
                                        var importe1= parseFloat($(this).val()*parseFloat($('#vunitart'+value.id).html())).toFixed(1)+'0'
                                        $('#importeart'+value.id).html(importe1)
                                        $('#a_partial_sale'+value.id).val(importe1)
                                        var subtotal1 = parseFloat(importe1/1.18).toFixed(2)
                                        $('#subtotalart'+value.id).html(subtotal1)
                                        $('#a_partial_utility'+value.id).val(subtotal1)
                                        $('#igv_uniqueart'+value.id).html((subtotal1*0.18).toFixed(2))
                                        $('#a_partial_igv'+value.id).val((subtotal1*0.18).toFixed(2))
                                        var suma = 0;

                                        $('.subtotal').each(function() {
                                            suma = suma + parseFloat($(this).html())

                                        })
                                        $('#total_igv').val((suma*0.18).toFixed(2));
                                        var importe = 0;

                                        $('.importe').each(function() {
                                            importe = importe + parseFloat($(this).html())
                                            $('#total').val(importe.toFixed(1)+'0')
                                        })

                                        $('#total_noigv').val(($('#total').val()-$('#total_igv').val()).toFixed(2))
                                    })

                                    $('#tipoart'+value.id).on('change', function(){
                                        $('#vunitart'+value.id).html(($(this).val()*value.sale_price).toFixed(2))
                                        var importe1= parseFloat(($('#vunitart'+value.id).html()*$('#cantart'+value.id).val()).toFixed(1))
                                        $('#importeart'+value.id).html(importe1.toFixed(2))
                                        var subtotal1 = parseFloat(importe1/1.18).toFixed(2)
                                        $('#subtotalart'+value.id).html(subtotal1)
                                        $('#igv_uniqueart'+value.id).html((subtotal1*0.18).toFixed(2))

                                        var suma = 0;

                                        $('.subtotal').each(function() {
                                            suma = suma + parseFloat($(this).html())
                                        })
                                        $('#total_igv').val((suma*0.18).toFixed(2));

                                        var importe = 0;

                                        $('.importe').each(function() {
                                            importe = importe + parseFloat($(this).html())
                                        })
                                        $('#total').val(importe.toFixed(1)+'0')

                                        $('#total_noigv').val(($('#total').html()-$('#total_igv').html()).toFixed(2))
                                    })

                                    $('#closeart'+value.id).on('click', function() {
                                        var total = parseFloat($('#total').val()) - parseFloat($('#importeart'+value.id).html())
                                        $('#total').val(total.toFixed(1)+'0')
                                        var subtotal = parseFloat($('#total').val()/1.18)
                                        $('#total_noigv').val(subtotal.toFixed(2))
                                        $('#total_igv').val((subtotal*0.18).toFixed(2))
                                        $('#rowart'+value.id).remove()

                                    })

                    });
                });




            }
        });
    }
    });
});
