<div class="modal fade" id="imgModal{{$articulo->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Imagen del Articulo: {{$articulo->tradename}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                 {{-- @if($medicamento->img)
                <img class="" src="{{Storage::url($medicamento->img)}}" alt="Imagen de medicamento" style="width:100%">
                <img class="" src="https://boticaexcelentemente.com/storage/{{$medicamento->img}}" alt="Imagen de medicamento" style="width:100%">
                @else
                <p>No hay imagen para mostrar</p>
                @endif  --}}

                <form action="{{route('articles.update',$articulo->id)}}" id="signup-form" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <div class="user_pro_img_area">                            
                            @isset($articulo->image)
                            <img id="pictureArticleupdate" src="{{asset('storage/'.$articulo->image->url)}}" alt="" style="width: 150px; height: 150px; object-fit: cover;">
                            @else
                            <p>No hay imagen para mostrar.</p>
                            @endisset
                            <div class="custom-file-upload">
                                <input type="file" id="fotoArticleupdate" name="fotoArticleupdate">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-block btn-lg btn-success">Actualizar</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>


<script>
    //CAMBIAR IMAGEN CUADNO SE SELECCIONE UNA FOTO
    document.getElementById("fotoArticleupdate").addEventListener('change', cambiarImagen);
    function cambiarImagen(event){
        var file = event.target.files[0];
        var reader = new FileReader();
        reader.onload = (event) => {
            document.getElementById("pictureArticleupdate").setAttribute('src', event.target.result);
        };
        reader.readAsDataURL(file);
    }

    </script>
