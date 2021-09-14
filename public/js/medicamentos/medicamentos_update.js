$(document).ready(function(){


    $('.btn-editar').on("click", function (){

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
                $('#anaquel').val(value.anaquel);
                $('#nro_caja').val(value.nro_caja);
               })
            }
        });


    })


    $('.btn-close').on('click', function(){
        $('#id_med').val('');
        $('#n_generico').val('');
        $('#n_comercial').val('');
        $('#concent').val('');
        $('#present').val('');
        $('#lab').val('');
        $('#anaquel').val('');
        $('#nro_caja').val('');
        console.log('limpieza hecha')
    })


});
