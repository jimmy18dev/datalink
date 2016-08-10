function updateSetting(id){
    var href        = 'api.setting.php';
    var value = $('#value-'+id).val();

    $.ajax({
        url         :href,
        cache       :false,
        dataType    :"json",
        type        :"POST",
        data:{
            calling         :'setting',
            action          :'update_setting',
            id              :id,
            value           :value,
        },
        error: function (request, status, error) {
            console.log("Request Error");
        }
    }).done(function(data){
        console.log('Return: '+data.message);
        location.reload();
    }).error();
}