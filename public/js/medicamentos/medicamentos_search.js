$(document).ready(function(){


    $('#search_med').on('keyup',function(){
        var search = $('#search_med').val()
        console.log(search)
        var token = '{{csrf_token()}}';


        $.ajax({
            url:"../admin/medicamentos/all",
            type: "POST",
            dataType: 'json',
            data:{
                search: search
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success:function(res){
                console.log(res);
                var tableRow = '';

                $('#dynamic-row').html('');

                $.each(res, function(index, value){
                    tableRow = '<tr id=row'+value.id+'><td class="d-none d-md-table-cell">'+value.n_generico+'</td><td class="d-none d-md-table-cell">'+value.n_comercial+'</td><td class="d-none d-md-table-cell">'+value.concent+'</td><td class="d-none d-md-table-cell">'+value.present+'</td><td class="d-none d-md-table-cell">'+value.lab+'</td><td class="d-none d-md-table-cell">'+value.nro_caja+'</td><td class="d-none d-md-table-cell"><span class="badge bg-primary">'+value.anaquel+'</span></td><td><a href="#" class="btn-price" id="'+value.id+'" data-bs-toggle="modal" data-bs-target="#priceModal"><i class="align-middle" data-feather="dollar-sign"></i></a><a href="#" class="btn-editar" id='+value.id+' data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="align-middle" data-feather="edit-2"></i></a><a href="#" class="btn-eliminar" id='+value.id+'><i class="align-middle" data-feather="trash"></i></a></td></tr>';
                    $('#dynamic-row').append(tableRow);
                    feather.replace();

                    $('.btn-editar').on("click", function formEdit(){

                        var id = $(this).attr('id')


                        $.ajax({
                            url:"../admin/medicamentos/infoedit",
                            type: "POST",
                            dataType: 'json',
                            data:{
                                id: id
                            },
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success:function(res){


                               $.each(res, function(key, value){
                                $('#id_med').val(value.id);
                                $('#n_generico').val(value.n_generico);
                                $('#n_comercial').val(value.n_comercial);
                                $('#concent').val(value.concent);
                                $('#present').val(value.present);
                                $('#lab').val(value.lab);
                                $('#nro_caja').val(value.nro_caja);
                                $('#anaquel').val(value.anaquel);
                               })
                            }
                        });


                    })

                    $('.btn-eliminar').on("click", function(){
                        var id = $(this).attr("id")
                       if(confirm("Desea eliminar este medicamento?")){
                            $.ajax({
                                url:"../admin/medicamentos/delmedic",
                                type: "POST",
                                dataType: 'json',
                                data:{
                                    id: id
                                },
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                success:function(res){
                                    //alert("Eliminar row"+id)
                                    $('#row'+id).remove()
                                }
                            });
                       }
                    });

                    $('.btn-price').on("click", function (){

                        var id = $(this).attr('id')

                        $.ajax({
                            url:"../admin/medicamentos/precios",
                            type: "POST",
                            dataType: 'json',
                            data:{
                                id: id
                            },
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success:function(res){

                                console.log(res)
                                $('#id_precio').val(res.id);
                                $('#p_costo').val(res.p_costo);
                                $('#p_unitario').val(res.p_unitario);
                                $('#p_caja').val(res.p_caja);
                                $('#utilidad_caja').val(res.utilidad_caja);
                                $('#p_venta_caja').val(res.p_venta_caja);

                                $('#utilidad').on('keyup', function(){
                                    var p_costo= $('#p_costo').val()
                                    var utilidad = $('#utilidad').val()

                                    var p_venta = parseFloat(p_costo) + parseFloat(utilidad*p_costo/100)

                                    $('#p_unitario').val(p_venta.toFixed(2));
                                    console.log(p_venta)
                                });

                                $('#utilidad_caja').on('keyup', function(){
                                    var p_caja= $('#p_caja').val();
                                    var utilidad_caja = $('#utilidad_caja').val()

                                    var p_venta_caja = parseFloat(p_caja) + parseFloat(utilidad_caja*p_caja/100)

                                    $('#p_venta_caja').val(p_venta_caja.toFixed(2));
                                    console.log(p_venta_caja)
                                });
                            }
                        });


                    })
                });


            }

            });

    });

});
