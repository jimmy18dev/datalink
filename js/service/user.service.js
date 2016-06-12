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

    $('#login-message').html('Please Wait...');
    $('#loading-box').fadeIn(300);

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
            window.location = 'index.php';
        }else{
            alert('Login failed please check your username and password!');
            location.reload();
        }
    }).error();
}