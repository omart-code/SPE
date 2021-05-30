$(function () {
 
  $("#editar").click(function () {
    console.log("clicas");
    $(".editor").toggle("slow", function () {});
  });

  $("#cancelar").click(function () {
    console.log("cancelas");
    $(".editor").toggle("slow", function () {});
  });
});
