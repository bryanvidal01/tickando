$(document).ready(function(){
    $("html").easeScroll({
        frameRate: 70,
        animationTime: 1000,
        stepSize: 40,
    });

    function parallax() {
        var $slider = document.getElementById("slider");

        var yPos = window.pageYOffset / $slider.dataset.speed;
        yPos = -yPos;

        var coords = '0% '+ yPos + 'px';

        $slider.style.backgroundPosition = coords;
    }

    window.addEventListener("scroll", function(){
        parallax();
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
