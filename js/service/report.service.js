function createHeaderReport(){
    var href        = 'api.report.php';

    var line_no     = $('#line_no').val();
    var line_type     = $('#line_type').val();
    var shift     = $('#shift').val();
    var no_monthly_emplys     = $('#no_monthly_emplys').val();
    var no_daily_emplys     = $('#no_daily_emplys').val();
    var ttl_monthly_hrs     = $('#ttl_monthly_hrs').val();
    var ttl_daily_hrs     = $('#ttl_daily_hrs').val();
    var ot_10     = $('#ot_10').val();
    var ot_15     = $('#ot_15').val();
    var ot_20     = $('#ot_20').val();
    var ot_30     = $('#ot_30').val();
    var losttime_vac     = $('#losttime_vac').val();
    var losttime_sick     = $('#losttime_sick').val();
    var losttime_abs     = $('#losttime_abs').val();
    var losttime_mat     = $('#losttime_mat').val();
    var losttime_other     = $('#losttime_other').val();
    var downtime_mc     = $('#downtime_mc').val();
    var downtime_mat     = $('#downtime_mat').val();
    var downtime_fac     = $('#downtime_fac').val();
    var sort_local     = $('#sort_local').val();
    var sort_oversea     = $('#sort_oversea').val();
    var rework_local     = $('#rework_local').val();
    var rework_oversea     = $('#rework_oversea').val();

    // $('#loading-message').html('กำลังเข้าระบบ...');
    // $('#loading-box').fadeIn(300);

    $.ajax({
        url         :href,
        cache       :false,
        dataType    :"json",
        type        :"POST",
        data:{
            calling             :'report',
            action              :'create_header',
            line_no:line_no,
            line_type:line_type,
            shift:shift,
            report_date:'23 DEC 2016',
            no_monthly_emplys:no_monthly_emplys,
            no_daily_emplys:no_daily_emplys,
            ttl_monthly_hrs:ttl_monthly_hrs,
            ttl_daily_hrs:ttl_daily_hrs,
            ot_10:ot_10,
            ot_15:ot_15,
            ot_20:ot_20,
            ot_30:ot_30,
            losttime_vac:losttime_vac,
            losttime_sick:losttime_sick,
            losttime_abs:losttime_abs,
            losttime_mat:losttime_mat,
            losttime_other:losttime_other,
            downtime_mc:downtime_mc,
            downtime_mat:downtime_mat,
            downtime_fac:downtime_fac,
            sort_local:sort_local,
            sort_oversea:sort_oversea,
            rework_local:rework_local,
            rework_oversea:rework_oversea,
        },
        error: function (request, status, error) {
            console.log("Request Error");
        }
    }).done(function(data){
        console.log('Return: '+data.message);

        if(data.return){
            window.location = 'report_header.php';
        }
        else{
            $('#loading-box').fadeOut(300);
            alert('แก้ข้อผิดพลาด!');
        }
    }).error();
}

// Update user information
function edit(id){
    var href        = 'api.remark.php';

    var description        = $('#description').val();
    var category_id       = $('#category_id').val();

    // if(email == ""){
    //     showAlert('กรุณากรอกอีเมลของคุณด้วยค่ะ');
    //     return false;
    // }
    // else if(name == ""){
    //     showAlert('กรุณากรอกชื่อและนามสุกลของคุณด้วยค่ะ');
    //     return false;
    // }
    // else if(password == ""){
    //     showAlert('กรุณากรอกรหัสผ่านด้วยค่ะ');
    //     return false;
    // }

    $('#loading-message').html('กำลังเข้าระบบ...');
    $('#loading-box').fadeIn(300);

    $.ajax({
        url         :href,
        cache       :false,
        dataType    :"json",
        type        :"POST",
        data:{
            calling             :'remark',
            action              :'edit',
            id:id,
            category_id:category_id,
            description:description,
        },
        error: function (request, status, error) {
            console.log("Request Error");
        }
    }).done(function(data){
        console.log('Return: '+data.message);

        // if(data.return){
        //     $('#dialog-message').html('กำลังสมัครสมาชิกใหม่...');
        //     $('#dialog-box').fadeIn(300);

        //     if(redirect == 'editor'){
        //         window.location = 'editor.php?';
        //     }else if(redirect){
        //         window.location = 'case-'+redirect+'.html';
        //     }else{
        //         window.location = 'profile.php';
        //     }
        // }
        // else{
        //     $('#status-message').html('อีเมลนี้ถูกใช้แล้ว!').slideDown(500).delay(3000).slideUp(300);
        //     $('#login-status').html('สมัครสมาชิก');
        // }
    }).error();
}