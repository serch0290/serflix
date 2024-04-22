$(function() {
    scrollTop();
    $(window).on('scroll', function(e) {
        if($(window).scrollTop() >= 200){
            $('.icon-top').addClass('icon-top-visible');
        }else{
            $('.icon-top').removeClass('icon-top-visible');
        }
    });

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