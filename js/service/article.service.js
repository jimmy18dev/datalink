function publishing(article_id,status){
	var href = 'api.article.php';
	var html = '';
	
	$.ajax({
        url         :href,
        cache       :false,
        dataType    :"json",
        type        :"POST",
        data:{
            calling             :'article',
            action              :'publishing',
            article_id          :article_id,
            status              :status,
        },
        error: function (request, status, error) {
            console.log("Request Error");
        }
	}).done(function(data){
		console.log('Return: '+data.message+','+data.return);
        $('#article-'+article_id).fadeOut();
	}).error();
}

function like(article_id){
    var href = 'api.article.php';
    var html = '';
    
    $.ajax({
        url         :href,
        cache       :false,
        dataType    :"json",
        type        :"POST",
        data:{
            calling             :'article',
            action              :'like',
            article_id: article_id,
        },
        error: function (request, status, error) {
            console.log("Request Error");
        }
    }).done(function(data){
        console.log('Return: '+data.message+','+data.return);
        $('#like-btn').addClass('like-active');
        $('#like-icon').html('<i class="fa fa-star"></i>');
        $('#like-caption').html('ฉันเห็นด้วย');

    }).error();
}

function thank(article_id){
    var href = 'api.article.php';
    var html = '';
    
    $.ajax({
        url         :href,
        cache       :false,
        dataType    :"json",
        type        :"POST",
        data:{
            calling             :'article',
            action              :'thank',
            article_id: article_id,
        },
        error: function (request, status, error) {
            console.log("Request Error");
        }
    }).done(function(data){
        console.log('Return: '+data.message+','+data.return);

        $('#thank-icon').addClass('thank-active');
        $('#thank-icon').html('<i class="fa fa-heart"></i>');
        $('#thank-caption').html('ขอบคุณแล้ว');
    }).error();
}

function favorite(article_id){
    var href = 'api.article.php';
    var html = '';
    
    $.ajax({
        url         :href,
        cache       :false,
        dataType    :"json",
        type        :"POST",
        data:{
            calling             :'article',
            action              :'favorite',
            article_id: article_id,
        },
        error: function (request, status, error) {
            console.log("Request Error");
        }
    }).done(function(data){
        console.log('Return: '+data.message+','+data.return);

        $('#favorite-btn').addClass('favorite-active');
        $('#favorite-icon').html('<i class="fa fa-bookmark"></i>');
        $('#favorite-caption').html('บันทึกแล้ว');
        $('#bookmark-tag').show();
        window.location.hash = '#favorite-saved';
    }).error();
}

function updateRead(){
    var article_id = $('#article_id').val();
    var read_count = $('#article_read_count').val();
    var href = 'api.article.php';
    var html = '';

    if(article_id == ''){
        return false;
    }
    
    $.ajax({
        url         :href,
        cache       :false,
        dataType    :"json",
        type        :"POST",
        data:{
            calling             :'article',
            action              :'updateRead',
            article_id: article_id,
        },
        error: function (request, status, error) {
            console.log("Request Error");
        }
    }).done(function(data){
        console.log('Return: '+data.message+','+data.return);
        $('#read_count').html(++read_count);
    }).error();
}