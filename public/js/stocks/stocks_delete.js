$(document).ready(function(){
    $('.btn-eliminar').on("click", function(){
        var id = $(this).attr("id")
       if(confirm("Desea eliminar este medicamento?")){
            $.ajax({
                url:"../admin/stock/delstock",
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
});
