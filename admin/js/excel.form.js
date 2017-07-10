$(document).ready(function(){
    
    $bar = $('#loading-bar');

    $('#weeklyeff_form').ajaxForm({
        beforeSubmit: function(){
            $bar.fadeIn(100);
            $bar.width('0%');
            // $('#btn-submit').addClass('-disable');
            // $('#btn-submit').html('กำลังบันทึก...');
        },
        uploadProgress: function(event,position,total,percentComplete) {
            var percent = percentComplete;
            $bar.animate({width:percent+'%'},300);
            
            // console.log('Upload: '+percentComplete+' %');
        },
        success: function() {
            $bar.animate({width:'100%'},300);
        },
        complete: function(xhr) {
            var sd = $('#sd').val();
            var sm = $('#sm').val();
            var sy = $('#sy').val();
            var ed = $('#ed').val();
            var em = $('#em').val();
            var ey = $('#ey').val();

            if(sd < 10) sd = '0'+sd;
            if(sm < 10) sm = '0'+sm;
            if(ed < 10) ed = '0'+ed;
            if(em < 10) em = '0'+em;

            // console.log(xhr.responseText);
            console.log('weekly_eff_report.php?s='+sd+'-'+sm+'-'+sy+'&e='+ed+'-'+em+'-'+ey);
            console.log(xhr.responseJSON);

            setTimeout(function(){
                window.location = 'weekly_eff_report.php?s='+sd+'-'+sm+'-'+sy+'&e='+ed+'-'+em+'-'+ey;
            },1000);
        }
    });
});