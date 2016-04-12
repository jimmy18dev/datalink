function login(){
    var href        = 'api.people.php';
    var email       = $('#email').val();
    var password    = $('#password').val();
    var signature   = $('#signature').val();
    var redirect    = $('#redirect').val();

    if(email == ""){
        showAlert('คุณยังไม่ได้กรอกอีเมล');
        return false;
    }
    else if(password == ""){
        showAlert('กรุณากรอกรหัสผ่านให้ถูกต้อง');
        return false;
    }

    $('#login-status').html('<i class="fa fa-circle-o-notch fa-spin"></i>กำลังเข้าสู่ระบบ...');

    $.ajax({
        url         :href,
        cache       :false,
        dataType    :"json",
        type        :"POST",
        data:{
            calling             :'people',
            action              :'login',
            email: email,
            password: password,
            signature: signature,
        },
        error: function (request, status, error) {
            console.log("Request Error");
        }
    }).done(function(data){
        console.log('callback: '+data.return+','+data.message);

        if(data.return){
            $('#dialog-message').html('กำลังเข้าสู่ระบบ...');
            $('#dialog-box').fadeIn(300);

            if(redirect == 'editor'){
                window.location = 'editor.php?';
            }else if(redirect){
                window.location = 'case-'+redirect+'.html';
            }else{
                window.location = 'index.php';
            }
        }
        else{
            showAlert('อีเมลหรือรหัสผ่านของคุณไม่ถูกต้อง!');
            $('#login-status').html('เข้าสู่ระบบ');
            return false;
        }
    }).error();
}

function register(){
    var href        = 'api.people.php';

    var email       = $('#email').val();
    var name        = $('#name').val();
    var password    = $('#password').val();
    var signature   = $('#signature').val();
    var redirect    = $('#redirect').val();

    if(email == ""){
        showAlert('กรุณากรอกอีเมลของคุณด้วยค่ะ');
        return false;
    }
    else if(name == ""){
        showAlert('กรุณากรอกชื่อและนามสุกลของคุณด้วยค่ะ');
        return false;
    }
    else if(password == ""){
        showAlert('กรุณากรอกรหัสผ่านด้วยค่ะ');
        return false;
    }

    $('#login-status').html('<i class="fa fa-circle-o-notch fa-spin"></i>กำลังสมัครสมาชิก...');

    $.ajax({
        url         :href,
        cache       :false,
        dataType    :"json",
        type        :"POST",
        data:{
            calling             :'people',
            action              :'register',
            name: name,
            email: email,
            password: password,
            signature: signature,
        },
        error: function (request, status, error) {
            console.log("Request Error");
        }
    }).done(function(data){
        console.log('Return: '+data.message);

        if(data.return){
            $('#dialog-message').html('กำลังสมัครสมาชิกใหม่...');
            $('#dialog-box').fadeIn(300);

            if(redirect == 'editor'){
                window.location = 'editor.php?';
            }else if(redirect){
                window.location = 'case-'+redirect+'.html';
            }else{
                window.location = 'profile.php';
            }
        }
        else{
            $('#status-message').html('อีเมลนี้ถูกใช้แล้ว!').slideDown(500).delay(3000).slideUp(300);
            $('#login-status').html('สมัครสมาชิก');
        }
    }).error();
}

function changePassword(){
    var href        = 'api.people.php';
    var password    = $('#password').val();
    var signature   = $('#signature').val();

    if(password == ''){
        showAlert('กรุณากรอกรหัสผ่านที่คุณต้องการค่ะ');
        return false;
    }

    $.ajax({
        url         :href,
        cache       :false,
        dataType    :"json",
        type        :"POST",
        data:{
            calling             :'people',
            action              :'changePassword',
            password: password,
            signature: signature,
        },
        error: function (request, status, error) {
            console.log("Request Error");
        }
    }).done(function(data){
        console.log('callback: '+data.return+', '+data.message);

        if(data.return){
            $('#dialog-message').html('กำลังเข้าสู่ระบบ...');
            $('#dialog-box').fadeIn(300);
            window.location = 'profile.php';
        }
        else{
            $('#status-message').html('อีเมลและรหัสผ่านของคุณไม่ถูกต้อง!').slideDown(500).delay(3000).slideUp(300);
            $('#login-status').html('เข้าสู่ระบบ');
            return false;
        }
    }).error();
}

// function ForgetPassword(){
//     var href = 'api.user.php';
//     var email = $('#email').val();

//     if(!email){
//         $('#status-message').html('กรอกอีเมลของคุณ!').slideDown(500).delay(1000).slideUp(300);
//         return false;
//     }

//     $('#login-status').html('<i class="fa fa-circle-o-notch fa-spin"></i>กำลังส่งอีเมล...');

//     $.ajax({
//         url         :href,
//         cache       :false,
//         dataType    :"json",
//         type        :"POST",
//         data:{
//             calling             :'User',
//             action              :'ForgetPassword',
//             email            :email,
//         },
//         error: function (request, status, error) {
//             console.log("Request Error");
//         }
//     }).done(function(data){
//         console.log('Return: '+data.message);

//         $('#dialog-message').html('กำลังส่งอีเมล...');
//         $('#dialog-box').fadeIn(300);
        
//         setTimeout(function(){window.location = 'forget_success.php';},300);
//     }).error();
// }

// function SubmitAddress(){
//     var href = 'api.user.php';
//     var address_id = $('#address_id').val();
//     var address = $('#address').val();
//     var order_id = $('#order_id').val();

//     console.log(address);

//     if(!address){
//         return false;
//     }

//     $('#login-status').html('<i class="fa fa-circle-o-notch fa-spin"></i>กำลังเปลี่ยนรหัสผ่าน...');

//     $.ajax({
//         url         :href,
//         cache       :false,
//         dataType    :"json",
//         type        :"POST",
//         data:{
//             calling             :'User',
//             action              :'SubmitAddress',
//             address             :address,
//             address_id          :address_id,
//         },
//         error: function (request, status, error) {
//             console.log("Request Error");
//         }
//     }).done(function(data){
//         console.log('Return: '+data.message);

//         $('#dialog-message').html('กำลังเปลี่ยนรหัสผ่าน...');
//         $('#dialog-box').fadeIn(300);

//         // Redirect page after submit address.
//         if(order_id)
//             setTimeout(function(){window.location = 'order-'+order_id+'.html';},1000);
//         else
//             setTimeout(function(){window.location = 'me.php'},300);

//     }).error();
// }

// function EditInfo(){
//     var href = 'api.user.php';

//     var name = $('#name').val();
//     var email = $('#email').val();
//     var phone = $('#phone').val();

//     if(!email || !name || !phone){
//         return false;
//     }

//     $('#login-status').html('<i class="fa fa-circle-o-notch fa-spin"></i>กำลังบันทึก...');

//     $.ajax({
//         url         :href,
//         cache       :false,
//         dataType    :"json",
//         type        :"POST",
//         data:{
//             calling             :'User',
//             action              :'EditInfo',
//             name                :name,
//             email               :email,
//             phone               :phone,
//         },
//         error: function (request, status, error) {
//             console.log("Request Error");
//         }
//     }).done(function(data){
//         console.log('Return: '+data.message);

//         $('#dialog-message').html('กำลังบันทึก...');
//         $('#dialog-box').fadeIn(300);

//         // Redirect page after submit address.
//         setTimeout(function(){window.location = 'profile.php'},300);

//     }).error();
// }

// // Change Password from User edit on profile
// function ChangePassword(){
//     var href = 'api.user.php';
//     var password = $('#password').val();

//     if(!password){
//         return false;
//     }

//     $('#login-status').html('<i class="fa fa-circle-o-notch fa-spin"></i>กำลังเปลี่ยนรหัสผ่าน...');

//     $.ajax({
//         url         :href,
//         cache       :false,
//         dataType    :"json",
//         type        :"POST",
//         data:{
//             calling             :'User',
//             action              :'ChangePassword',
//             password            :password,
//         },
//         error: function (request, status, error) {
//             console.log("Request Error");
//         }
//     }).done(function(data){
//         console.log('Return: '+data.message);

//         $('#dialog-message').html('กำลังเปลี่ยนรหัสผ่าน...');
//         $('#dialog-box').fadeIn(300);
//         setTimeout(function(){window.location = 'change_password_success.php';},300);
//     }).error();
// }

// // New Password by Forget Password
// function NewPassword(){
//     var href = 'api.user.php';

//     var email = $('#email').val();
//     var forget_code = $('#forget_code').val();
//     var password = $('#password').val();

//     if(!email){
//         return false;
//     }

//     $.ajax({
//         url         :href,
//         cache       :false,
//         dataType    :"json",
//         type        :"POST",
//         data:{
//             calling             :'User',
//             action              :'CreatePasswordForgetFunction',
//             email            :email,
//             forget_code            :forget_code,
//             password            :password,
//         },
//         error: function (request, status, error) {
//             console.log("Request Error");
//         }
//     }).done(function(data){
//         console.log('Return: '+data.message);

//         // Redirect page after submit address.
//         $('#dialog-box').fadeIn(300);
//         setTimeout(function(){window.location = 'change_password_success.php';},300);

//     }).error();
// }