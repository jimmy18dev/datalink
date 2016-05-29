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
        window.location = 'remark.php?';
    }).error();
}

function deleteRemark(remark_id){
    var href        = 'api.remark.php';

    $.ajax({
        url         :href,
        cache       :false,
        dataType    :"json",
        type        :"POST",
        data:{
            calling             :'remark',
            action              :'delete',
            remark_id:remark_id,
        },
        error: function (request, status, error) {
            console.log("Request Error");
        }
    }).done(function(data){
        console.log('Return: '+data.message);
        window.location = 'remark.php?';
    }).error();
}