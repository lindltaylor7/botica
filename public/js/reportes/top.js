$(document).ready(function () {
      $('#fecha_calendar').on('change', function (){
        var fecha = $(this).val();
        $.ajax({
            type: "POST",
            url: "../reportes/top/sellday",
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
                     subt=(value.p_unitario*value.total).toFixed(1)
                     list ='<tr><td>'+value.n_generico+'</td><td>'+value.n_comercial+'</td><td>'+value.total+'</td><td>S./ '+value.p_unitario+'</td><td>S./ '+subt+'</td></tr>'
                     $('#row-report').append(list)
                     sum = sum+parseFloat(subt)
                });

               console.log(sum.toFixed(1))
               $('#suma').html('TOTAL: S./'+sum.toFixed(1)+'0')
            }
        });
    });
    $('#time').on('change', function(){

        var id = $(this).val()

        $.ajax({
            type: "POST",
            url: "../reportes/top/day",
            data: {
                id:id
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
                     subt=(value.p_unitario*value.total).toFixed(1)
                     list ='<tr><td>'+value.n_generico+'</td><td>'+value.n_comercial+'</td><td>'+value.total+'</td><td>S./ '+value.p_unitario+'</td><td>S./ '+subt+'</td></tr>'
                     $('#row-report').append(list)
                     
                     sum = sum+parseFloat(subt)
                });
                
               console.log(sum.toFixed(1))
               $('#suma').append('TOTAL: S./'+sum.toFixed(1)+'0')
            }
        });


    })
});
