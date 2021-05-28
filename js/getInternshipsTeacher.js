function getInternshipsTeacher() {
   var cursoGrado = $('select[name=cursogradoEstancias] option').filter(':selected').val()
    var element = document.getElementById("cercaEstades");
    var niuProfesor = element.getAttribute("niu");
   
  
  
        
	 $.ajax({          
        	type: "POST",
        	url: "../proc/getInternshipsTeacher.php",
        	data:'cursoGrado='+cursoGrado+'&niuProfesor='+niuProfesor,
        	success: async function(data){
             
                $("#internships").html(data);
           // await window.location.replace("http://localhost/spe/views/v_view-internship.php?niu="+niu);
          },
          error: function(err){
              console.log('error:'+err);
          }
	}); 

}