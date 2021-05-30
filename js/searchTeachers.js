function searchTeachers() {
    var cursoGrado = $('select[name=cursoGradoProfesores] option').filter(':selected').val()

	$.ajax({          
        	type: "POST",
        	url: "../proc/searchTeachers.php",
        	data:'cursoGrado='+cursoGrado,
        	success: async function(data){
           
                $("#teachers").html(data);
           
          },
          error: function(err){
              console.log('error:'+err);
          }
	});


}