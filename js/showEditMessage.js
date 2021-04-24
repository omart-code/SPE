(document).ready(function() {

    //Clicamos en el boton de consultar, que tiene id fase.. y muestra el div con clase fase..
   
    $('#editar').click(function() {
        console.log('clicas');
        $('.editor').toggle('slow', function() {
        
         });
    });

    $('#cancelar').click(function() {
        console.log('cancelas');
        $('.editor').toggle('slow', function() {
        
         });
    });
   
});
