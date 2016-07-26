function createMessage(){
    var href        = 'api.message.php';

    var topic = $('#topic').val();
    var message = $('#message').val();
    var id = $('#message_id').val();

    if(message == '') return false;

    $.ajax({
        url         :href,
        cache       :false,
        dataType    :"json",
        type        :"POST",
        data:{
            calling         :'message',
            action          :'save_message',
            id:id,
            topic           :topic,
            message         :message,
        },
        error: function (request, status, error) {
            console.log("Request Error");
        }
    }).done(function(data){
        console.log('Return: '+data.message);
        location.reload();
    }).error();
}

function deleteMessage(id){
    var href        = 'api.message.php';

    if(id == '') return false;

    $.ajax({
        url         :href,
        cache       :false,
        dataType    :"json",
        type        :"POST",
        data:{
            calling         :'message',
            action          :'delete_message',
            id           :id,
        },
        error: function (request, status, error) {
            console.log("Request Error");
        }
    }).done(function(data){
        console.log('Return: '+data.message);
        location.reload();
    }).error();
}

function edit(id,topic,message){
    $('#message_id').val(id);
    $('#topic').val(topic);
    $('#message').val(message);
}