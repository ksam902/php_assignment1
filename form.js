$(function() {
    $('#btnPrint').click(function(){
    	window.print();
    });
    $('div.btnCourse input').click(function(){
        $("div.course-content").toggle(800);
    });
});