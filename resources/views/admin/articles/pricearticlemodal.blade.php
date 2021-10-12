<div class="modal fade" id="priceModal{{$articulo->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Precio de: {{$articulo->tradename}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('articles.update',$articulo->id)}}" method="POST">
                    @csrf
                    @method('put')
                    <input type="hidden" name="number_box" id="number_box" value="{{$articulo->number_box}}">

                    <section>
                        <h3>Precios del Articulo</h3>
                        <div class="form-row">
                            <div class="form-col">
                                <label class="form-label">Precio de Costo por caja</label>
                                <div class="form-holder">
                                    <i>S./</i>
                                    <input type="text" name="cost_box" id="cost_box" class="form-control" placeholder="Costo por Caja" value={{round($articulo->price->cost_price * $articulo->number_box, 1)}}>
                                </div>
                            </div>
                            <div class="form-col">
                                <label class="form-label">Porcentaje de Utilidad por caja</label>
                                <div class="form-holder">
                                    <i>%</i>
                                    <input type="text" id="utility_box" class="form-control" placeholder="Utilidad por caja" value="{{$articulo->price->utility}}">
        
                                </div>
                            </div>
                            <div class="form-col">
                                <label class="form-label">Precio de venta por caja</label>
                                <div class="form-holder">
                                    <i>S./</i>
                                    <input type="text" id="sale_price_box" class="form-control" placeholder="P. de venta por caja" readonly value={{round($articulo->price->cost_price * $articulo->number_box + ($articulo->price->cost_price * $articulo->number_box * $articulo->price->utility / 100),1)}}>
        
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-col">
                                <label class="form-label">Precio de Costo por unidad</label>
                                <div class="form-holder">
                                    <i>S./</i>
                                    <input type="text" name="cost_price" id="cost_price_unit" class="form-control" placeholder="Costo por unidad"  readonly  value={{$articulo->price->cost_price}}>
                                </div>
                            </div>
                            <div class="form-col">
                                <label class="form-label">Porcentaje de Utilidad por unidad</label>
                                <div class="form-holder">
                                    <i>%</i>
                                    <input type="text" name="utility" id="utility_unit" class="form-control" placeholder="Utilidad por unidad"  readonly value="{{$articulo->price->utility}}">
                                </div>
                            </div>
        
                            <div class="form-col">
                                <label class="form-label">Precio de venta por unidad</label>
                                <div class="form-holder">
                                    <i>S./</i>
                                    <input type="text" name="sale_price" id="sale_price_unit" class="form-control" placeholder="P. de venta por unidad" readonly value={{round($articulo->price->sale_price, 1)}}>
        
                                </div>
                            </div>
                        </div>
                    </section>                   
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-block btn-success">Actualizar</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>
<script>      
        

    // $('#cost_price_unit').on('keyup', function(){
    //     //UNIDAD
    //     var pc_ud = pc_box/$('#number_box_edit').val()
    //     $('#cost_price_unit').val(pc_ud.toFixed(1))
    //     var igv_ud = parseFloat((pc_ud+(pc_ud)*'#utility'/100)*18/100)
    //     var total_ud = parseFloat(pc_ud)+igv_ud
    //     $('#sale_price_unit').val(total_ud.toFixed(1))

    // });

    //     $('#cost_box_edit').on('keyup', function(){
    //         //UNIDAD
    //         var pc_ud = pc_box/$('#number_box_edit').val()
    //         $('#cost_price_unit').val(pc_ud.toFixed(1))
    //         var igv_ud = parseFloat((pc_ud+(pc_ud)*'#utility'/100)*18/100)
    //         var total_ud = parseFloat(pc_ud)+igv_ud
    //         $('#sale_price_unit').val(total_ud.toFixed(1))

    //     });


    //     $('#utility_box').on('keyup', function(){
    //         //CAJA
    //         var pc_box = $('#cost_box').val();
    //         var percent = $(this).val();
    //         var subtotal = parseFloat(pc_box) + parseFloat(percent);
    //         var igv = subtotal * 18 /100;
    //         var total = subtotal + igv;
    //         $('#sale_price_box').val(total.toFixed(1));

    //         $('#utility_blister').val(percent)
    //         $('#utility_unit').val(percent)

    //         $('#sale_price_blister').val((total/$('#number_blister').val()).toFixed(1))
    //         $('#sale_price_unit').val((total/$('#number_box').val()).toFixed(1))
    //     });

        // const $template = document.getElementById("template-input").content;
        // const $fragment = document.createDocumentFragment(); 
        // $('#inputDynamic').on('change', function (e) {
        //     d.getElementById("boxDynamic").textContent = "";
        //     for (let i = 0; i < $(this).val(); i++) {
        //         $template.querySelector(".code").name = `batch[${i}][code]`;
        //         $template.querySelector(".quantity_unit").name = `batch[${i}][quantity_unit]`;
        //         $template.querySelector(".entry_date").name = `batch[${i}][entry_date]`;
        //         $template.querySelector(".expiry_date").name = `batch[${i}][expiry_date]`;

        //         let $clone = d.importNode($template, true);
        //         $fragment.appendChild($clone);
        //     }
        //     $('#boxDynamic').append($fragment)
        // });
    // });
</script>