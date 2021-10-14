document.addEventListener("click", e => {
  if (e.target.matches(".anular-venta")) {
    e.preventDefault()
    if (confirm("¿Estas seguro(a) de eliminar esta venta?")) {
      location.href = e.target.href;
    } 
  }
})