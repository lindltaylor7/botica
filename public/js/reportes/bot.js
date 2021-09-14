$(document).ready(function () {
    $('#time').on('change', function(){

        var id = $(this).val()

        $.ajax({
            type: "POST",
            url: "../reportes/bot/day",
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

                $.each(response, function (index, value) {
                     list ='<tr><td>'+value.n_generico+'</td><td>'+value.total+'</td></tr>'
                     $('#row-report').append(list)
                });
               console.log(response)
            }
        });


    })
});
