<div class="modal fade modal-access" id="priceModal{{$medicamento->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Precio de: {{$medicamento->generic_name}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('medicamentos.update',$medicamento->id)}}" method="POST">
                    @csrf
                    @method('put')
                    <input type="hidden"  id="number_box_edit" value="{{$medicamento->number_box}}">
                    <input type="hidden"  id="number_blister_edit" value="{{$medicamento->number_blister}}">

                    <section>
                        <h3>Precios del Medicamento</h3>
                        <div class="form-row">
                            <div class="form-col">
                                <label class="form-label">Precio de Costo por caja</label>
                                <div class="form-holder">
                                    <i>S./</i>
                                    <input type="text" name="cost_box" id="cost_box" class="form-control" placeholder="Costo por Caja" value={{$medicamento->price->cost_price*$medicamento->number_box}}>
                                </div>
                            </div>
                            <div class="form-col">
                                <label class="form-label">Porcentaje de Utilidad por caja</label>
                                <div class="form-holder">
                                    <i>%</i>
                                    <input type="text" id="utility_box" class="form-control" placeholder="Utilidad por caja"  value="{{$medicamento->price->utility}}">

                                </div>
                            </div>
                            <div class="form-col">
                                <label class="form-label">Precio de venta por caja</label>
                                <div class="form-holder">
                                    <i>S./</i>
                                    <input type="text" id="sale_price_box" class="form-control" placeholder="P. de venta por caja" readonly value={{$medicamento->price->sale_price*$medicamento->number_box}}>

                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-col">
                                <label class="form-label">Precio de Costo por blister</label>
                                <div class="form-holder">
                                    <i>S./</i>
                                    <input type="text" id="cost_price_blister" class="form-control" placeholder="Costo por blister" readonly value="{{$medicamento->price->sale_price * $medicamento->number_blister}}">
                                </div>
                            </div>
                            <div class="form-col">
                                <label class="form-label">Porcentaje de Utilidad por blister</label>
                                <div class="form-holder">
                                    <i>%</i>
                                    <input type="text" id="utility_blister" class="form-control" placeholder="Utilidad por blister" readonly  value="{{$medicamento->price->utility}}">

                                </div>
                            </div>

                            <div class="form-col">
                                <label class="form-label">Precio de venta por blister</label>
                                <div class="form-holder">
                                    <i>S./</i>
                                    <input type="text" id="sale_price_blister" class="form-control" placeholder="P. de venta por blister" readonly value="{{$medicamento->price->sale_price * $medicamento->number_blister}}">

                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-col">
                                <label class="form-label">Precio de Costo por unidad</label>
                                <div class="form-holder">
                                    <i>S./</i>
                                    <input type="text" name="cost_price" id="cost_price_unit" class="form-control" placeholder="Costo por unidad" readonly value="{{$medicamento->price->cost_price}}">
                                </div>
                            </div>
                            <div class="form-col">
                                <label class="form-label">Porcentaje de Utilidad por unidad</label>
                                <div class="form-holder">
                                    <i>%</i>
                                    <input type="text" name="utility" id="utility_unit" class="form-control" placeholder="Utilidad por unidad" readonly value="{{$medicamento->price->utility}}">
                                </div>
                            </div>

                            <div class="form-col">
                                <label class="form-label">Precio de venta por unidad</label>
                                <div class="form-holder">
                                    <i>S./</i>
                                    <input type="text" name="sale_price" id="sale_price_unit" class="form-control" placeholder="P. de venta por unidad" readonly value="{{$medicamento->price->sale_price}}">
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

