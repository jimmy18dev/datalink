function create(){
    var href        = 'api.remark.php';
    var description        = $('#description').val();
    var category_id       = $('#category_id').val();

    $('#loading-message').html('กำลังเข้าระบบ...');
    $('#loading-box').fadeIn(300);

    $.ajax({
        url         :href,
        cache       :false,
        dataType    :"json",
        type        :"POST",
        data:{
            calling             :'remark',
            action              :'create',
            category_id:category_id,
            description:description,
        },
        error: function (request, status, error) {
            console.log("Request Error");
        }
    }).done(function(data){
        console.log('Return: '+data.message);

        if(data.return){
            window.location = 'remark.php';
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