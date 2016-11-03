function dailyreport_to_pdf(report_id){
    var href = 'header_report_detail_to_pdf.php';

    $.ajax({
        url         :href,
        cache       :false,
        dataType    :"json",
        type        :"POST",
        data:{
            report_id :report_id,
        },
        error: function (request, status, error) {
            console.log("Request Error");
        }
    }).done(function(data){
        console.log('Return: '+data.message);
        $('#btn-pdf-export').fadeIn();
    }).error();
}

function getGraph(shift){

    var href        = 'api.report.php';
    var year        = $('#year').val();
    var month       = $('#month').val();
    var line        = $('#line').val();

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