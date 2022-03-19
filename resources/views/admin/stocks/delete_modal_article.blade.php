<div class="modal fade modal-access" id="modalDeleteA{{$a->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Stock de: {{$a->generic_name}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">Código de Lote</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Fecha de Ingreso</th>
                    <th scope="col">Fecha de Expiración</th>
                    <th scope="col">Eliminar</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($a->stocks as $stock)
                    @foreach ($stock->batches as $batch)
                    <form action="{{route('batch.delete', $batch->id)}}" method="POST">
                      @csrf
                      @method('delete')
                      <tr>
                        <td>
                          <input type="text" name="code" value="{{$batch->code}}" class="form-control px-1">
                        </td>
                        <td>
                          <input type="number" name="quantity_unit" value="{{$batch->quantity_unit}}" class="form-control px-1">
                        </td>
                        <td>
                          <input type="date" name="entry_date" value="{{$batch->entry_date}}" class="form-control px-1">
                        </td>
                        <td>
                          <input type="date" name="expiry_date" value="{{$batch->expiry_date}}" class="form-control px-1">
                        </td>
                        <td>
                          <input type="submit" value="Eliminar" class="btn btn-danger">
                        </td>
                      </tr>
                    </form>
                    @endforeach
                  @endforeach 
                </tbody>
              </table>
            </div>
        </div>
  </div>
</div>

