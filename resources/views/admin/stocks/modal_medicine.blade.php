<div class="modal fade" id="modal{{$medicine->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <label for="">Nombre Comercial</label>
                    <input type="text" name="cantidad" id="cantidad" class="form-control" value="{{$medicine->tradename}}">
                </div>
                <div class="form-group">
                    <label for="">Concentración</label>
                    <input type="text" name="cantidad" id="cantidad" class="form-control" value="{{$medicine->concentration}}"">
                </div>
                <div class="form-group">
                    <label for="">Presentación</label>
                    <input type="text" name="cantidad" id="cantidad" class="form-control" value="{{$medicine->presentation}}">
                </div>
                <div class="form-group">
                    <label for="">Laboratorio</label>
                    <input type="text" name="cantidad" id="cantidad" class="form-control" value="{{$medicine->laboratory}}">
                </div>
                <div class="form-group">
                    <label for="">Fecha de Ingreso</label>
                    <input type="date" name="f_ingreso" id="f_ingreso" class="form-control" value="{{$medicine->created_at}}">
                </div>
                <div class="form-group">
                    <label for="">Fecha de Vencimiento</label>
                    <input type="date" name="f_ingreso" id="f_ingreso" class="form-control" value="{{$medicine->updated_at}}">
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
