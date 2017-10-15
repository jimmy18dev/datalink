// OPERATION RECIPE
function createOperation(){
    var href            = 'api.operation.php';
    var name            = $('#name').val();
    var description     = $('#description').val();
    var route_id        = $('#route_id').val();

    $('#btn-caption').html('Creating');
    $('#btn-icon').html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i>');
    $('#submit-btn').addClass('btn-loading');

    $.ajax({
        url         :href,
        cache       :false,
        dataType    :"json",
        type        :"POST",
        data:{
            calling         :'operation',
            action          :'create_operation',
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
function editOperation(id){
    var href            = 'api.operation.php';
    var name            = $('#name').val();
    var description     = $('#description').val();
    var route_id        = $('#route_id').val();

    $('#btn-caption').html('Creating');
    $('#btn-icon').html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i>');
    $('#submit-btn').addClass('btn-loading');

    $.ajax({
        url         :href,
        cache       :false,
        dataType    :"json",
        type        :"POST",
        data:{
            calling         :'operation',
            action          :'edit_operation',
            id              :id,
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

function deleteOperation(operation_id){
    var href            = 'api.operation.php';
    var route_id        = $('#route_id').val();

    var agree       = confirm('Are you sure you want to delete this operation ?');
    if(!agree){ return false; }

    $('#loading-box').fadeIn(300);

    $.ajax({
        url         :href,
        cache       :false,
        dataType    :"json",
        type        :"POST",
        data:{
            calling         :'operation',
            action          :'delete_operation',
            operation_id    :operation_id,
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

// Connect Operation to Route
// function createMatching(operation_id){
//     var href        = 'api.operation.php';
//     var route_id    = $('#route_id').val();

//     $.ajax({
//         url         :href,
//         cache       :false,
//         dataType    :"json",
//         type        :"POST",
//         data:{
//             calling         :'operation',
//             action          :'create_macthing',
//             route_id        :route_id,
//             operation_id    :operation_id,
//         },
//         error: function (request, status, error) {
//             console.log("Request Error");
//         }
//     }).done(function(data){
//         console.log('Return: '+data.message);
//         window.location = 'operation.php?route='+route_id;
//     }).error();
// }

function swapMatch(operation_id){
    var href            = 'api.operation.php';
    var route_id        = $('#route_id').val();

    $.ajax({
        url         :href,
        cache       :false,
        dataType    :"json",
        type        :"POST",
        data:{
            calling             :'operation',
            action              :'swap_macth',
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

function setFinal(type,operation_id){
    var href            = 'api.operation.php';

    $.ajax({
        url         :href,
        cache       :false,
        dataType    :"json",
        type        :"POST",
        data:{
            calling             :'operation',
            action              :'set_final',
            type                :type,
            operation_id        :operation_id,

        },
        error: function (request, status, error) {
            console.log("Request Error");
        }
    }).done(function(data){
        console.log('Return: '+data.message);
        location.reload();
    }).error();
}