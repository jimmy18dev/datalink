var api_caliber     = 'api.caliber.php';
var api_route       = 'api.route.php';
var api_operation   = 'api.caliber.php';

$(document).ready(function(){

    var caliber_id;
    var route_id;
    var operation_id;

    $dialogCaliber      = $('#dialogCaliber');
    $filterCaliber      = $('#filterCaliber');
    $btnCreateCaliber   = $('#btnCreateCaliber');
    $btnCloseCaliber    = $('#btnCloseCaliber');
    $btnSubmitCaliber   = $('#btnSubmitCaliber');

    $btnCreateOperation = $('#btnCreateOperation');

    $btnCreateCaliber.click(function(){
        $dialogCaliber.fadeIn(300);
        $filterCaliber.fadeIn(100);
    });

    $btnCloseCaliber.click(function(){
        closeCaliber();
    });

    function closeCaliber(){
        $dialogCaliber.fadeOut(300);
        $filterCaliber.fadeOut(100);

        $('#caliber_code').val('');
        $('#caliber_family').val('');
        $('#caliber_description').val('');
        $('#caliber_stdtime').val('');
    }

    $btnSubmitCaliber.click(function(){

        var code            = $('#caliber_code').val();
        var family          = $('#caliber_family').val();
        var description     = $('#caliber_description').val();
        var stdtime         = $('#caliber_stdtime').val();

        console.log(code,family,description,stdtime);

        $.ajax({
            url         :api_caliber,
            cache       :false,
            dataType    :"json",
            type        :"POST",
            data:{
                calling         :'caliber',
                action          :'create',
                code            :code,
                description     :description,
                family          :family,
                stdtime         :stdtime,
            },
            error: function (request, status, error) {
                console.log(request.responseText);
            }
        }).done(function(data){
            console.log(data);
            closeCaliber();
            caliberList('');
        });
    });

    $btnCreateRoute     = $('#btnCreateRoute');
    $dialogRoute        = $('#dialogRoute');
    $btnCloseRoute      = $('#btnCloseRoute');
    $btnSubmitRoute     = $('#btnSubmitRoute');
    $filterRoute        = $('#filterRoute');

    $btnCreateRoute.click(function(){
        $dialogRoute.fadeIn(300);
        $filterRoute.fadeIn(100);
    });

    $btnCloseRoute.click(function(){
        closeRoute();
    });

    function closeRoute(){
        $dialogRoute.fadeOut(300);
        $filterRoute.fadeOut(100);

        $('#route_name').val('');
        $('#route_description').val('');
    }

    $btnSubmitRoute.click(function(){
        var name            = $('#route_name').val();
        var description     = $('#route_description').val();

        $.ajax({
            url         :api_route,
            cache       :false,
            dataType    :"json",
            type        :"POST",
            data:{
                calling         :'route',
                action          :'create_route',
                caliber_id      :caliber_id,
                name            :name,
                description     :description,
            },
            error: function (request, status, error) {
                console.log("Request Error");
            }
        }).done(function(data){
            console.log(data);
            closeRoute();
            routeList(caliber_id);
        });
    });

	// Open hidden container
	$('#btn-special-list').click(function(){
		$('#special-list').addClass('-show');
		$('#filter').fadeIn(300);
	});

    $('#caliber-search').keyup(function(){
        caliberList($(this).val());
    });

    caliberList('');

	// Selection Queue items
	$(".col-container").on('click','.caliber-items',function(e){
		caliber_id = $(this).attr('data-id');
        $('.caliber-items').removeClass('-active');
        $(this).addClass('-active');

		console.clear();
        console.log('caliber',caliber_id);
		$('#operation_list').html('<div class="intro">OPERATION</div>');
		routeList(caliber_id);
	});

	$(".col-container").on('click','.route-items',function(e){
		route_id = $(this).attr('data-id');
        $('.route-items').removeClass('-active');
        $(this).addClass('-active');

		console.clear();
        console.log('caliber',caliber_id);
        console.log('route',route_id);
		operationList(route_id);
	});
});

function caliberList(keyword){
    var href = 'api.caliber.php';
    var nHtml    = '';

    $('#caliber_list').html('<div class="loading"><i class="fa fa-spinner fa-spin" aria-hidden="true"></i>Loading...</div>');

    $.ajax({
        url         :href,
        cache       :false,
        dataType    :"json",
        type        :"GET",
        data:{
            calling     :'caliber',
            action      :'list_caliber',
            keyword  :keyword,
        },
        error: function (request, status, error) {
            console.log("Request Error");
        }
    }).done(function(data){

        console.log(data);

        $.each(data.data.items,function(k,v){

            nHtml +='<div class="caliber-items -status-'+v.caliber_status+'" data-id="'+v.caliber_id+'">';
            nHtml +='<div class="detail">';
            nHtml +='<div class="name">'+v.caliber_code+''+v.caliber_family+'</div>';
            nHtml +='<div class="info">Stdtime: '+v.caliber_stdtime+' Hrs/K - Route: '+v.route_name+'</div>';
            nHtml +='</div>';
            nHtml +='<div class="icon"><i class="fa fa-angle-right" aria-hidden="true"></i></div>';
            nHtml +='</div>';
        });

        $('#caliber_list').html(nHtml);
        nHtml = '';

    }).error();
}

function routeList(caliber_id){
    var href = 'api.caliber.php';
    var nHtml    = '';

    $.ajax({
        url         :href,
        cache       :false,
        dataType    :"json",
        type        :"GET",
        data:{
            calling 	:'caliber',
            action 		:'list_route',
            caliber_id 	:caliber_id,
        },
        error: function (request, status, error) {
            console.log("Request Error");
        }
    }).done(function(data){

    	console.log(data);

        $.each(data.data.items,function(k,v){

        	nHtml +='<div class="route-items" data-id="'+v.route_id+'">';
			nHtml +='<div class="detail">';
			nHtml +='<div class="name">'+v.route_name+'</div>';
			nHtml +='<div class="info">'+v.route_total_operation+' Operations</div>';
			nHtml +='</div>';
			nHtml +='<div class="icon"><i class="fa fa-angle-right" aria-hidden="true"></i></div>';
			nHtml +='</div>';
        });

        $('#route_list').html(nHtml);
        nHtml = '';

    }).error();
}

function operationList(route_id){
    var href = 'api.caliber.php';
    var nHtml    = '';

    $.ajax({
        url         :href,
        cache       :false,
        dataType    :"json",
        type        :"GET",
        data:{
            calling 	:'caliber',
            action 		:'list_operation',
            route_id 	:route_id,
        },
        error: function (request, status, error) {
            console.log("Request Error");
        }
    }).done(function(data){

    	console.log(data);

        $.each(data.data.items,function(k,v){
			if(v.operation_match_id == null){
				nHtml +='<div class="operation-items -disable">';
				nHtml +='<div class="detail">... '+v.operation_name+'</div>';
				nHtml +='<div class="icon"><i class="fa fa-circle" aria-hidden="true"></i></div>';
				nHtml +='</div>';
			}else{
				nHtml +='<div class="operation-items">';
				nHtml +='<div class="detail">'+v.operation_sort+'. '+v.operation_name+' '+v.operation_match_id+'</div>';
				nHtml +='<div class="icon"><i class="fa fa-check-circle" aria-hidden="true"></i></div>';
				nHtml +='</div>';	
			}
        });

        $('#operation_list').html(nHtml);
        nHtml = '';

    }).error();
}