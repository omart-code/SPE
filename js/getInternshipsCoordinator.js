function getInternshipsCoordinator() {
    var cursoGrado = $('select[name=cursogradoEstancias] option').filter(':selected').val()
    
  
   
       
	$.proc({          
        	type: "POST",
        	url: "../proc/getInternshipsCoordinator.php",
        	data:'cursoGrado='+cursoGrado,
        	success: async function(data){
           
                $("#estanciasCoordinador").html(data);
           // await window.location.replace("http://localhost/spe/views/v_view-internship.php?niu="+niu);
          },
          error: function(err){
              console.log('error:'+err);
          }
	});  
}