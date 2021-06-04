function removeInternship(id_estancia) {

    $.ajax({          
        type: "POST",
        url: "../proc/removeInternship.php",
        data:'id_estancia='+id_estancia,
        success: async function(data){
            console.log(id_estancia)
            //$("#departments").html(data);
       
      },
      error: function(err){
          console.log('error:'+err);
      }
});
};