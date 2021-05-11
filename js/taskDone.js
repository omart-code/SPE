$( document ).ready(function() {
  $(".taskDone").click(function () {
  
     $(this).css('background-color', '#D4EDDA');
    
     var id = this.getAttribute('id');
     var estancia = this.getAttribute('estancia');
     var niu = this.getAttribute('niu');
   
     var task = id.split('-')
   
     var tasca = task[0];
     var fecha = task[1];
   
      
      $.ajax({
          type: "POST",
          url: "../ajax/updateActionDate.php",
          data: "niu="+niu+"& estancia="+estancia+"& tarea="+tasca+"& actionDate="+fecha,
         
          success: async function(data){
            console.log(data);
           // await window.location.replace("http://localhost/spe/views/v_view-internship.php?niu="+niu);
          },
          error: function(err){
              console.log('error');
          }
      });
     
   });
});