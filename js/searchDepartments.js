function searchDepartments() {
    var cursoGrado = $('select[name=cursoGradoDepartamentos] option').filter(':selected').val()

	$.ajax({          
        	type: "POST",
        	url: "../proc/searchDepartments.php",
        	data:'cursoGrado='+cursoGrado,
        	success: async function(data){
           
                $("#departments").html(data);
           
          },
          error: function(err){
              console.log('error:'+err);
          }
	});


}