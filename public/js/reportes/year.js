$(document).ready(function (){

    $("#year").on("change", function (){
        var year = $(this).val();
        var mes = $("#mes").val();

        var fecha=year+"-"+mes;
        console.log(fecha);
        $.ajax({
            type: "POST",
            url: "../reportes/top/fecha",
            data: {
                fecha:fecha
            },
            dataType: "json",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {

                $('#row-report').html('')
                var list = ''

                $.each(response, function (index, value) {
                     list ='<tr><td>'+value.n_generico+'</td><td>'+value.n_comercial+'</td><td>'+value.total+'</td></tr>'
                     $('#row-report').append(list)
                });

               console.log(response)
            }
        });
    })



})
/*
$(document).ready(function (){
    $("#mes").on("change", function (){
        var mes = $(this).val();
        alert(mes, year);
    })
})
*/
