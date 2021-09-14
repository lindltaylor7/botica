<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Añadir Medicamento</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('detail.update')}}" method="POST">
                    @csrf
                    <p id="info_medic"></p>
                    <input type="hidden" name="detail_id" id="detail_id">
                    <input type="hidden" name="venta_id" id="venta_id" value="{{$id}}">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="tipo" id="cajaCheck_edit">
                        <label class="form-check-label" for="flexCheckDefault">
                            Venta por caja
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="">Cantidad</label>
                        <input type="number" name="cantidad" id="cantidad_edit" class="form-control">
                        <div class="invalid-feedback" id="ad-danger">
                            La cantidad solicitada excede al stock
                        </div>
                    </div>
                    <div class="form-group" id="cant_caja_edit">
                        <label for="">Cantidad por caja</label>
                        <input type="number" id="nro_caja_edit" class="form-control" readonly>
                        <div class="invalid-feedback" id="ad-danger-edit">
                            La cantidad solicitada excede al stock
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Cantidad en Stock</label>
                        <input type="number" id="cant_stock_edit" class="form-control" readonly>
                    </div>
                    <label for="price">Precio</label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1">S./</span>
                        <input type="number" id="price_edit" class="form-control" readonly>
                        <input type="number" id="pricebox_edit" class="form-control" readonly>
                    </div>
                    <label for="utilidad">Sub-total</label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1">S./</span>
                        <input type="number" step=".01" name="utilidad" id="utilidad_edit" class="form-control" readonly>
                    </div>
                    <div class="d-grid gap-2 mt-2">
                        <input type="submit" value="Editar" id="btn-agregar-edit" class="btn btn-primary">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

