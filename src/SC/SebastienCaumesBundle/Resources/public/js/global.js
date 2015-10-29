
$( function () {

   // $( "#draggable" ).draggable({ cancel : false });
    $('[data-toggle="popover"]').popover({html:true, animation:false, container:'container-fluid', placement:'bottom'});


    //bar charts
    $('.graph-bar').each(function() {
        var dataWidth = $(this).data('value');
        $(this).css("width", dataWidth + "%");
    });

    if ($(document).width() > 968){
        $('#social-haut').attr({style:'visibility:visible'});
    }







})