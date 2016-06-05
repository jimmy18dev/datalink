//ROUTE
function createRoute(){
    var href            = 'api.route.php';
    var caliber_id      = $('#caliber_id').val();
    var code            = $('#code').val();
    var name            = $('#name').val();
    var description     = $('#description').val();

    $.ajax({
        url         :href,
        cache       :false,
        dataType    :"json",
        type        :"POST",
        data:{
            calling             :'route',
            action              :'create_route',
            caliber_id:caliber_id,
            code:code,
            name:name,
            description:description,
        },
        error: function (request, status, error) {
            console.log("Request Error");
        }
    }).done(function(data){
        console.log('Return: '+data.message);
        window.location = 'route.php?caliber='+caliber_id;
    }).error();
}
function editRoute(){
    var href            = 'api.route.php';
    var route_id        = $('#route_id').val();
    var code            = $('#code').val();
    var name            = $('#name').val();
    var description     = $('#description').val();

    $.ajax({
        url         :href,
        cache       :false,
        dataType    :"json",
        type        :"POST",
        data:{
            calling             :'route',
            action              :'edit_route',
            route_id:route_id,
            code:code,
            name:name,
            description:description,
        },
        error: function (request, status, error) {
            console.log("Request Error");
        }
    }).done(function(data){
        console.log('Return: '+data.message);
        window.location = 'operation.php?route='+route_id;
    }).error();
}

function deleteRoute(route_id){
    var href            = 'api.route.php';
    var caliber_id      = $('#caliber_id').val();
    var agree       = confirm('Are you sure you want to delete this route ?');
    if(!agree){ return false; }

    $.ajax({
        url         :href,
        cache       :false,
        dataType    :"json",
        type        :"POST",
        data:{
            calling             :'route',
            action              :'delete_route',
            route_id:route_id,
        },
        error: function (request, status, error) {
            console.log("Request Error");
        }
    }).done(function(data){
        console.log('Return: '+data.message);
        window.location = 'route.php?caliber='+caliber_id;
    }).error();
}

function setPrimary(route_id,caliber_id){
    var href            = 'api.route.php';
    var agree           = confirm('Are you sure you want set this route to primary ?');
    if(!agree){ return false; }

    $.ajax({
        url         :href,
        cache       :false,
        dataType    :"json",
        type        :"POST",
        data:{
            calling             :'route',
            action              :'set_primary',
            route_id:route_id,
            caliber_id:caliber_id,
        },
        error: function (request, status, error) {
            console.log("Request Error");
        }
    }).done(function(data){
        console.log('Return: '+data.message);
        location.reload();
    }).error();
}