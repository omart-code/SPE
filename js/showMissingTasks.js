$(function () {
    //Clicamos en el boton de mostrar detalles y muestra las tareas pendientes
  
    $(".buttonTasques").click(function () {
      console.log('llega');
        var parent = $(this).parent().parent().parent();
      
        parent.find(".tasques").toggle("fast");
    });
  
  });
  