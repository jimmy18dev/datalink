$(document).ready(function(){

    $('#btn-new-message').click(function(){
        $('#filter').fadeIn(100);
        $('#message-dialog').fadeIn(300);
    });

    $('#filter , #close-message-dialog').click(function(){
        $('#filter').fadeOut(300);
        $('#message-dialog').fadeOut(100);
    });
});