// OPERATION RECIPE
function createOperation(){
    var href            = 'api.operation.php';
    var name            = $('#name').val();
    var description     = $('#description').val();
    var route_id        = $('#route_id').val();

    $.ajax({
        url         :href,
        cache       :false,
        dataType    :"json",
        type        :"POST",
        data:{
            calling             :'operation',
            action              :'create_operation',
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
function editOperation(id){
    var href            = 'api.operation.php';
    var name            = $('#name').val();
    var description     = $('#description').val();
    var route_id        = $('#route_id').val();

    $.ajax({
        url         :href,
        cache       :false,
        dataType    :"json",
        type        :"POST",
        data:{
            calling             :'operation',
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
        window.location = 'operation.php?route='+route_id;
    }).error();
}

function deleteOperation(operation_id){
    var href            = 'api.operation.php';
    var route_id        = $('#route_id').val();

    $.ajax({
        url         :href,
        cache       :false,
        dataType    :"json",
        type        :"POST",
        data:{
            calling             :'operation',
            action              :'delete_operation',
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

// Connect Operation to Route
function createMatching(operation_id){
    var href            = 'api.operation.php';
    var route_id = $('#route_id').val();

    $.ajax({
        url         :href,
        cache       :false,
        dataType    :"json",
        type        :"POST",
        data:{
            calling             :'operation',
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