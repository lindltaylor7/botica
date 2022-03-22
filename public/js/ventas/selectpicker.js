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

    $('#search').on('keyup', function(){
        var search = $(this).val()
        var tipo = $("input[name='u_type']:checked").val();
        var total_input = null;

        function calculatePrice(value, props) {
            let { cant, vunit, tipo, importe, subtotal, igv_unique, partial_sale, partial_utility, partial_igv, desc } = props;
            var suma = 0;
            var importeTotal = 0;
            
            const inputCantVal = $(`#${cant}${value.id}`).val();

            var importe1= parseFloat(inputCantVal * parseFloat($(`#${vunit}${value.id}`).html())*$(`#${tipo}${value.id}`).val()).toFixed(1)+'0'
            var subtotal1 = parseFloat(importe1 / 1.18).toFixed(2)

            $(`#${importe}${value.id}`).html(importe1)
            $(`#${subtotal}${value.id}`).html(subtotal1)
            $(`#${igv_unique}${value.id}`).html((subtotal1 * 0.18).toFixed(2))


            $('.subtotal').each(function() {
                suma = suma + parseFloat(inputCantVal)
            })

            $('#total_igv').val((suma * 0.18).toFixed(2));

            $('.importe').each(function() {
                setTimeout(() => {
                    importeTotal = importeTotal + parseFloat(this.textContent)
                    $('#total').val((importeTotal).toFixed(1) + '0')
                },0)
            })

            $(`#${partial_sale}${value.id}`).val(importe1 - $(`#${desc}${value.id}`).val())
            $(`#${partial_utility}${value.id}`).val(subtotal1)
            $(`#${partial_igv}${value.id}`).val((subtotal1 * 0.18).toFixed(2))

            $('#total_noigv').val(($('#total').val()-$('#total_igv').val()).toFixed(2))
        }

        function validStock(value, props) {
            let { cant, tipo } = props
            const inputCant = $(`#${cant}${value.id}`).val();

            if(inputCant * $(`#${tipo}${value.id}`).val() > total_input){
                alert('La cantidad excede al stock')
                $(`#${cant}${value.id}`).val('')
            }
        }

        function discount(value, props) {
            let { desc, cant, importe } = props
            
            const descValue = $(`#${desc}${value.id}`).val();

            if (!descValue) return

            const siblingCant = $(`#${cant}${value.id}`).val();

            if (siblingCant) {
                const descTotal = (value.price.sale_price * siblingCant) - descValue;
                $(`#${importe}${value.id}`).html(descTotal.toFixed(1));
            }
        }

        function deleteProduct(value, { importe, row }) {
            var total = parseFloat($('#total').val()) - parseFloat($(`#${importe}${value.id}`).html())
            $('#total').val(total.toFixed(1) + '0')
            var subtotal = parseFloat($('#total').val() / 1.18)
            $('#total_noigv').val(subtotal.toFixed(2))
            $('#total_igv').val((subtotal * 0.18).toFixed(2))
            $(`#${row}${value.id}`).remove()
        }

        function changeTipo(value, props) {
            let { tipo, vunit, importe, subtotal, igv_unique } = props

            let inputType = $(`#${tipo}${value.id}`).val();
            $(`#${vunit}${value.id}`).html((inputType * value.price.sale_price).toFixed(2))
            
            const inputCant = $(`#cant${value.id}`).val()
            if (!inputCant) return;
            
            let priceSale = $(`#${vunit}${value.id}`).html();
            var importe1 = parseFloat(priceSale).toFixed(1)
            var subtotal1 = parseFloat(importe1 / 1.18).toFixed(2)
            let igv = subtotal1 * 0.18;
            
            var suma = 0;

            $(`#${importe}${value.id}`).html(importe1)
            $(`#${subtotal}${value.id}`).html(subtotal1)
            $(`#${igv_unique}${value.id}`).html((igv).toFixed(2))

            $('.subtotal').each(function() {
                suma = suma + parseFloat($(`#${tipo}${value.id}`).html())
            });
        }
        
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
                    var list = '';

                    $('#medicamentos_select').html('');
                    var total = 0;
                    $.each(res, function(index, value){
                        $.each(value.stocks, function(i,v){
                            $.each(v.batches, function(i2, v2){
                                total += v2.quantity_unit
                            })
                        })

                        if(total == 0){
                            list = '<tr><td><a class="search-link'+index+' text-danger" data-total='+total+' data-price="'+value.sale_price+'" data-box="'+value.sale_price+'" id="'+value.id+'">'+value.generic_name+' - '+value.tradename+' - '+value.concentration+' - '+value.presentation+' - '+value.laboratory+' - Precio unitario: S./'+value.price.sale_price+' Cantidad: '+total+'</a></td></tr>'
                        }else{
                            list = '<tr><td><a class="search-link'+index+'" data-total='+total+' data-price="'+value.price.sale_price+'" data-box="'+value.price.sale_price+'" id="'+value.id+'">'+value.generic_name+' - '+value.tradename+' - '+value.concentration+' - '+value.presentation+' - '+value.laboratory+' - Precio unitario: S./'+value.price.sale_price+' Cantidad: '+total+'</a></td></tr>'
                        }

                        $('#medicamentos_select').append(list);
                        total = 0;
                        $('.search-link'+index).on('click', function(){
                            $('#medicamentos_select').html('');
                            $('#search').val('')
                            total_input = $(this).data('total');

                            row = `<tr id="rowM${value.id}">
                                    <td>${value.generic_name}</td>
                                    <td>${value.tradename}</td>
                                    <td>${value.concentration}</td>
                                    <td>
                                        <select id="tipoM${value.id}" class="form-control px-2" style="width:100px">
                                            <option value="1">Unidad</option>
                                            <option value=${value.number_blister}>Blister (${value.number_blister})</option>
                                            <option value=${value.number_box}>Caja (${value.number_box})</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input name="detail[${$('#table_sales tr').length-1}][quantity]" step="1" id="cantM${value.id}" class="form-control quantity px-2" type="number" style="width:80px"/>
                                        <input type="hidden" name="detail[${$('#table_sales tr').length-1}][unit_type]" value="${tipo}"/>
                                        <input type="hidden" id="partial_utility_M${value.id}" name="detail[${$('#table_sales tr').length-1}][partial_utility]" />
                                        <input type="hidden" id="partial_igv_M${value.id}" name="detail[${$('#table_sales tr').length-1}][partial_igv]" />
                                        <input type="hidden" id="partial_sale_M${value.id}" name="detail[${$('#table_sales tr').length-1}][partial_sale]" />
                                        <input type="hidden" id="medicine${value.id}" value="${value.id}" name="detail[${$('#table_sales tr').length-1}][medicine_id]" />
                                    </td>
                                    <td><input class="form-control px-2" step="0.1" maxlength="4" type="number" id="descM${value.id}" name="descM${value.id}" style="width:80px"></td>
                                    <td id="vunitM${value.id}" class="vunit">${value.price.sale_price}</td>
                                    <td id="subtotalM${value.id}" class="subtotal"></td>
                                    <td id="igv_uniqueM${value.id}"></td>
                                    <td id="importeM${value.id}" class="importe"></td>
                                    <td><a id="closeM${value.id}" class="btn btn-danger">X</a></td>
                                </tr>`

                            if (!document.getElementById(`row${value.id}`)) {
                                $('#cart-shop').append(row);
                            } else {
                                alert("Este producto ya está en venta");
                            }

                            let props = {
                                row: 'rowM',
                                tipo: 'tipoM',
                                cant: 'cantM',
                                desc: 'descM',
                                vunit: 'vunitM',
                                subtotal: 'subtotalM',
                                igv_unique: 'igv_uniqueM',
                                importe: 'importeM',
                                close: 'closeM',
                                partial_sale: 'partial_sale_M',
                                partial_utility: 'partial_utility_M',
                                partial_igv: 'partial_igv_M'
                            }

                            
                            $('#cantM'+value.id).on('click',function(){
                                validStock(value, props)
                                calculatePrice(value, props)
                                discount(value, props);
                            })
                            
                            $('#cantM'+value.id).on('keyup',function(){
                                validStock(value, props)
                                calculatePrice(value, props)
                                discount(value, props);
                            })
                            
                            $('#closeM'+value.id).on('click', function() {
                                deleteProduct(value, props)
                            })
                                

                            $('#tipoM'+value.id).on('change', function(){
                                validStock(value, props)
                                changeTipo(value, props)
                                calculatePrice(value, props)
                                discount(value, props);
                            })

                            $(`#descM${value.id}`).on('keyup', function() {
                                validStock(value, props)
                                calculatePrice(value, props)
                                discount(value, props);
                            })

                            $(`#descM${value.id}`).on('click', function() {
                                validStock(value, props)
                                calculatePrice(value, props)
                                discount(value, props);
                            })
                        });
                    })
                }
            });
        }
        else {
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
                    var list = '';
                    $('#medicamentos_select').html('');
                    var total = 0;

                    $.each(res, function(index, value){
                        res.forEach(el => {
                            $.each(el.stocks, function(i,v){
                                $.each(v.batches, function(i2, v2){
                                    total += v2.quantity_unit
                                })

                            })
                        })

                        if(total == 0){
                            list = `
                                <tr>
                                    <td>
                                        <a class="search-link${index} text-danger" data-total="${total}" data-price="${value.sale_price}" data-box="${value.sale_price}" id="${value.id}">${value.tradename} - ${value.trademark} - ${value.presentation} - ${value.supplier} - Precio unitario: S/. ${value.price.sale_price} Cantidad: ${total}</a>
                                    </td>
                                </tr>
                            `
                        }else{
                            list = `
                                <tr>
                                    <td>
                                        <a class="search-link${index}" data-total="${total}" data-price="${value.sale_price}" data-box="${value.sale_price}" id="${value.id}">${value.tradename} - ${value.trademark} - ${value.presentation} - ${value.supplier} - Precio unitario: S/. ${value.price.sale_price} Cantidad: ${total}</a>
                                    </td>
                                </tr>
                            `
                        }

                        $('#medicamentos_select').append(list);

                        total = 0;

                        $('.search-link'+index).on('click', function(){
                            total_input = $(this).data('total');
                            $('#medicamentos_select').html('');
                            $('#search').val('')

                            row = `
                                <tr id="rowA${value.id}">
                                    <td>${value.tradename}</td>
                                    <td>${value.tradename}</td>
                                    <td>${value.presentation}</td>
                                    <td>
                                    <select name="detail[${$('#table_sales tr').length-1}][unit_type]" id="tipoA${value.id}" class="form-control px-2" style="width: 100px;">
                                        <option value="1">Unidad</option>
                                        <option value=${value.number_box}>Caja (${value.number_box})</option>
                                    </select>
                                    </td>
                                    <td>
                                        <input name="detail[${$('#table_sales tr').length-1}][quantity]" id="cantA${value.id}" class="form-control quantity px-2" type="number" style="width:80px"/>
                                        <input type="hidden" name="detail[${$('#table_sales tr').length-1}][unit_type]" value="${tipo}"/>
                                        <input type="hidden" id="partial_utility_A${value.id}" name="detail[${$('#table_sales tr').length-1}][partial_utility]" />
                                        <input type="hidden" id="partial_igv_A${value.id}" name="detail[${$('#table_sales tr').length-1}][partial_igv]" />
                                        <input type="hidden" id="partial_sale_A${value.id}" name="detail[${$('#table_sales tr').length-1}][partial_sale]" />
                                        <input type="hidden" id="medicine${value.id}" value="${value.id}" name="detail[${$('#table_sales tr').length-1}][article_id]" />
                                    </td>
                                    <td><input class="form-control px-2" step="0.1" type="number" id="descA${value.id}" name="descA${value.id}" style="width:80px"></td>
                                    <td id="vunitA${value.id}" class="vunit">${value.price.sale_price}</td>
                                    <td id="subtotalA${value.id}" class="subtotal"></td>
                                    <td id="igv_uniqueA${value.id}"></td>
                                    <td id="importeA${value.id}" class="importe"></td>
                                    <td><a id="closeA${value.id}" class="btn btn-danger">X</a></td>
                                </tr>`

                            if (!document.getElementById(`rowart${value.id}`)) {
                                $('#cart-shop').append(row);
                            } else {
                                alert("Este producto ya está en venta");
                            }

                            let props = {
                                row: 'rowA',
                                tipo: 'tipoA',
                                cant: 'cantA',
                                desc: 'descA',
                                vunit: 'vunitA',
                                subtotal: 'subtotalA',
                                igv_unique: 'igv_uniqueA',
                                importe: 'importeA',
                                close: 'closeA',
                                partial_sale: 'partial_sale_A',
                                partial_utility: 'partial_utility_A',
                                partial_igv: 'partial_igv_A'
                            }

                            $('#cantA'+value.id).on('keyup',function() {
                                validStock(value, props)
                                calculatePrice(value, props)
                                discount(value, props);
                            })

                            $('#cantA'+value.id).on('click',function(){
                                validStock(value, props)
                                calculatePrice(value, props)
                                discount(value, props);
                            })

                            $(`#descA${value.id}`).on('keyup', function() {
                                validStock(value, props)
                                calculatePrice(value, props)
                                discount(value, props);
                            })

                            $(`#descA${value.id}`).on('click', function() {
                                validStock(value, props)
                                calculatePrice(value, props)
                                discount(value, props);
                            })

                            $('#tipoA'+value.id).on('change', function(){
                                validStock(value, props)
                                changeTipo(value, props)
                                calculatePrice(value, props)
                                discount(value, props);
                            })

                            $('#closeA'+value.id).on('click', function() {
                                deleteProduct(value, props)
                            })
                        });
                    });
                }
            });
        }
    });
});
