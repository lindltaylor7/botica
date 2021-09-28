<div class="modal fade" id="imgModal{{$medicamento->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Imagen del Medicamento</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                @if($medicamento->image)
                <img class="" src="{{Storage::url($medicamento->image->url)}}" alt="Img de medicamento" style="width:100%">
               {{--  <img class="" src="https://boticaexcelentemente.com/storage/{{$medicamento->img}}" alt="Imagen de medicamento" style="width:100%"> --}}
                @else
                <p>No hay imagen para mostrar</p>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
