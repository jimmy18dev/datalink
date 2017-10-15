var api_caliber     = 'api.caliber.php';
var api_route       = 'api.route.php';
var api_operation   = 'api.operation.php';

$(document).ready(function(){

    var caliber_id;
    var caliber_name;
    var route_id;
    var operation_id;
    var operation_name;

    $dialogCaliber      = $('#dialogCaliber');
    $filterCaliber      = $('#filterCaliber');
    $btnCreateCaliber   = $('#btnCreateCaliber');
    $btnCloseCaliber    = $('#btnCloseCaliber');
    $btnSubmitCaliber   = $('#btnSubmitCaliber');

    $btnCreateCaliber.click(function(){
        $dialogCaliber.fadeIn(300);
        $filterCaliber.fadeIn(100);
        $btnSubmitCaliber.html('Create');
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

        var id              = $('#caliber_id').val();
        var code            = $('#caliber_code').val();
        var family          = $('#caliber_family').val();
        var description     = $('#caliber_description').val();
        var stdtime         = $('#caliber_stdtime').val();

        $.ajax({
            url         :api_caliber,
            cache       :false,
            dataType    :"json",
            type        :"POST",
            data:{
                calling         :'caliber',
                action          :'submit',
                id              :id,
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
        $btnSubmitRoute.html('Create');
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
        var id              = $('#route_id').val();
        var name            = $('#route_name').val();
        var description     = $('#route_description').val();

        $.ajax({
            url         :api_route,
            cache       :false,
            dataType    :"json",
            type        :"POST",
            data:{
                calling         :'route',
                action          :'submit',
                id              :id,
                name            :name,
                description     :description,
                caliber_id      :caliber_id,
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

    $btnCreateOperation     = $('#btnCreateOperation');
    $dialogOperation        = $('#dialogOperation');
    $btnCloseOperation      = $('#btnCloseOperation');
    $btnSubmitOperation     = $('#btnSubmitOperation');
    $filterOperation        = $('#filterOperation');

    $btnCreateOperation.click(function(){
        $btnSubmitOperation.html('Create');
        $dialogOperation.fadeIn(300);
        $filterOperation.fadeIn(100);
    });

    $btnCloseOperation.click(function(){
        closeOperation();
    });

    function closeOperation(){
        $dialogOperation.fadeOut(300);
        $filterOperation.fadeOut(100);

        $('#operation_name').val('');
        $('#operation_description').val('');
    }

    $btnSubmitOperation.click(function(){
        var id              = $('#operation_id').val();
        var name            = $('#operation_name').val();
        var description     = $('#operation_description').val();

        $.ajax({
            url         :api_operation,
            cache       :false,
            dataType    :"json",
            type        :"POST",
            data:{
                calling         :'operation',
                action          :'submit',
                id              :id,
                name            :name,
                description     :description,
            },
            error: function (request, status, error) {
                console.log(request);
            }
        }).done(function(data){
            console.log(data);
            closeOperation();
            operationList(route_id);
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

    $(".col-container").on('click','.btn-operation-matching',function(e){
        operation_id = $(this).parent().attr('data-id');

        $.ajax({
            url         :api_operation,
            cache       :false,
            dataType    :"json",
            type        :"POST",
            data:{
                calling         :'operation',
                action          :'create_macthing',
                route_id        :route_id,
                operation_id    :operation_id,
            },
            error: function (request, status, error) {
                console.log("Request Error");
            }
        }).done(function(data){
            console.log(data);
            operationList(route_id);
        });
    });

    $(".col-container").on('click','.btn-operation-unmatch',function(e){
        operation_id = $(this).parent().attr('data-id');

        $.ajax({
            url         :api_operation,
            cache       :false,
            dataType    :"json",
            type        :"POST",
            data:{
                calling         :'operation',
                action          :'remove_macthing',
                route_id        :route_id,
                operation_id    :operation_id,
            },
            error: function (request, status, error) {
                console.log("Request Error");
            }
        }).done(function(data){
            console.log(data);
            operationList(route_id);
        }).error();
    });

    $(".col-container").on('click','.btn-caliber-edit',function(e){
        caliber_id      = $(this).parent().attr('data-id');

        console.log(caliber_id);

        $.ajax({
            url         :api_caliber,
            cache       :false,
            dataType    :"json",
            type        :"GET",
            data:{
                calling         :'caliber',
                action          :'get',
                caliber_id      :caliber_id,
            },
            error: function (request, status, error) {
                console.log(request);
            }
        }).done(function(data){
            console.log(data);

            $btnSubmitCaliber.html('Save');
            $dialogCaliber.fadeIn(300);
            $filterCaliber.fadeIn(100);

            $('#caliber_code').val(data.data.dataset.code);
            $('#caliber_family').val(data.data.dataset.family);
            $('#caliber_description').val(data.data.dataset.description);
            $('#caliber_stdtime').val(data.data.dataset.standard_hrs);
            $('#caliber_id').val(data.data.dataset.id);
        });
    });

    $(".col-container").on('click','.btn-caliber-enable',function(e){
        caliber_id      = $(this).parent().attr('data-id');
        caliber_name    = $(this).parent().children('.detail').children('.name').html();

        var href            = 'api.caliber.php';
        var agree           = confirm('Are you sure you want set this '+caliber_name+' to Active ?');
        if(!agree){ return false; }

        $.ajax({
            url         :api_caliber,
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
            console.log(data);
            caliberList('');
        });
    });

    $(".col-container").on('click','.btn-route-enable',function(e){
        route_id        = $(this).parent().attr('data-id');
        route_name      = $(this).parent().children('.detail').children('.name').html();

        var agree       = confirm('Are you sure you want set '+route_name+' to primary route in '+caliber_name+' ?');
        if(!agree){ return false; }

        $.ajax({
            url         :api_route,
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
            console.log(data);
            routeList(caliber_id);
        }).error();
    });
    $(".col-container").on('click','.btn-route-edit',function(e){
        route_id        = $(this).parent().attr('data-id');

        $.ajax({
            url         :api_route,
            cache       :false,
            dataType    :"json",
            type        :"GET",
            data:{
                calling         :'route',
                action          :'get',
                route_id        :route_id,
            },
            error: function (request, status, error) {
                console.log("Request Error");
            }
        }).done(function(data){
            console.log(data);

            $btnSubmitRoute.html('Save');
            $dialogRoute.fadeIn(300);
            $filterRoute.fadeIn(100);

            $('#route_id').val(data.data.dataset.id);
            $('#route_name').val(data.data.dataset.name);
            $('#route_description').val(data.data.dataset.description);
        }).error();
    });

    $(".col-container").on('click','.btn-operation-edit',function(e){
        operation_id = $(this).parent().attr('data-id');

        $.ajax({
            url         :api_operation,
            cache       :false,
            dataType    :"json",
            type        :"GET",
            data:{
                calling         :'operation',
                action          :'get',
                operation_id    :operation_id,
            },
            error: function (request, status, error) {
                console.log(request);
            }
        }).done(function(data){
            console.log(data);
            $btnSubmitOperation.html('Save');
            $dialogOperation.fadeIn(300);
            $filterOperation.fadeIn(100);

            $('#operation_id').val(data.data.dataset.id);
            $('#operation_name').val(data.data.dataset.name);
            $('#operation_description').val(data.data.dataset.description);
        }).error();
    });


	// Selection Queue items
	$(".col-container").on('click','.caliber-items',function(e){
		caliber_id    = $(this).attr('data-id');
        caliber_name  = $(this).children('.detail').children('.name').html();

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
            keyword     :keyword,
        },
        error: function (request, status, error) {
            console.log("Request Error");
        }
    }).done(function(data){

        console.log(data);

        $.each(data.data.items,function(k,v){

            nHtml +='<div class="box-items caliber-items" data-id="'+v.caliber_id+'">';
            nHtml +='<div class="detail">';
            nHtml +='<div class="name">'+v.caliber_code+' '+v.caliber_family+'</div>';
            nHtml +='<div class="info"><strong>Stdtime</strong> '+v.caliber_stdtime+' Hrs/K · <strong>Route</strong> '+v.route_name+'</div>';
            nHtml +='</div>';
            nHtml +='<div class="btn btn-caliber-edit">Edit</div>';
            if(v.caliber_status != 'active'){
                nHtml +='<div class="btn enable btn-caliber-enable">Enable</div>';
            }
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

        	nHtml +='<div class="box-items route-items" data-id="'+v.route_id+'">';
			nHtml +='<div class="detail">';
			nHtml +='<div class="name">'+v.route_name+'</div>';
			nHtml +='<div class="info"><strong>Operation</strong> '+v.route_total_operation+'</div>';
			nHtml +='</div>';
			nHtml +='<div class="btn btn-route-edit">Edit</div>';
            if(v.route_type != 'primary'){
                nHtml +='<div class="btn enable btn-route-enable">Primary</div>';
            }
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
				nHtml +='<div class="box-items operation-items -disable" data-id="'+v.operation_id+'">';
				nHtml +='<div class="detail"><div class="name">'+v.operation_name+'</div><div class="info">Operation ID '+v.operation_id+'</div></div>';
                nHtml +='<div class="btn btn-operation-edit">Edit</div>';
				nHtml +='<div class="btn enable btn-operation-matching">Add</div>';
				nHtml +='</div>';
			}else{
				nHtml +='<div class="box-items operation-items" data-id="'+v.operation_id+'">';
				nHtml +='<div class="detail"><div class="name">'+v.operation_sort+'. '+v.operation_name+' '+v.operation_match_id+'</div><div class="info">Operation ID '+v.operation_id+'</div></div>';
                nHtml +='<div class="btn btn-operation-edit">Edit</div>';
				nHtml +='<div class="btn btn-operation-unmatch">Remove</div>';
				nHtml +='</div>';	
			}
        });

        $('#operation_list').html(nHtml);
        nHtml = '';

    }).error();
}