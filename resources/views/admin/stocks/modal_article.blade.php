<div class="modal fade" id="modalA{{$a->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Características del Artículo</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{route('stock.update')}}" method="POST">
                @csrf
                <input type="hidden" name="id_stock" id="id_stock">

                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col">Características</th>
                      <th scope="col">Descripción</th>
                    </tr>
                  </thead>
                  <tbody>  
                    <tr>
                      <th scope="row">Nombre Comercial</th>
                      <td>{{$a->tradename}}</td>
                    </tr>
                    <tr>
                      <th scope="row">Marca Comercial</th>
                      <td>{{$a->trademark}}</td>
                    </tr>
                    <tr>
                      <th scope="row">Presentación</th>
                      <td>{{$a->presentation}}</td>
                    </tr>
                    <tr>
                      <th scope="row">Proovedor</th>
                      <td>{{$a->supplier}}</td>
                    </tr>
                    <tr>
                      <th scope="row">Anaquel</th>
                      <td>@foreach($a->stocks as $ast)
                            <li> {{$ast->shelf}}</li> 
                          @endforeach
                      </td>
                    </tr>
                  </tbody>
                </table>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
