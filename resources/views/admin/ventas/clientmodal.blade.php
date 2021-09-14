<div class="modal fade" id="clientModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Venta</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('ventas.create') }}" method="POST">
                    @csrf
                    <p id="info_medic"></p>
                    <input type="hidden" name="cliente_id" id="cliente_id">

                    <div class="form-group">
                        <label for="dni">Cliente</label>
                        <div class="">
                            <input type="text" name="dni" class="d-inline form-control w-75" id="search_dni"
                            placeholder="Ingrese el DNI del cliente">

                        <a id="btn_dni" class="d-inline btn btn-primary btn-lg"><i class="align-middle"
                                data-feather="search"></i> Buscar</a>
                        </div>

                        <input type="text" name="nombre_cliente" style="text-transform:uppercase;" id="nombre_cliente" class="form-control mt-1" readonly>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" name="check" type="checkbox" id="cajaCheck">
                        <label class="form-check-label" for="flexCheckDefault">
                          Sin DNI
                        </label>
                      </div>

                    <div class="form-group">
                        <label for="date">Fecha Actual</label>
                        <input type="date" class="form-control" name="fecha" id="fecha" value="@php echo date('Y-m-d'); @endphp" readonly>
                    </div>


                    <div class="d-grid gap-2 mt-2">
                        <input type="submit" value="Ir a la cesta" class="btn btn-primary">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
