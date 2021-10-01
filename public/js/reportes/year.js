$(document).ready(function (){

    $("#year").on("change", function (){
        var year = $(this).val();
        var mes = $("#mes").val();

        var fecha=year+"-"+mes;
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
                var sum = 0
                $.each(response, function (index, value) {
                    list ='<tr><td>'+value.generic_name+'</td><td>'+value.tradename+'</td><td>'+value.cantidad+'</td><td>S./ '+value.total+'</td></tr>'
                     $('#row-report').append(list)
                     sum = sum + parseFloat(value.total)
                });

               console.log(sum.toFixed(1))
               $('#suma').html('TOTAL: S./'+sum.toFixed(1)+'0')
            }
        });
    })
})