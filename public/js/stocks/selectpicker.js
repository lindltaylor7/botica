$(document).ready(function(){

    $('#medicamentos_select').hide()

    $('#search').on('click', function(){
        $('#medicamentos_select').show()
    })

 /*    $('#search').on('focusout', function(){

    }) */

    $('#search').on('keyup', function(){
       var search = $(this).val()
       $('#medicamentos_select').trigger("click")
        $.ajax({
            url:"../medicamentos/all",
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
                var list = '';

                $('#medicamentos_select').html('');

                $.each(res, function(index, value){
                    list = '<tr><td><a class="search-link" data-nbox="'+value.nro_caja+'" id="'+value.id+'">'+value.n_generico+' - '+value.n_comercial+' - '+value.lab+'-'+value.concent+'</a></td></tr>'
                    $('#medicamentos_select').append(list);
                });

                $('.search-link').on('click', function(){
                    $('#search').val($(this).text())
                    $('#medicamento_id').val($(this).attr('id'))
                    $('#cant_caja').val($(this).data('nbox'))
                    $('#medicamentos_select').hide()
                })
            }
        });
    });

    $('#cajas').on('keyup',function(){
        var cajas = $(this).val()
        var cant_caja = $('#cant_caja').val()

        $('#cantidad').val(cajas*cant_caja)
    })
});


