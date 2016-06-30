//ROUTE
function createRoute(){
    var href            = 'api.route.php';
    var caliber_id      = $('#caliber_id').val();
    var code            = $('#code').val();
    var name            = $('#name').val();
    var description     = $('#description').val();

    $('#btn-caption').html('Creating');
    $('#btn-icon').html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i>');
    $('#submit-btn').addClass('btn-loading');

    $.ajax({
        url         :href,
        cache       :false,
        dataType    :"json",
        type        :"POST",
        data:{
            calling         :'route',
            action          :'create_route',
            caliber_id      :caliber_id,
            code            :code,
            name            :name,
            description     :description,
        },
        error: function (request, status, error) {
            console.log("Request Error");
        }
    }).done(function(data){
        console.log(data);
        if(data.return){
            setTimeout(function(){
                window.location = 'operation.php?route='+data.return;
            },1000);
        }
        else{
            window.location = 'route.php?caliber='+caliber_id;
        }
    }).error();
}
function editRoute(){
    var href            = 'api.route.php';
    var route_id        = $('#route_id').val();
    var code            = $('#code').val();
    var name            = $('#name').val();
    var description     = $('#description').val();

    $('#btn-caption').html('Updating');
    $('#btn-icon').html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i>');
    $('#submit-btn').addClass('btn-loading');

    $.ajax({
        url         :href,
        cache       :false,
        dataType    :"json",
        type        :"POST",
        data:{
            calling         :'route',
            action          :'edit_route',
            route_id        :route_id,
            code            :code,
            name            :name,
            description     :description,
        },
        error: function (request, status, error) {
            console.log("Request Error");
        }
    }).done(function(data){
        console.log('Return: '+data.message);
        setTimeout(function(){
            window.location = 'operation.php?route='+route_id;
        },1000);
    }).error();
}

function deleteRoute(route_id){
    var href            = 'api.route.php';
    var caliber_id      = $('#caliber_id').val();
    var agree           = confirm('Are you sure you want to delete this route ?');
    if(!agree){ return false; }

    $('#loading-box').fadeIn(300);

    $.ajax({
        url         :href,
        cache       :false,
        dataType    :"json",
        type        :"POST",
        data:{
            calling         :'route',
            action          :'delete_route',
            route_id        :route_id,
        },
        error: function (request, status, error) {
            console.log("Request Error");
        }
    }).done(function(data){
        console.log('Return: '+data.message);
        setTimeout(function(){
            window.location = 'route.php?caliber='+caliber_id;
        },1000);
    }).error();
}

function setPrimary(route_id,caliber_id){
    var href            = 'api.route.php';
    var agree           = confirm('Are you sure you want set this route to primary ?');
    if(!agree){ return false; }

    $('#loading-box').fadeIn(300);

    $.ajax({
        url         :href,
        cache       :false,
        dataType    :"json",
        type        :"POST",
        data:{
            calling         :'route',
            action          :'set_primary',
            route_id        :route_id,
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