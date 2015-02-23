$(function() {
    $('#btnPrint').click(function(){
    	window.print();
    });
    $('div.btnCourse').click(function(){
        $('html, body').animate({
            scrollTop: $(this).offset().top
        }, 750);
        $(this).next('div').toggle(800);
    });
});