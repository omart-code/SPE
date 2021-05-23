function insertInternship(){
    
    var cursoGrado = $('select[name=grauCursSelec] option').filter(':selected').val();
    var niuEstudiant = $('input[name=niuEstudiant]').val();
    var nomEstudiant = $('input[name=nomEstudiant]').val();
    var cognomEstudiant =  $('input[name=cognomEstudiant]').val();
    var profesorSelec = $('select[name=profesorSelec] option').filter(':selected').val();
    var fechaInicio = $('input[name=fechaInicio]').val();
    var fechaFinal = $('input[name=fechaFinal]').val();
  
   
  
       
$.ajax({          
        	type: "POST",
        	url: "../ajax/insertInternship.php",
        	data:'cursoGrado='+cursoGrado+'&niuEstudiant='+niuEstudiant+'&nomEstudiant='+nomEstudiant+'&cognomEstudiant='+cognomEstudiant+'&profesorSelec='+profesorSelec
            +'&fechaInicio='+fechaInicio+'&fechaFinal='+fechaFinal,
        	success: async function(data){
                console.log(data)
                window.location.replace("http://localhost/spe/views/v_coordinator.php")
                //$("#estanciasCoordinador").html(data);
           // await window.location.replace("http://localhost/spe/views/v_view-internship.php?niu="+niu);
          },
          error: function(err){
              console.log('error:'+err);
          }
	});  
}