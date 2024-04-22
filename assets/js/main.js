$(function() {
    scrollTop();
});

function scrollTop(){
    let data = window.location.hash;
    if(!data){
        $("html, body").animate({
            scrollTop: 0
        }, 1000);
    }
}

/**
 * Se muestra el icono para regresar al inicio del menú
 */
function showIconTop(){

}

/**
 * Se va al inicio de la página
 */
function irInicio(){
    $("html, body").animate({
        scrollTop: 0
    }, 1000);
}


function showModal(mensaje){
  $("#myModal").css('display', 'block');
  $(".modal-content").html(`<span class=\"close\" onclick=\"closeModal();\">&times;</span>
     <p>${mensaje}</p>
  `);
}//Fin del metodo

function closeModal(){
    $("#myModal").css('display', 'none');
    $("#myModal").html('');
}