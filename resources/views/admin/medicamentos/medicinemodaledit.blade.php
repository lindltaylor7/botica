<div class="modal fade" id="editMedicineModal{{$medicamento->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Medicamento: {{$medicamento->generic_name}}</h5>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">X</button>
            </div>
            <div class="modal-body">
                <form action="{{route('medicamentos.update',$medicamento->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="">Nombre Genérico</label>
                        <input type="text" name="generic_name" id="n_generico" class="form-control" value="{{$medicamento->generic_name}}">
                    </div>
                    <div class="form-group">
                        <label for="">Nombre Comercial</label>
                        <input type="text" name="tradename" id="n_comercial" class="form-control" value="{{$medicamento->tradename}}">
                    </div>
                    <div class="form-group">
                        <label for="">Concentración</label>
                        <input type="text" name="concentration" id="concent" class="form-control" value="{{$medicamento->concentration}}">
                    </div>
                    <div class="form-group">
                        <label for="">Presentación</label>
                        <input type="text" name="presentation" id="present" class="form-control" value="{{$medicamento->presentation}}">
                    </div>
                    <div class="form-group">
                        <label for="">Laboratorio</label>
                        <input type="text" name="laboratory" id="lab" class="form-control" value="{{$medicamento->laboratory}}">
                    </div>
                    <div class="form-group">
                        <label for="">Número por Caja</label>
                        <input type="number" name="number_caja" id="nro_caja" class="form-control" value="{{$medicamento->number_box}}">
                    </div>
                    <div class="form-group">
                        <label for="">Numero por blister</label>
                        <input type="number" name="number_blister" id="anaquel" class="form-control" value="{{$medicamento->number_blister}}"> 
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
