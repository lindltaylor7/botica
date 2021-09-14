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
                    <input type="hidden" name="medicamento_id" id="medicamento_id">
                    <input type="hidden" name="venta_id" id="venta_id" value="{{$id}}">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="tipo" id="cajaCheck">
                        <label class="form-check-label" for="flexCheckDefault">
                            Venta por caja
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="">Cantidad</label>
                        <input type="number" name="cantidad" id="cantidad" class="form-control">
                        <div class="invalid-feedback" id="ad-danger">
                            La cantidad solicitada excede al stock
                        </div>
                    </div>
                    <div class="form-group" id="cant_caja">
                        <label for="">Cantidad por caja</label>
                        <input type="number" id="nro_caja" class="form-control" readonly>
                        <div class="invalid-feedback" id="ad-danger">
                            La cantidad solicitada excede al stock
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Cantidad en Stock</label>
                        <input type="number" id="cant_stock" class="form-control" readonly>
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
                        <input type="number" step=".01" name="utilidad" id="utilidad" class="form-control" readonly>
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
