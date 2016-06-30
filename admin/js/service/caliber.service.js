function createCaliber(){
    var href        = 'api.caliber.php';

    var code        = $('#code').val();
    var name        = $('#name').val();
    var description = $('#description').val();
    var family      = $('#family').val();
    var hrs         = $('#hrs').val();
    var remark      = $('#remark').val();

    $('#btn-caption').html('Creating');
    $('#btn-icon').html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i>');
    $('#submit-btn').addClass('btn-loading');

    $.ajax({
        url         :href,
        cache       :false,
        dataType    :"json",
        type        :"POST",
        data:{
            calling         :'caliber',
            action          :'create',
            code            :code,
            name            :name,
            description     :description,
            family          :family,
            hrs             :hrs,
            remark          :remark,
        },
        error: function (request, status, error) {
            console.log("Request Error");
        }
    }).done(function(data){
        console.log('Return: '+data.message);

        if(data.return && data.return > 0){
            setTimeout(function(){
                window.location = 'route.php?caliber='+data.return;
            },1000);
        }
        else{
            window.location = 'caliber.php?';
        }
    }).error();
}

// Update user information
function editCaliber(id){
    var href        = 'api.caliber.php';

    var code        = $('#code').val();
    var name        = $('#name').val();
    var description = $('#description').val();
    var family      = $('#family').val();
    var hrs         = $('#hrs').val();
    var remark      = $('#remark').val();

    $('#btn-caption').html('Updating');
    $('#btn-icon').html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i>');
    $('#submit-btn').addClass('btn-loading');

    $.ajax({
        url         :href,
        cache       :false,
        dataType    :"json",
        type        :"POST",
        data:{
            calling         :'caliber',
            action          :'edit',
            id              :id,
            code            :code,
            name            :name,
            description     :description,
            family          :family,
            hrs             :hrs,
            remark          :remark,
        },
        error: function (request, status, error) {
            console.log("Request Error");
        }
    }).done(function(data){
        console.log('Return: '+data.message);
        setTimeout(function(){
            window.location = 'route.php?caliber='+id;
        },1000);
    }).error();
}

function deleteCaliber(caliber_id){
    var href            = 'api.caliber.php';
    var agree       = confirm('Are you sure you want to delete this caliber code ?');
    if(!agree){ return false; }

    $('#loading-box').fadeIn(300);

    $.ajax({
        url         :href,
        cache       :false,
        dataType    :"json",
        type        :"POST",
        data:{
            calling         :'caliber',
            action          :'delete_caliber',
            caliber_id      :caliber_id,
        },
        error: function (request, status, error) {
            console.log("Request Error");
        }
    }).done(function(data){
        console.log('Return: '+data.message);
        setTimeout(function(){
            window.location = 'caliber.php';
        },1000);
        
    }).error();
}

function activeCaliber(caliber_id,caliber_name){
    var href            = 'api.caliber.php';
    var agree           = confirm('Are you sure you want set this '+caliber_name+' to active ?');
    if(!agree){ return false; }

    $('#loading-box').fadeIn(300);

    $.ajax({
        url         :href,
        cache       :false,
        dataType    :"json",
        type        :"POST",
        data:{
            calling         :'caliber',
            action          :'setActive',
            caliber_id      :caliber_id,
        },
        error: function (request, status, error) {
            console.log("Request Error");
        }
    }).done(function(data){
        console.log('Return: '+data.message);
        setTimeout(function(){
            location.reload();
        },1000);
    }).error();
}

function deactiveCaliber(caliber_id,caliber_name){
    var href            = 'api.caliber.php';
    var agree           = confirm('Are you sure you want set this '+caliber_name+' to deactive ?');
    if(!agree){ return false; }

    $('#loading-box').fadeIn(300);

    $.ajax({
        url         :href,
        cache       :false,
        dataType    :"json",
        type        :"POST",
        data:{
            calling         :'caliber',
            action          :'setDeactive',
            caliber_id      :caliber_id,
        },
        error: function (request, status, error) {
            console.log("Request Error");
        }
    }).done(function(data){
        console.log('Return: '+data.message);
        setTimeout(function(){
            location.reload();
        },1000);
    }).error();
}