function login(){
    var href        = 'api.user.php';
    var username    = $('#username').val();
    var password    = $('#password').val();

    if(username == ""){
        alert('Please enter your username!');
        return false;
    }else if(password == ""){
        alert('Please enter your password!');
        return false;
    }

    $('#btn-caption').html('Please wait');
    $('#btn-icon').html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i>');
    $('#submit-btn').addClass('btn-loading');

    $.ajax({
        url         :href,
        cache       :false,
        dataType    :"json",
        type        :"POST",
        data:{
            calling     :'user',
            action      :'login',
            username    :username,
            password    :password,
        },
        error: function (request, status, error) {
            console.log("Request Error");
        }
    }).done(function(data){
        console.log('callback: '+data.return+','+data.message);

        if(data.return){
            setTimeout(function(){
                window.location = 'index.php?message=login_success';
            },1000);
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

    $('#btn-caption').html('Creating...');
    $('#btn-icon').html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i>');
    $('#submit-btn').addClass('btn-loading');

    $.ajax({
        url         :href,
        cache       :false,
        dataType    :"json",
        type        :"POST",
        data:{
            calling         :'user',
            action          :'register',
            code            :code,
            fname           :fname,
            lname           :lname,
            username        :username,
            password        :password,
            line_default    :line_default,
            section_id      :section_id,
        },
        error: function (request, status, error) {
            console.log("Request Error");
        }
    }).done(function(data){
        console.log('Return: '+data.message);

        if(data.return){
            setTimeout(function(){
                window.location = 'user.php?';
            },1000);
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

    $('#btn-caption').html('Updating...');
    $('#btn-icon').html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i>');
    $('#submit-btn').addClass('btn-loading');

    $.ajax({
        url         :href,
        cache       :false,
        dataType    :"json",
        type        :"POST",
        data:{
            calling         :'user',
            action          :'edit',
            id              :id,
            code            :code,
            fname           :fname,
            lname           :lname,
            username        :username,
            password        :password,
            line_default    :line_default,
            section_id      :section_id,
        },
        error: function (request, status, error) {
            console.log("Request Error");
        }
    }).done(function(data){
        console.log('Return: '+data.message);
        setTimeout(function(){
            window.location = 'user.php?';
        },1000);
    }).error();
}

function deactiveUser(user_id,username){
    var href        = 'api.user.php';
    var agree       = confirm('Are you sure you want to deactive this '+username+' account ?');

    if(!agree){ return false; }

    $('#loading-box').fadeIn(300);

    $.ajax({
        url         :href,
        cache       :false,
        dataType    :"json",
        type        :"POST",
        data:{
            calling         :'user',
            action          :'deactive',
            user_id         :user_id,
        },
        error: function (request, status, error) {
            console.log("Request Error");
        }
    }).done(function(data){
        console.log('Return: '+data.message);
        setTimeout(function(){
            window.location = 'user.php?';
        },1000);
    }).error();
}

function addToAdmin(user_id,username){
    var href        = 'api.user.php';
    var agree       = confirm('Are you sure you want add '+username+' to admin ?');

    if(!agree){ return false; }

    $('#loading-box').fadeIn(300);

    $.ajax({
        url         :href,
        cache       :false,
        dataType    :"json",
        type        :"POST",
        data:{
            calling         :'user',
            action          :'add_to_admin',
            user_id         :user_id,
        },
        error: function (request, status, error) {
            console.log("Request Error");
        }
    }).done(function(data){
        console.log('Return: '+data.message);
        setTimeout(function(){
            window.location = 'user_editor.php?user='+user_id;
        },1000);
    }).error();
}

function removeAdmin(user_id,username){
    var href        = 'api.user.php';
    var agree       = confirm('Are you sure you want remove '+username+' as an admin ?');

    if(!agree){ return false; }

    $('#loading-box').fadeIn(300);

    $.ajax({
        url         :href,
        cache       :false,
        dataType    :"json",
        type        :"POST",
        data:{
            calling         :'user',
            action          :'remove_admin',
            user_id         :user_id,
        },
        error: function (request, status, error) {
            console.log("Request Error");
        }
    }).done(function(data){
        console.log('Return: '+data.message);
        setTimeout(function(){
            window.location = 'user_editor.php?user='+user_id;
        },1000);
    }).error();
}