@extends('layout.template')

@section('title', 'Inicio')

@section('content')
<div class="container-fluid">
  <h1 class="h3 mb-3">Tabla de Medicamentos</h1>
  <div>
      <div class="">
          <div class="card shadow p-4">
              <div class="">
                  <a href="{{ route('medicamentos.create') }}" class="d-inline-block btn btn-primary btn-lg fs-6"><i class="align-middle" data-feather="plus"></i>Agregar Medicamentos</a>
              </div>
              <div class="table table-responsive">
                <table id="myTable" class="main__datatable-table">
                      <thead>
                          <tr>
                            <th>Nombre Genérico</th>
                            <th>Nombre Comercial</th>
                            <th>Concent.</th>
                            <th>Present.</th>
                            <th>Laboratorio</th>
                            <th>Precio</th>
                            <th>Stock</th>
                            <th>Anaquel</th>
                            <th>Foto</th>
                            <th>Opciones</th>
                          </tr>
                      </thead>
                      <tbody id="dynamic-row">
                        @foreach($medicamentos as $medicamento)
                        <tr>
                            <td>{{ucfirst(mb_strtolower($medicamento->generic_name,'UTF-8'))}}</td>
                            <td>{{ucfirst(mb_strtolower($medicamento->tradename,'UTF-8'))}}</td>
                            <td>{{ucfirst(strtolower($medicamento->concentration))}}</td>
                            <td>{{ucfirst(strtolower($medicamento->presentation))}}</td>
                            <td>{{ucfirst(strtolower($medicamento->laboratory))}}</td>
                            <td>S./ {{$medicamento->price->sale_price}}</td>
                            <td>
                                @php
                                $suma=0
                                @endphp
                                @foreach ($cantidad as $cant)
                                    @if ($medicamento->id == $cant->stockable_id && $cant->stockable_type == "App\Models\Medicine")
                                        @foreach ($cant->batches as $c)
                                            @php
                                                $suma += $c->quantity_unit;
                                            @endphp
                                        @endforeach
                                    @endif
                                @endforeach
                                @php
                                    echo $suma
                                @endphp
                            </td>
                            <td>
                            @foreach ($medicamento->stocks as $stock)
                            <span class="badge bg-primary">{{$stock->shelf}}</span>
                            @endforeach
                            </td>
                            <td>
                              <button type="button" class="btn btn-xs btn-danger fas fa-image" data-bs-toggle="modal" data-bs-target="#imgModal{{$medicamento->id}}"></button>
                               @include('admin.medicamentos.imgmodal')
                            </td>
                            <td>
                              <button type="button" data-id="priceModal{{$medicamento->id}}" class="btn btn-xs btn-success btn-modal-access" data-bs-toggle="modal" data-bs-target="#priceModal{{$medicamento->id}}"><i data-id="priceModal{{$medicamento->id}}" class="fas fa-dollar-sign"></i></button>
                              @include('admin.medicamentos.pricemodal')
                              <button type="button"  class="btn btn-xs btn-info" data-bs-toggle="modal" data-bs-target="#editMedicineModal{{$medicamento->id}}"><i class="fas fa-edit"></i></button>
                              @include('admin.medicamentos.medicinemodaledit')
                              {{-- <button type="button"  class="btn btn-xs btn-danger" data-bs-toggle="modal" data-bs-target="#priceModal{{$medicamento->id}}"><i class="fas fa-trash-alt"></i></button> --}}
                            </td>
                        </tr>
                        @endforeach
                      </tbody>
                  </table>
              </div>

          </div>

      </div>
  </div>
</div>

@endsection

@section('javascript')
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable({
                language: {
                searchPlaceholder: "Buscar medicamento",
                search: ""
                },
                "dom":"<'row'<''<'pull-left'f>><'col-sm-4'>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-5'><'col-sm-7'p>>",
            });
        } );
    </script>
    <script src="{{ asset('js/medicamentos/medicamentos_price.js') }}"></script>
    {{-- <script src="{{ asset('js/medicamentos/medicamentos_update.js') }}"></script> --}}
    <script src="{{ asset('js/medicamentos/medicamentos_search.js') }}"></script>
    <script src="{{ asset('js/medicamentos/medicamentos_delete.js') }}"></script>
    <script>
        $(document).ready(function(){
            $("a[href='#finish']").on('click',function(){
                $('#wizard').submit();
            });

            // const $template = document.getElementById("template-input").content;
            // const $fragment = document.createDocumentFragment();
            // $('#inputDynamic').on('change', function (e) {
            //     d.getElementById("boxDynamic").textContent = "";
            //     for (let i = 0; i < $(this).val(); i++) {
            //         $template.querySelector(".code").name = `batch[${i}][code]`;
            //         $template.querySelector(".quantity_unit").name = `batch[${i}][quantity_unit]`;
            //         $template.querySelector(".entry_date").name = `batch[${i}][entry_date]`;
            //         $template.querySelector(".expiry_date").name = `batch[${i}][expiry_date]`;

            //         let $clone = d.importNode($template, true);
            //         $fragment.appendChild($clone);
            //     }
            //     $('#boxDynamic').append($fragment)
            // })
        });

        document.addEventListener("click", e => {
            if (e.target.matches(".btn-modal-access, .btn-modal-access *")) {
                let $boxModal = document.getElementById(`${e.target.dataset.id}`);
                let $cost_box = $boxModal.querySelector("#cost_box");
                let $utility_box = $boxModal.querySelector("#utility_box");

                document.addEventListener("keyup", e => {
                    if (e.target === $cost_box || e.target === $utility_box) {
                        let number_blister = $boxModal.querySelector('#number_blister');
                        let number_box = $boxModal.querySelector('#number_box');
                        
                        let cost_box = $cost_box.value;
                        let utility_box = $utility_box.value;
                        let sale_price_box = $boxModal.querySelector("#sale_price_box");

                        let cost_price_blister = $boxModal.querySelector("#cost_price_blister");
                        let utility_blister = $boxModal.querySelector("#utility_blister");
                        let sale_price_blister = $boxModal.querySelector("#sale_price_blister");
                        
                        let cost_price_unit = $boxModal.querySelector("#cost_price_unit");
                        let utility_unit = $boxModal.querySelector("#utility_unit");
                        let sale_price_unit = $boxModal.querySelector("#sale_price_unit");

                        price();

                        function price () {
                            cost_box = parseFlotante(cost_box);
                            let total = parseFlotante(parseFlotante(cost_box) + parseFlotante(cost_box*utility_box/100));
                            
                            sale_price_box.value = parseFlotante(total);
                            console.log(cost_price_unit.value * number_blister.value)
                            cost_price_blister.value = parseFlotante(cost_box / (number_box.value / number_blister.value),2);

                            utility_blister.value = utility_box;
                            sale_price_blister.value = parseFlotante(parseFlotante(cost_price_blister.value) + parseFlotante(cost_price_blister.value * utility_blister.value / 100))

                            cost_price_unit.value = parseFlotante(cost_box / number_box.value, 2);
                            utility_unit.value = utility_box;
                            sale_price_unit.value = parseFlotante(parseFlotante(cost_price_unit.value) + parseFlotante(cost_price_unit.value * utility_unit.value / 100))
                        }

                        function parseFlotante (number, cant = 1) {
                            number = parseFloat(number).toFixed(cant) == "NaN" ? "0" : parseFloat(number).toFixed(cant)
                            return parseFloat(number);
                        }
                    }
                })



               

                $('#foto').on('change', function(e){
                    var file = e.target.files[0];
                    var reader = new FileReader();
                    reader.onload = (e) => {
                        $("#picture").attr('src', e.target.result);
                    };
                    reader.readAsDataURL(file);
                });
            }
        })
    </script>
@endsection
