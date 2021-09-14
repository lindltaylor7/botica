<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Medicamento</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('medicamentos.update')}}" method="POST">
                    @csrf
                    <input type="hidden" name="id_med" id="id_med">
                    <div class="form-group">
                        <label for="">Nombre Genérico</label>
                        <input type="text" name="n_generico" id="n_generico" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Nombre Comercial</label>
                        <input type="text" name="n_comercial" id="n_comercial" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Concentración</label>
                        <input type="text" name="concent" id="concent" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Presentación</label>
                        <input type="text" name="present" id="present" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Laboratorio</label>
                        <input type="text" name="lab" id="lab" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Número por Caja</label>
                        <input type="text" name="nro_caja" id="nro_caja" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Anaquel</label>
                        <input type="text" name="anaquel" id="anaquel" class="form-control">
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
