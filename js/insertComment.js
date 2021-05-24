function insertComment(internshipId, niuStudent){
  
    var tipoComentario = $('select[name=tipoComentario] option').filter(':selected').val();
    var categoriaComentario = $('select[name=categoriaComentario] option').filter(':selected').val();
    var comentario = $('textarea[name=textoComentario]').val();
    console.log(niuStudent)
  
  
   
  
       
$.ajax({          
        	type: "POST",
        	url: "../ajax/insertComment.php",
        	data:'tipoComentario='+tipoComentario+'&categoriaComentario='+categoriaComentario+'&comentario='+comentario+
            '&internshipId='+internshipId+ '&niuStudent='+niuStudent,
        	success: async function(data){
                console.log(data)
                
                await window.location.replace("http://localhost/spe/views/v_view-internship.php?niu="+niuStudent);
          },
          error: function(err){
              console.log('error:'+err);
          }
	});
}