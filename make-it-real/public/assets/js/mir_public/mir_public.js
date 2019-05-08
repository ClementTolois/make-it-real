$(document).ready(function(){
    //Start parallax
    $('.jumbotron').paroller()
    //Menu
    $(document).on("scroll", function() {
        if ($(window).width() > 1140) {
            if($(document).scrollTop()>300) {
                $('#nav-lg').css('padding','0.7vw 0')
                } else {
                $('#nav-lg').css('padding','1.5vw 0')
            }
            //$(".navRowSticky").css('display','flex');
        } else {
            //$(".navRowSticky").css('display','none');
        }
    })
})