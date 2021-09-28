<div class="modal fade" id="editMedicineModal{{$articulo->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Medicamento: {{$articulo->tradename}}</h5>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">X</button>
            </div>
            <div class="modal-body">
                <form action="{{route('articles.update',$articulo->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="">Nombre de Articulo</label>
                        <input type="text" name="tradename" id="n_comercial" class="form-control" value="{{$articulo->tradename}}">
                    </div>
                    <div class="form-group">
                        <label for="">Marca de Articulo</label>
                        <input type="text" name="trademark" id="trademark" class="form-control" value="{{$articulo->trademark}}">
                    </div>
                    <div class="form-group">
                        <label for="">Presentación</label>
                        <input type="text" name="presentation" id="present" class="form-control" value="{{$articulo->presentation}}">
                    </div>
                    <div class="form-group">
                        <label for="">Proovedor</label>
                        <input type="text" name="supplier" id="lab" class="form-control" value="{{$articulo->supplier}}">
                    </div>
                    <div class="form-group">
                        <label for="">Número por Caja</label>
                        <input type="number" name="number_box" id="nro_caja" class="form-control" value="{{$articulo->number_box}}">
                    </div>
                    <div class="d-grid gap-2 mt-2">
                        <input type="submit" value="Editar" class="btn btn-info">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
