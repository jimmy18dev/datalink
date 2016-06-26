function createRemark(){
    var href            = 'api.remark.php';
    var description     = $('#description').val();
    var category_id     = $('#category_id').val();

    $('#btn-caption').html('Creating');
    $('#btn-icon').html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i>');
    $('#submit-btn').addClass('btn-loading');

    $.ajax({
        url         :href,
        cache       :false,
        dataType    :"json",
        type        :"POST",
        data:{
            calling     :'remark',
            action      :'create',
            category_id :category_id,
            description :description,
        },
        error: function (request, status, error) {
            console.log("Request Error");
        }
    }).done(function(data){
        console.log('Return: '+data.message);

        if(data.return){
            setTimeout(function(){
                window.location = 'remark.php?';
            },1000);
        }
        else{
            alert('แก้ข้อผิดพลาด!');
            location.reload();
        }
    }).error();
}

// Update user information
function editRemark(id){
    var href            = 'api.remark.php';
    var description     = $('#description').val();
    var category_id     = $('#category_id').val();

    $('#btn-caption').html('Updating');
    $('#btn-icon').html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i>');
    $('#submit-btn').addClass('btn-loading');

    $.ajax({
        url         :href,
        cache       :false,
        dataType    :"json",
        type        :"POST",
        data:{
            calling     :'remark',
            action      :'edit',
            id          :id,
            category_id :category_id,
            description :description,
        },
        error: function (request, status, error) {
            console.log("Request Error");
        }
    }).done(function(data){
        console.log('Return: '+data.message);
        setTimeout(function(){
            window.location = 'remark.php?';
        },1000);
    }).error();
}

function deleteRemark(remark_id){
    var href        = 'api.remark.php';
    var agree       = confirm('Are you sure you want to delete this remark ?');

    if(!agree){ return false; }

    $('#loading-box').fadeIn(300);

    $.ajax({
        url         :href,
        cache       :false,
        dataType    :"json",
        type        :"POST",
        data:{
            calling     :'remark',
            action      :'delete',
            remark_id   :remark_id,
        },
        error: function (request, status, error) {
            console.log("Request Error");
        }
    }).done(function(data){
        console.log('Return: '+data.message);
        setTimeout(function(){
            window.location = 'remark.php?';
        },1000);
    }).error();
}