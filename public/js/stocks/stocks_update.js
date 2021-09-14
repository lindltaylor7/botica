$(document).ready(function(){


    $('.btn-editar').on("click", function (){

        var id = $(this).attr('id')
            console.log('enviando data')
        $.ajax({
            url:"../admin/stock/infoedit",
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
                $('#id_stock').val(value.id);
                $('#cantidad').val(value.cantidad);
                $('#anaquel').val(value.anaquel);
                $('#f_ingreso').val(value.f_ingreso);
                $('#f_vencimiento').val(value.f_vencimiento);
               })
            }
        });


    })


    $('.btn-close').on('click', function(){
        $('#id_stock').val('');
        $('#cantidad').val('');
        $('#anquel').val('');
        $('#f_ingreso').val('');
        $('#f_vencimiento').val('');
        console.log('limpieza hecha')
    })


});
