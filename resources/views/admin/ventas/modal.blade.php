<div class="modal fade" id="ventaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Añadir Medicamento</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('detail.store')}}" method="POST">
                    @csrf
                    <p id="info_medic"></p>
                    <input type="hidden" name="medicine_id" id="medicine_id">
                    <input type="hidden" name="sale_id" id="sale_id" value="1">
                    <div class="form-group mt-3 mb-2">
                        <select class="form-select" name="unit_type_id" id="cajaCheck">
                            <option value="1" selected>Venta Unitaria</option>
                            <option value="2">Venta por Blister</option>
                            <option value="3">Venta por Caja</option>
                          </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="">Cantidad</label>
                        <input type="number" name="quantity" id="quantity" class="form-control">
                        <div class="invalid-feedback" id="ad-danger">
                            La cantidad solicitada excede al stock
                        </div>
                    </div>
                    <div class="form-group" id="cant_blister">
                        <label for="">Cantidad por Blister</label>
                        <input type="number" id="number_blister" class="form-control" readonly>
                        <div class="invalid-feedback" id="ad-danger">
                            La cantidad solicitada excede al stock
                        </div>
                    </div>
                    <div class="form-group" id="cant_caja">
                        <label for="">Cantidad por Caja</label>
                        <input type="number" id="number_box" class="form-control" readonly>
                        <div class="invalid-feedback" id="ad-danger">
                            La cantidad solicitada excede al stock
                        </div>
                    </div>
                    <div class="form-group" id="stock">
                        <label for="">Stock en Unidades</label>
                        <input type="number" id="cant_stock" class="form-control" readonly>
                    </div>
                    <div class="form-group" id="stock_blister">
                        <label for="">Stock por Blisters</label>
                        <input type="number" id="cant_stock_blister" class="form-control" readonly>
                    </div>
                    <div class="form-group" id="stock_caja">
                        <label for="">Stock por Cajas</label>
                        <input type="number" id="cant_stock_caja" class="form-control" readonly>
                    </div>
                    <label for="price">Precio</label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1">S./</span>
                        <input type="number" name="price" id="price" class="form-control" readonly>
                        <input type="number" name="pricebox" id="pricebox" class="form-control" readonly>
                    </div>
                    <label for="utilidad">Sub-total</label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1">S./</span>
                        <input type="number" step=".01" name="partial_utility" id="partial_utility" class="form-control" readonly>
                    </div>
                    <div class="d-grid gap-2 mt-2">
                        <input type="submit" value="Agregar" id="btn-agregar" class="btn btn-primary">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
