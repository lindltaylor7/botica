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
                     list ='<tr><td>'+value.generic_name+'</td><td>'+value.tradename+'</td><td>'+value.cantidad+'</td><td>S./ '+value.total+'</td></tr>'
                     $('#row-report').append(list)
                     sum = sum + parseFloat(value.total)
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
                    list ='<tr><td>'+value.generic_name+'</td><td>'+value.tradename+'</td><td>'+value.cantidad+'</td><td>S./ '+value.total+'</td></tr>'
                     $('#row-report').append(list)
                     sum = sum+parseFloat(value.total)
                });
               console.log(sum.toFixed(1))
               $('#suma').html('TOTAL: S./'+sum.toFixed(1)+'0')
            }
        });
    })
});
