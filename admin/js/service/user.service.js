function login(){
    var href        = 'api.user.php';
    var username    = $('#username').val();
    var password    = $('#password').val();

    if(password == ""){
        alert('กรุณากรอกรหัสผ่านด้วยค่ะ!');
        return false;
    }

    $('#loading-message').html('กำลังเข้าระบบ...');
    $('#loading-box').fadeIn(300);

    $.ajax({
        url         :href,
        cache       :false,
        dataType    :"json",
        type        :"POST",
        data:{
            calling             :'user',
            action              :'login',
            username:username,
            password: password,
        },
        error: function (request, status, error) {
            console.log("Request Error");
        }
    }).done(function(data){
        console.log('callback: '+data.return+','+data.message);

        if(data.return){
            window.location = 'index.php';
        }else{
            location.reload();
        }
    }).error();
}

function register(){
    var href        = 'api.user.php';

    var code        = $('#code').val();
    var fname       = $('#fname').val();
    var lname       = $('#lname').val();
    var username    = $('#username').val();
    var password    = $('#password').val();
    var line_default = $('#line_default').val();
    var section_id  = $('#section_id').val();

    $('#loading-message').html('กำลังเพิ่มพนักงานใหม่...');
    $('#loading-box').fadeIn(300);

    $.ajax({
        url         :href,
        cache       :false,
        dataType    :"json",
        type        :"POST",
        data:{
            calling             :'user',
            action              :'register',
            code:code,
            fname:fname,
            lname:lname,
            username:username,
            password:password,
            line_default:line_default,
            section_id:section_id,
        },
        error: function (request, status, error) {
            console.log("Request Error");
        }
    }).done(function(data){
        console.log('Return: '+data.message);

        if(data.return){
            window.location = 'user.php';
        }else{
            $('#loading-box').fadeOut(300);
            alert('เกิดปัญหา!');
        }
    }).error();
}

// Update user information
function edit(id){
    var href        = 'api.user.php';

    var code        = $('#code').val();
    var fname       = $('#fname').val();
    var lname       = $('#lname').val();
    var username    = $('#username').val();
    var password    = $('#password').val();
    var section_id  = $('#section_id').val();
    var line_default = $('#line_default').val();

    $('#loading-message').html('กำลังเข้าระบบ...');
    $('#loading-box').fadeIn(300);

    $.ajax({
        url         :href,
        cache       :false,
        dataType    :"json",
        type        :"POST",
        data:{
            calling             :'user',
            action              :'edit',
            id:id,
            code:code,
            fname:fname,
            lname:lname,
            username:username,
            password:password,
            line_default:line_default,
            section_id:section_id,
        },
        error: function (request, status, error) {
            console.log("Request Error");
        }
    }).done(function(data){
        console.log('Return: '+data.message);
        window.location = 'user.php';
    }).error();
}

function deactiveUser(user_id){
    var href        = 'api.user.php';

    $.ajax({
        url         :href,
        cache       :false,
        dataType    :"json",
        type        :"POST",
        data:{
            calling             :'user',
            action              :'deactive',
            user_id:user_id,
        },
        error: function (request, status, error) {
            console.log("Request Error");
        }
    }).done(function(data){
        console.log('Return: '+data.message);
        window.location = 'user.php?';
    }).error();
}

function addToAdmin(user_id){
    var href        = 'api.user.php';

    $.ajax({
        url         :href,
        cache       :false,
        dataType    :"json",
        type        :"POST",
        data:{
            calling             :'user',
            action              :'add_to_admin',
            user_id:user_id,
        },
        error: function (request, status, error) {
            console.log("Request Error");
        }
    }).done(function(data){
        console.log('Return: '+data.message);
        window.location = 'user_editor.php?user='+user_id;
    }).error();
}

function removeAdmin(user_id){
    var href        = 'api.user.php';

    $.ajax({
        url         :href,
        cache       :false,
        dataType    :"json",
        type        :"POST",
        data:{
            calling             :'user',
            action              :'remove_admin',
            user_id:user_id,
        },
        error: function (request, status, error) {
            console.log("Request Error");
        }
    }).done(function(data){
        console.log('Return: '+data.message);
        window.location = 'user_editor.php?user='+user_id;
    }).error();
}