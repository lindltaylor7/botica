$(document).ready(function () {
    document.getElementById("search_stock").addEventListener("keyup", () => {
        if ((document.getElementById("search_stock").value.length) >= 1)
            fetch('../admin/stock/buscar?search_stock=${document.getElementById("search_stock").value}', { method: 'get' })
            .then(response => response.text() )
            .then(html => { document.getElementById("card").innerHTML = html })
        else
            document.getElementById("card").innerHTML = ""
    })
});