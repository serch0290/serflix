$(function() {
    scrollTop();
});

function scrollTop(){
    console.log('Entra a scrolltop');
    let data = window.location.hash;
    if(!data){
        $("html, body").animate({
            scrollTop: 0
        }, 100);
    }
}