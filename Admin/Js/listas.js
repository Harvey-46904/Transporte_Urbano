jQuery(document).ready(function($){
    let id_guardado=4;
    console.log("estoy aqui");

    function modal(){
        alert("hola");
    }


    $("#modal_new").click( function(){
        $("#modalnuevo").modal("show")
    })


    $(".eliminar").click( function(){
        var id = this.id;
       
        $.ajax({
            url: "../wp-content/plugins/Transporte_Urbano/guardar.php",
            type: "POST",
            data: { variable_js: id },
            success: function(response) {
              console.log(response);
              document.location.reload();
            },
            error: function() {
              console.log("Error al enviar la variable");
            }
          });
    })

})