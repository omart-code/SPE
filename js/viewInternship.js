$(document).ready(function() {

    //Por cada estancia

        $(".revisa").click(function(e) {
            e.preventDefault();
         
            //guardamos el id de la categoria en una variable
            var niu = $(this).attr('student-niu');
            
           $(".container").empty();
           $.ajax({
                type: "get",
                url: "../views/v_view-internship.php",
                data: { niu: niu},
                success:
                    function (respuesta) {
                       
                        $(".pagina").html(respuesta);
                       
                        
                    }


            })
 
        });
    });


