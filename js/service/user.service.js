function login(){
    var href        = 'api.user.php';
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
    var password    = $('#password').val();

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
            password:password,
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
    var password    = $('#password').val();

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
            password:password,
        },
        error: function (request, status, error) {
            console.log("Request Error");
        }
    }).done(function(data){
        console.log('Return: '+data.message);
        window.location = 'user.php';
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