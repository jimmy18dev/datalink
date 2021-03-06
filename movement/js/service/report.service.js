function createHeaderReport(){
    var href        = 'api.report.php';

    var line_no     = $('#line_no').val();
    var line_type     = $('#line_type').val();
    var shift     = $('#shift').val();
    var no_monthly_emplys     = $('#no_monthly_emplys').val();
    var no_daily_emplys     = $('#no_daily_emplys').val();
    var ttl_monthly_hrs     = $('#ttl_monthly_hrs').val();
    var ttl_daily_hrs     = $('#ttl_daily_hrs').val();
    var ot_10     = $('#ot_10').val();
    var ot_15     = $('#ot_15').val();
    var ot_20     = $('#ot_20').val();
    var ot_30     = $('#ot_30').val();
    var losttime_vac     = $('#losttime_vac').val();
    var losttime_sick     = $('#losttime_sick').val();
    var losttime_abs     = $('#losttime_abs').val();
    var losttime_mat     = $('#losttime_mat').val();
    var losttime_other     = $('#losttime_other').val();
    var downtime_mc     = $('#downtime_mc').val();
    var downtime_mat     = $('#downtime_mat').val();
    var downtime_fac     = $('#downtime_fac').val();
    var downtime_other     = $('#downtime_other').val();
    var sort_local     = $('#sort_local').val();
    var sort_oversea     = $('#sort_oversea').val();
    var rework_local     = $('#rework_local').val();
    var rework_oversea     = $('#rework_oversea').val();
    var target_yield     = $('#target_yield').val();
    var target_eff     = $('#target_eff').val();
    var remark     = $('#remark').val();
    var d = $('#r_date').val();
    var m = $('#r_month').val();
    var y = $('#r_year').val();
    var report_date = y+'-'+m+'-'+d;

    $('#loading-box').fadeIn(300);

    $.ajax({
        url         :href,
        cache       :false,
        dataType    :"json",
        type        :"POST",
        data:{
            calling             :'report',
            action              :'create_header',
            line_no:line_no,
            line_type:line_type,
            shift:shift,
            report_date:report_date,
            no_monthly_emplys:no_monthly_emplys,
            no_daily_emplys:no_daily_emplys,
            ttl_monthly_hrs:ttl_monthly_hrs,
            ttl_daily_hrs:ttl_daily_hrs,
            ot_10:ot_10,
            ot_15:ot_15,
            ot_20:ot_20,
            ot_30:ot_30,
            losttime_vac:losttime_vac,
            losttime_sick:losttime_sick,
            losttime_abs:losttime_abs,
            losttime_mat:losttime_mat,
            losttime_other:losttime_other,
            downtime_mc:downtime_mc,
            downtime_mat:downtime_mat,
            downtime_fac:downtime_fac,
            downtime_other:downtime_other,
            sort_local:sort_local,
            sort_oversea:sort_oversea,
            rework_local:rework_local,
            rework_oversea:rework_oversea,
            target_yield:target_yield,
            target_eff:target_eff,
            remark:remark,
        },
        error: function (request, status, error) {
            console.log("Request Error");
        }
    }).done(function(data){
        console.log('Return: '+data.message);

        if(data.return != 0){
            window.location = 'report_detail_editor_choose_caliber.php?header='+data.return;
        }else{
            $('#loading-box').fadeOut(300);
            alert('แก้ข้อผิดพลาด!');
        }
    }).error();
}

// Update user information
function editHeaderReport(id){
    var href        = 'api.report.php';

    var line_no     = $('#line_no').val();
    var line_type     = $('#line_type').val();
    var shift     = $('#shift').val();
    var no_monthly_emplys     = $('#no_monthly_emplys').val();
    var no_daily_emplys     = $('#no_daily_emplys').val();
    var ttl_monthly_hrs     = $('#ttl_monthly_hrs').val();
    var ttl_daily_hrs     = $('#ttl_daily_hrs').val();
    var ot_10     = $('#ot_10').val();
    var ot_15     = $('#ot_15').val();
    var ot_20     = $('#ot_20').val();
    var ot_30     = $('#ot_30').val();
    var losttime_vac     = $('#losttime_vac').val();
    var losttime_sick     = $('#losttime_sick').val();
    var losttime_abs     = $('#losttime_abs').val();
    var losttime_mat     = $('#losttime_mat').val();
    var losttime_other     = $('#losttime_other').val();
    var downtime_mc     = $('#downtime_mc').val();
    var downtime_mat     = $('#downtime_mat').val();
    var downtime_fac     = $('#downtime_fac').val();
    var downtime_other     = $('#downtime_other').val();
    var sort_local     = $('#sort_local').val();
    var sort_oversea     = $('#sort_oversea').val();
    var rework_local     = $('#rework_local').val();
    var rework_oversea     = $('#rework_oversea').val();
    var target_yield     = $('#target_yield').val();
    var target_eff     = $('#target_eff').val();
    var remark     = $('#remark').val();
    var d = $('#r_date').val();
    var m = $('#r_month').val();
    var y = $('#r_year').val();
    var report_date = y+'-'+m+'-'+d;

    $('#loading-box').fadeIn(300);

    $.ajax({
        url         :href,
        cache       :false,
        dataType    :"json",
        type        :"POST",
        data:{
            calling             :'report',
            action              :'edit_header',
            header_id:id,
            line_no:line_no,
            line_type:line_type,
            shift:shift,
            report_date:report_date,
            no_monthly_emplys:no_monthly_emplys,
            no_daily_emplys:no_daily_emplys,
            ttl_monthly_hrs:ttl_monthly_hrs,
            ttl_daily_hrs:ttl_daily_hrs,
            ot_10:ot_10,
            ot_15:ot_15,
            ot_20:ot_20,
            ot_30:ot_30,
            losttime_vac:losttime_vac,
            losttime_sick:losttime_sick,
            losttime_abs:losttime_abs,
            losttime_mat:losttime_mat,
            losttime_other:losttime_other,
            downtime_mc:downtime_mc,
            downtime_mat:downtime_mat,
            downtime_fac:downtime_fac,
            downtime_other:downtime_other,
            sort_local:sort_local,
            sort_oversea:sort_oversea,
            rework_local:rework_local,
            rework_oversea:rework_oversea,
            target_yield:target_yield,
            target_eff:target_eff,
            remark:remark,
        },
        error: function (request, status, error) {
            console.log("Request Error");
        }
    }).done(function(data){
        console.log('Return: '+data.message);
        window.location = 'report_detail.php?header='+id+'&callback=edit_success';
    }).error();
}

function deleteHeadReport(header_id,report_id,caliber_code){
    var href        = 'api.report.php';

    if(!confirm('Are you sure to delete '+caliber_code+' ?')){
        return false;
    }

    $('#loading-box').fadeIn(300);

    $.ajax({
        url         :href,
        cache       :false,
        dataType    :"json",
        type        :"POST",
        data:{
            calling             :'report',
            action              :'delete_report_detail',
            header_id:header_id,
            report_id:report_id,
        },
        error: function (request, status, error) {
            console.log("Request Error");
        }
    }).done(function(data){
        console.log('Return: '+data.message);

        setTimeout(function(){
            window.location = 'report_detail.php?header='+header_id;
        },1000);

    }).error();
}

// Update user information
function deleteHeaderReport(header_id,shift,date,line){
    var href        = 'api.report.php';

    if(!confirm('Are you sure to delete report '+ date+' (line no.'+line+', shift '+shift+') ?')){
        return false;
    }

    $('#loading-box').fadeIn(300);

    $.ajax({
        url         :href,
        cache       :false,
        dataType    :"json",
        type        :"POST",
        data:{
            calling             :'report',
            action              :'delete_header_report',
            header_id:header_id,
            shift:shift,
        },
        error: function (request, status, error) {
            console.log("Request Error");
        }
    }).done(function(data){
        console.log('Return: '+data.message);
        window.location = 'index.php?callback=delete_success';
    }).error();
}

function getGraph(shift){
    // URL API
    var href = 'api.report.php';

    var year = $('#year').val();
    var month = $('#month').val();
    var line = $('#line').val();

    $.ajax({
        url         :href,
        cache       :false,
        dataType    :"json",
        type        :"GET",
        data:{
            calling     :'report',
            action      :'getGraph',
            year        :year,
            month       :month,
            shift       :shift,
            line        :line,
        },
        error: function (request, status, error) {
            console.log("Request Error");
        }
    }).done(function(data){
        // Build the chart
        $('#container-'+shift).highcharts({
            title: {
                text: 'Shift '+data.data.shift+', Line '+data.data.line+', '+data.data.month+' '+data.data.year,
                x: -20 //center
            },
            xAxis: {
                categories: data.data.date,
            },
            yAxis: {
                title: {
                    text: '%'
                }
            },
            tooltip: {
                valueSuffix: '%'
            },
            series: [{
                name: 'Actual yield',
                data: data.data.actual_yield,
            }, {
                name: 'Taget output',
                data: data.data.target_output,
            }, {
                name: 'Actual output',
                data: data.data.actual_output,
            }, {
                name: 'Product EFF',
                data: data.data.product_eff,
            }, {
                name: 'Total EFF',
                data: data.data.total_eff,
            }]
        });
    }).error();
}

function addTurnTo(header_id){
    var href        = 'api.report.php';

    var output = $('#output').val();
    var caliber_id = $('#caliber_id').val();

    $.ajax({
        url         :href,
        cache       :false,
        dataType    :"json",
        type        :"POST",
        data:{
            calling             :'report',
            action              :'add_turn_to',
            header_id:header_id,
            caliber_id:caliber_id,
            output:output,
        },
        error: function (request, status, error) {
            console.log("Request Error");
        }
    }).done(function(data){
        console.log('Return: '+data.message);
        window.location = 'report_detail.php?header='+header_id;
    }).error();
}

function deleteTurnTo(id){
    var href        = 'api.report.php';

    $.ajax({
        url         :href,
        cache       :false,
        dataType    :"json",
        type        :"POST",
        data:{
            calling             :'report',
            action              :'delete_turn_to',
            id:id,
        },
        error: function (request, status, error) {
            console.log("Request Error");
        }
    }).done(function(data){
        console.log('Return: '+data.message);
        $('#turn-in-'+id).fadeOut();
    }).error();
}