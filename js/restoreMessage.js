
$(function () {
$('.restablecer').click(function () {
    console.log('restablecer')
  $.confirm({
    title: "Atenció!",
    content: "Es restablirà la plantilla del missatge al missatge original, estàs segur?",
    buttons: {
      accepta: {
        btnClass: 'btn-success',
        action: function () {
            $.alert("Borrat!");
          },
        },
      cancela: {
        btnClass: 'btn-secondary',
        action: function () {
            $.alert("Cancel·lat!");
          },
      }, 
    },
  });
});
});
