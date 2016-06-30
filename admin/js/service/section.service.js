function createSection(){
    var href        = 'api.section.php';
    var name        = $('#name').val();
    var description = $('#description').val();
    var redirect    = $('#redirect').val();

    $('#btn-caption').html('Creating');
    $('#btn-icon').html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i>');
    $('#submit-btn').addClass('btn-loading');

    $.ajax({
        url         :href,
        cache       :false,
        dataType    :"json",
        type        :"POST",
        data:{
            calling         :'section',
            action          :'create',
            name            :name,
            description     :description,
            redirect        :redirect,
        },
        error: function (request, status, error) {
            console.log("Request Error");
        }
    }).done(function(data){
        console.log('Return: '+data.message);

        if(data.return){
            setTimeout(function(){
                window.location = 'section.php?';
            },1000);
        }
        else{
            $('#loading-box').fadeOut(300);
            alert('แก้ข้อผิดพลาด!');
        }
    }).error();
}

// Update user information
function editSection(id){
    var href        = 'api.section.php';
    
    var name        = $('#name').val();
    var description = $('#description').val();
    var redirect    = $('#redirect').val();

    $('#btn-caption').html('Updating');
    $('#btn-icon').html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i>');
    $('#submit-btn').addClass('btn-loading');

    $.ajax({
        url         :href,
        cache       :false,
        dataType    :"json",
        type        :"POST",
        data:{
            calling         :'section',
            action          :'edit',
            id              :id,
            name            :name,
            description     :description,
            redirect        :redirect,
        },
        error: function (request, status, error) {
            console.log("Request Error");
        }
    }).done(function(data){
        console.log('Return: '+data.message);
        setTimeout(function(){
            window.location = 'section.php?';
        },1000);
    }).error();
}

function deleteSection(section_id){
    var href        = 'api.section.php';
    var agree       = confirm('Are you sure you want to delete this section ?');

    if(!agree){ return false; }

    $('#loading-box').fadeIn(300);

    $.ajax({
        url         :href,
        cache       :false,
        dataType    :"json",
        type        :"POST",
        data:{
            calling         :'section',
            action          :'delete',
            section_id      :section_id,
        },
        error: function (request, status, error) {
            console.log("Request Error");
        }
    }).done(function(data){
        console.log('Return: '+data.message);
        setTimeout(function(){
            window.location = 'section.php?';
        },1000);
    }).error();
}