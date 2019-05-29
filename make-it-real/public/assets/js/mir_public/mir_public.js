$(document).ready(function(){
    //Start parallax
    $('.jumbotron').paroller()
    //Menu
    //Nav lg
    $(document).on("scroll", function() {
        if ($(window).width() > 960) {
            if($(document).scrollTop()>300) {
                $('#nav-lg').css('padding','0.7vw 0')
                } else {
                $('#nav-lg').css('padding','1.5vw 0')
            }
        }
    })
    //Nav sm
    let close = true
    $('#burger').on('click',function(){
        if(close) {
            $(this).css({
                'left':'100px',
                'background-color':'transparent',
                'box-shadow':'0 0 30px rgba(0,0,0,0)'
            })
            $(this).children().css({
                'background-color':'#F26D6D'
            })
            $('#nav-sm').css('left','0px')
            close = false
        } else {
            $('#nav-sm').css('left','-300px')
            $(this).css({
                'left':'190px',
                'background-color':'#F26D6D',
                'box-shadow':'0 0 30px rgba(0,0,0,.4)'
            })
            $(this).children().css({
                'background-color':'#fefefe'
            })
            close = true
        }
    })
})