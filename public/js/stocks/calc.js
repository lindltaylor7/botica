$(document).ready(() => {
  $(".val").on("keyup click",function () {
    const value1 = $("#value1").val()
    const value2 = $("#value2").val()
    const valueFinal = $("#valueFinal");
    valueFinal.val((value1 / value2).toFixed(2));
  })
});

