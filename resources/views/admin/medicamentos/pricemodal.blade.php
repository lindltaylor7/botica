<div class="modal fade" id="priceModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Precio de Medicamento</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('medicamentos.prec_upd')}}" method="POST">
                    @csrf
                    <input type="hidden" name="id_precio" id="id_precio">

                    <div class="form-group">
                        <label for="p_costo">Precio de Costo Unitario</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">S./</span>
                            </div>
                            <input type="number" step="any" name="p_costo" class="form-control" id="p_costo"
                                placeholder="Precio unitario">
                        </div>
                    </div>
                    <label for="utilidad">Porcentaje de Utilidad</label>
                    <div class="input-group">
                        <input type="number" name="utilidad" class="form-control" id="utilidad" placeholder="Utilidad">
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2">%</span>
                        </div>
                    </div>
                    <label for="p_unitario">Precio de Venta Unitario</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">S./</span>
                        </div>
                        <input type="number" name="p_unitario" class="form-control" id="p_unitario"
                            placeholder="Precio de Venta" readonly>
                    </div>
                    <label for="p_caja">Precio de Costo por Caja</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">S./</span>
                        </div>
                        <input type="number" step="any" name="p_caja" class="form-control" id="p_caja"
                            placeholder="Precio por caja">

                    </div>
                    <label for="utilidad_caja">Porcentaje de Utilidad por Caja</label>
                    <div class="input-group">
                        <input type="number" step="any" name="utilidad_caja" class="form-control" id="utilidad_caja"
                            placeholder="Utilidad">
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2">%</span>
                        </div>
                    </div>
                    <label for="p_venta_caja">Precio de Venta por Caja</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">S./</span>
                        </div>
                        <input type="number" name="p_venta_caja" class="form-control" id="p_venta_caja"
                            placeholder="Precio de Venta caja" readonly>
                    </div>
                    <div class="d-grid gap-2 mt-2">
                        <input type="submit" value="Editar" class="btn btn-primary">
                      </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
