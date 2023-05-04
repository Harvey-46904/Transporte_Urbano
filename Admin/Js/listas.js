jQuery(document).ready(function($){

    console.log("estoy aqui");

    function modal(){
        alert("hola");
    }


    $("#modal_new").click( function(){
        $("#modalnuevo").modal("show")
    })
})