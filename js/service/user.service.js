function login(){
    var href        = 'api.user.php';
    var username    = $('#username').val();
    var password    = $('#password').val();

    if(password == ""){
        alert('Please enter your Username!');
        return false;
    }else if(password == ""){
        alert('Please enter your Password!');
        return false;
    }

    $('#login-btn').addClass('login-btn-loading');
    $('#btn-caption').html('Please wait...');
    $('#btn-icon').html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i>');

    $.ajax({
        url         :href,
        cache       :false,
        dataType    :"json",
        type        :"POST",
        data:{
            calling         :'user',
            action          :'login',
            username        :username,
            password        :password,
        },
        error: function (request, status, error) {
            console.log("Request Error");
        }
    }).done(function(data){
        console.log('callback: '+data.return+','+data.message);

        if(data.return){
            setTimeout(function(){
                window.location = 'index.php';
            },1000);
        }else{
            alert('Login failed please check your username and password!');
            location.reload();
        }
    }).error();
}