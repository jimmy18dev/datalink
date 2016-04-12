function listDistrict(){
	var href = 'api.location.php';
	var html = '';
	var amphur_id = $('#amphur').val();

	console.log('district function process();');

	if(amphur_id == '' || amphur_id == 0){
		$('#district').html('');
		$('#district').append($('<option>', {value: 0,text : 'กรุณาเลือกอำเภอ' }));
		$('#district').prop('disabled','disabled');

		return false;
	}else{
		$('#district').prop('disabled',false);
	}

	console.log('amphur: '+amphur_id);
	
	$.ajax({
        url         :href,
        cache       :false,
        dataType    :"json",
        type        :"GET",
        data:{
            calling             :'location',
            action              :'list_district',
            amphur_id: amphur_id,
        },
        error: function (request, status, error) {
            console.log("Request Error");
        }
	}).done(function(data){

		$('#district').html('');
		$('#district').append($('<option>', {value: 0,text : 'เลือกตำบล' }));
		
		$.each(data.data.items,function(k,v){
			$('#district').append($('<option>', {
				value: v.id,
				text : v.title,
			}));
		});
	}).error();
}