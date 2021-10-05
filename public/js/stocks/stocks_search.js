$(document).ready(function () {
    $("#search_stock").on("keyup", function () {
        var search = $("#search_stock").val();
        // console.log(search);
        var token = "{{csrf_token()}}";

        $.ajax({
            url: "../admin/stock",
            type: "POST",
            dataType: "json",
            data: {
                search: search,
            },
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (res) {
                var tableRow = "";

                $("#dynamic-row").html("");

                $.each(res, function (index, value) {
                    console.log(res);

                    function formatDate(fecha) {
                        var f_vencimiento = new Date(fecha);
                        var fv_day = f_vencimiento.getDate() + 1;
                        var fv_month = f_vencimiento.getMonth() + 1;
                        let fv_year = f_vencimiento.getFullYear();

                        if (fv_month < 10) {
                            var fv_month = "0" + fv_month;
                        }

                        if (fv_day < 10) {
                            var fv_day = "0" + fv_day;
                        }

                        let f_v = fv_day + "/" + fv_month + "/" + fv_year;

                        return f_v;
                    }

                    if(value.n_comercial == null){
                        value.n_comercial = '-'
                    }

                    tableRow =
                        "<tr id=row" +
                        value.id +
                        '><td class="d-none d-md-table-cell">' +
                        value.generic_name +
                        '</td><td class="d-none d-md-table-cell">' +
                        value.tradename +
                        '</td><td class="d-none d-md-table-cell">' +
                        value.quantity +
                        '</td><td class="d-none d-md-table-cell">' +
                        formatDate(value.entry_date) +
                        '</td><td class="d-none d-md-table-cell">' +
                        formatDate(value.expiry_date) +
                        '</td><td><a href="#" class="btn-editar" id=' +
                        value.id +
                        ' data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="align-middle" data-feather="edit-2"></i></a><a href="#" class="btn-eliminar" id=' +
                        value.id +
                        '><i class="align-middle" data-feather="trash"></i></a></td></tr>';
                    $("#dynamic-row").append(tableRow);
                    feather.replace();

                    $(".btn-editar").on("click", function () {
                        var id = $(this).attr("id");
                        console.log("enviando data search" + id);
                        $.ajax({
                            url: "../admin/stock/infoedit",
                            type: "POST",
                            dataType: "json",
                            data: {
                                id: id,
                            },
                            headers: {
                                "X-CSRF-TOKEN": $(
                                    'meta[name="csrf-token"]'
                                ).attr("content"),
                            },
                            success: function (res) {
                                $.each(res, function (key, value) {
                                    $("#id_stock").val(value.id);
                                    $("#cantidad").val(value.cantidad);
                                    $("#anaquel").val(value.anaquel);
                                    $("#f_ingreso").val(value.f_ingreso);
                                    $("#f_vencimiento").val(
                                        value.f_vencimiento
                                    );
                                });
                            },
                        });
                    });

                    $(".btn-eliminar").on("click", function () {
                        var id = $(this).attr("id");
                        if (confirm("Desea eliminar este stock?" + id)) {
                            $.ajax({
                                url: "../admin/stock/delstock",
                                type: "POST",
                                dataType: "json",
                                data: {
                                    id: id,
                                },
                                headers: {
                                    "X-CSRF-TOKEN": $(
                                        'meta[name="csrf-token"]'
                                    ).attr("content"),
                                },
                                success: function (res) {
                                    //alert("Eliminar row"+id)
                                    $("#row" + id).remove();
                                },
                            });
                        }
                    });
                });
            },
        });
    });
});
