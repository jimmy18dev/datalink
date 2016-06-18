function create(){
    var href        = 'api.caliber.php';

    var code        = $('#code').val();
    var name        = $('#name').val();
    var description = $('#description').val();
    var family      = $('#family').val();
    var hrs         = $('#hrs').val();
    var remark      = $('#remark').val();

    $('#loading-message').html('กำลังเข้าระบบ...');
    $('#loading-box').fadeIn(300);

    $.ajax({
        url         :href,
        cache       :false,
        dataType    :"json",
        type        :"POST",
        data:{
            calling             :'caliber',
            action              :'create',
            code:code,
            name:name,
            description:description,
            family:family,
            hrs:hrs,
            remark:remark,
        },
        error: function (request, status, error) {
            console.log("Request Error");
        }
    }).done(function(data){
        console.log('Return: '+data.message);

        if(data.return){
            window.location = 'caliber.php';
        }
        else{
            $('#loading-box').fadeOut(300);
            alert('แก้ข้อผิดพลาด!');
        }
    }).error();
}

// Update user information
function edit(id){
    var href        = 'api.caliber.php';

    var code        = $('#code').val();
    var name        = $('#name').val();
    var description = $('#description').val();
    var family      = $('#family').val();
    var hrs         = $('#hrs').val();
    var remark      = $('#remark').val();

    $('#loading-message').html('กำลังเข้าระบบ...');
    $('#loading-box').fadeIn(300);

    $.ajax({
        url         :href,
        cache       :false,
        dataType    :"json",
        type        :"POST",
        data:{
            calling             :'caliber',
            action              :'edit',
            id:id,
            code:code,
            name:name,
            description:description,
            family:family,
            hrs:hrs,
            remark:remark,
        },
        error: function (request, status, error) {
            console.log("Request Error");
        }
    }).done(function(data){
        console.log('Return: '+data.message);

        if(data.return){
            window.location = 'caliber.php';
        }
        else{

        }

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

//ROUTE
function createRoute(){
    var href            = 'api.caliber.php';
    var caliber_id     = $('#caliber_id').val();
    var route_code     = $('#route_code').val();
    var route_name     = $('#route_code').val();
    var name            = $('#name').val();
    

    $('#login-status').html('<i class="fa fa-circle-o-notch fa-spin"></i>กำลังสมัครสมาชิก...');

    $.ajax({
        url         :href,
        cache       :false,
        dataType    :"json",
        type        :"POST",
        data:{
            calling             :'caliber',
            action              :'create_route',
            caliber_id:caliber_id,
            route_code:route_code,
            route_name:route_name,
            name:name,
        },
        error: function (request, status, error) {
            console.log("Request Error");
        }
    }).done(function(data){
        console.log('Return: '+data.message);
        window.location = 'caliber.php';
    }).error();
}
function editRoute(){
    var href            = 'api.caliber.php';
    var route_id     = $('#route_id').val();
    var route_code     = $('#route_code').val();
    var route_name     = $('#route_code').val();
    var name            = $('#name').val();
    

    $('#login-status').html('<i class="fa fa-circle-o-notch fa-spin"></i>กำลังสมัครสมาชิก...');

    $.ajax({
        url         :href,
        cache       :false,
        dataType    :"json",
        type        :"POST",
        data:{
            calling             :'caliber',
            action              :'edit_route',
            route_id:route_id,
            route_code:route_code,
            route_name:route_name,
            name:name,
        },
        error: function (request, status, error) {
            console.log("Request Error");
        }
    }).done(function(data){
        console.log('Return: '+data.message);
        window.location = 'caliber.php';
    }).error();
}


// OPERATION RECIPE
function createOperation(){
    var href            = 'api.caliber.php';
    var name            = $('#name').val();
    var description     = $('#description').val();

    $('#login-status').html('<i class="fa fa-circle-o-notch fa-spin"></i>กำลังสมัครสมาชิก...');

    $.ajax({
        url         :href,
        cache       :false,
        dataType    :"json",
        type        :"POST",
        data:{
            calling             :'caliber',
            action              :'create_operation',
            name:name,
            description:description,
        },
        error: function (request, status, error) {
            console.log("Request Error");
        }
    }).done(function(data){
        console.log('Return: '+data.message);
        window.location = 'operation.php';
    }).error();
}
function editOperation(id){
    var href            = 'api.caliber.php';
    var name            = $('#name').val();
    var description     = $('#description').val();

    $('#login-status').html('<i class="fa fa-circle-o-notch fa-spin"></i>กำลังสมัครสมาชิก...');

    $.ajax({
        url         :href,
        cache       :false,
        dataType    :"json",
        type        :"POST",
        data:{
            calling             :'caliber',
            action              :'edit_operation',
            id:id,
            name:name,
            description:description,
        },
        error: function (request, status, error) {
            console.log("Request Error");
        }
    }).done(function(data){
        console.log('Return: '+data.message);
        window.location = 'operation.php';
    }).error();
}

// Connect Operation to Route
function createMatching(operation_id){
    var href            = 'api.caliber.php';
    var route_id = $('#route_id').val();

    $.ajax({
        url         :href,
        cache       :false,
        dataType    :"json",
        type        :"POST",
        data:{
            calling             :'caliber',
            action              :'create_macthing',
            route_id:route_id,
            operation_id:operation_id,
        },
        error: function (request, status, error) {
            console.log("Request Error");
        }
    }).done(function(data){
        console.log('Return: '+data.message);
        window.location = 'operation.php?route='+route_id;
    }).error();
}