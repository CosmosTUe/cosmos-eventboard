

// Timer function updates the progress bar every 10ms.
var percentage = 0.0;
function timer() {
    var widthString = percentage + '%';
    $('.progress').css('width', percentage+'%');
    percentage+=0.05;
    if(percentage >= 100){
        $('.slider').slider('next');
        percentage = 0;
    }
}

$( document ).ready(function() {
    // Initialize slider
    $('.carousel.carousel-slider').carousel({fullWidth: true});
    $('.carousel').carousel();
    $('.slider').slider();

    // Stop autoplaying
    $('.slider').slider('pause');

    // switch event every 20 seconds.
    var id = setInterval(timer, 10);
});
