//ROUTE
function createRoute(){
    var href            = 'api.route.php';
    var caliber_id      = $('#caliber_id').val();
    var code            = $('#code').val();
    var name            = $('#code').val();
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
        // window.location = 'caliber.php';
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
        // window.location = 'caliber.php';
    }).error();
}

function deleteRoute(route_id){
    var href            = 'api.route.php';
    var caliber_id      = $('#caliber_id').val();

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