<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Editar Medicamento</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{route('stock.update')}}" method="POST">
                @csrf
                <input type="hidden" name="id_stock" id="id_stock">
                <div class="form-group">
                    <label for="">Cantidad</label>
                    <input type="number" name="cantidad" id="cantidad" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Fecha de Ingreso</label>
                    <input type="date" name="f_ingreso" id="f_ingreso" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Presentación</label>
                    <input type="date" name="f_vencimiento" id="f_vencimiento" class="form-control">
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
