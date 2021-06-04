function restoreMessage(id_tarea, niu, cursoGrado, niuEstudiante){
 
  console.log("restablecer");
  $.confirm({
    title: "Atenció!",
    content:
      "Es restablirà la plantilla del missatge al missatge original, estàs segur?",
    buttons: {
      accepta: {
        btnClass: "btn-success",
        action: function () {
          $.ajax({          
          type: "POST",
          url: "../proc/restoreMessage.php",
          data:'id_tarea='+id_tarea+'&niu='+niu+'&cursoGrado='+cursoGrado+'&niuEstudiante='+niuEstudiante,
          success: async function(data){
             
              await window.location.replace("http://localhost/spe/views/v_view_task.php?task="+id_tarea+"&niu="+niuEstudiante);
          },
          error: function(err){
              console.log('error:'+err);
          }
              });
       
        },
      },
      cancela: {
        btnClass: "btn-secondary",
        action: function () {
          $.alert("Cancel·lat!");
        },
      },
    },
  });

};