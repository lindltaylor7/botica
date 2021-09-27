<div class="modal fade" id="priceModal{{$medicamento->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Precio de: {{$medicamento->generic_name}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('medicamentos.prec_upd')}}" method="POST">
                    @csrf
                    <input type="hidden" name="id_precio" id="id_precio">

                    <section>
                        <div class="form-row">
                            <div class="form-col">
                                <div class="input-group">
                                    <h6> Precios: </h6>
                                </div>
                            </div>                                                    
                        </div>
                        @foreach ($medicamento->prices as $precio)

                        <div class="form-row">
                            <div class="form-col">
                                <label class="form-label" for="p_caja">Precio de Costo por caja<span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">S./</span>
                                    </div>
                                    <input type="text" step="any" name="cost_price" class="form-control" id="p_caja" placeholder="Precio unitario" value="{{$precio->cost_price}}">
                                    @error('p_caja')
                                    <p class="alert alert-danger">El precio de caja unitario es obligatorio</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-col">
                                <label class="form-label" for="p_caja">Utilidad por caja<span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">S./</span>
                                    </div>
                                    <input type="text" step="any" name="utility" class="form-control" id="p_caja" placeholder="Precio unitario" value="{{$precio->utility}}">
                                    @error('p_caja')
                                    <p class="alert alert-danger">El precio de caja unitario es obligatorio</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-col">
                                <label class="form-label" for="p_caja">IGV por caja<span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">S./</span>
                                    </div>
                                    <input type="text" step="any" name="igv" class="form-control" id="p_caja" placeholder="Precio unitario" >
                                    @error('p_caja')
                                    <p class="alert alert-danger">El precio de caja unitario es obligatorio</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-col">
                                <label class="form-label" for="p_caja">Precio de venta por caja<span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="basic-addon2">S./</span>
                                    </div>
                                    <input type="text" step="any" name="sale_price" class="form-control" id="p_caja" placeholder="Precio unitario" value="{{$precio->sale_price}}">
                                    @error('utilidad')
                                        <p class="alert alert-danger">El porcentaje de utilidad es obligatorio</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        @endforeach        
                    </section>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
