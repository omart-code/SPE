$(function () {
  //Clicamos en el boton de consultar, que tiene id fase.. y muestra el div con clase fase..

  $("#faseInicial").click(function () {
    $(".faseInicial").toggle("fast", function () {});
  });

  $("#faseSeguiment").click(function () {
    $(".faseSeguiment").toggle("fast", function () {});
  });

  $("#faseFinal").click(function () {
    $(".faseFinal").toggle("fast", function () {});
  });
});
