$(document).ready(function(){

});

window.onload = function() {
    setTimeout(function(){
        $('.logo-container').slideUp(300);
        setTimeout(function(){
            jQuery('.header-home .wording').removeClass('fadeIn');
        }, 300);

        setTimeout(function(){
            jQuery('.info-eligibility').removeClass('fadeIn');
        }, 600);
    }, 600);

};
