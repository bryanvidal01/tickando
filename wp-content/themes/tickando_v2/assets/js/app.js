$(document).ready(function(){


    /*function parallax() {
        var $slider = document.getElementById("slider");

        var yPos = window.pageYOffset / $slider.dataset.speed;
        yPos = -yPos;

        var coords = '0% '+ yPos + 'px';

        $slider.style.backgroundPosition = coords;
    }

    window.addEventListener("scroll", function(){
        parallax();
    });*/

    $("a[href*='#']:not([href='#'])").click(function() {
        if (
            location.hostname == this.hostname
            && this.pathname.replace(/^\//,"") == location.pathname.replace(/^\//,"")
        ) {
            var anchor = $(this.hash);
            anchor = anchor.length ? anchor : $("[name=" + this.hash.slice(1) +"]");
            if ( anchor.length ) {
                $("html, body").animate( { scrollTop: anchor.offset().top }, 600);
            }
        }
    });


    $('.navigation-toggle').click(function(event){
        $('body').toggleClass('nav-open');
    });

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
