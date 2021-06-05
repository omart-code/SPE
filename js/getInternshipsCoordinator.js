function getInternshipsCoordinator() {
    var cursoGrado = $('select[name=cursogradoEstancias] option').filter(':selected').val()
   
  
   
       
	$.ajax({          
        	type: "POST",
        	url: "../proc/getInternshipsCoordinator.php",
        	data:'cursoGrado='+cursoGrado,
        	success: async function(data){
           
                $("#estanciasCoordinador").html(data);
          
          },
          error: function(err){
              console.log('error:'+err);
          }
	});  


}
