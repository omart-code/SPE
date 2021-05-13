$( document ).ready(function() {
  $(".taskDone").click(function () {
  
    
    
     var id = this.getAttribute('id');
     var estancia = this.getAttribute('estancia');
     var niu = this.getAttribute('niu');
   
     var task = id.split('-')
   
     var tasca = task[0];
     var fecha = task[1];

     //Genera el dia de hoy en javascript y lo muestra en la celda seleccionada
      var today = new Date();
      var dd = today.getDate();

      
      var mm = today.getMonth()+1; 
      var yyyy = today.getFullYear();
      if(dd<10) 
      {
          dd='0'+dd;
      } 

      if(mm<10) 
      {
          mm='0'+mm;
      } 
      today = dd+'-'+mm+'-'+yyyy;
      console.log(today);
      this.innerHTML= today;

     if(today > fecha){ 
        $(this).css('background-color', '#f2c4c9');
      }else{
        $(this).css('background-color', '#c2e5ca');

      }
      
    $.ajax({
          type: "POST",
          url: "../ajax/updateActionDate.php",
          data: "niu="+niu+"& estancia="+estancia+"& tarea="+tasca+"& actionDate="+fecha,
         
          success: async function(data){
            console.log(data);
           // await window.location.replace("http://localhost/spe/views/v_view-internship.php?niu="+niu);
          },
          error: function(err){
              console.log('error:'+err);
          }
      }); 
     
   });
});