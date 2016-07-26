$(document).ready(function(){
    var header_id       = $('#header_id').val();
    var action          = $('#action').val();
    var caliber_name    = $('#caliber_name').val();

    $('#ReportDetail').ajaxForm({
        beforeSubmit: function(){
            console.log('Process: BeforeSubmit...');
            $('#loading-box').fadeIn(300);
            $('#btn-icon').html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i>');

            if(action == 'edit')
                $('#btn-caption').html('Updating');
            else
                $('#btn-caption').html('Creating');
        },
        uploadProgress: function(event,position,total,percentComplete) {
            var percent = percentComplete;
        },
        success: function() {
            console.log('Upload Successed and Waiting...');
        },
        complete: function(xhr) {
            console.log('Complete!');
            // location.reload();
            console.log(xhr.responseText);

            setTimeout(function(){
                window.location = 'report_detail.php?header='+header_id+'#'+caliber_name;
            },1000);
        }
    });
});

function calOperation(id){
    console.log(id);

    // Getting
    var input = $('#input-'+id).val();
    var good = $('#good-'+id).val();
    var reject = $('#reject-'+id).val();

    if(input == '') input = 0;
    if(good == '') good = 0;
    if(reject == '') reject = 0;

    reject = input - good;

    // Setting
    $('#input-'+id).val(input);
    $('#good-'+id).val(good);
    $('#reject-'+id).val(reject);

    if(reject > 0)
        $('#reject-'+id).addClass('-red');
    else
        $('#reject-'+id).removeClass('-red');
}

function ImageFileCheck(){
    $caption = $('#photo-input-caption');
    var max_filesize = $('#max_filesize').val();
    $file = $('#photo_files');

    if(window.File && window.FileReader && window.FileList && window.Blob){
        if(!$file.val()){
            $('#transfer_photo_icon').removeClass('check-active');
            // $caption.html('ขอภาพใบสลิปด้วยค่ะ!').addClass('input-caption-alert');
            return false;
        }
        else{
            var fsize = $file[0].files[0].size; // get file size
            var ftype = $file[0].files[0].type; // get file type

            if(ftype == "")
                ftype = $file.val().substr(($file.val().lastIndexOf('.') + 1));

            switch(ftype){
                case 'image/png': case 'image/gif': case 'image/jpeg': case 'image/pjpeg': case 'image/jpg': case 'png': case 'jpg': case 'jpeg':
                    break;
                default:
                    $caption.html('เลือกไฟล์รูปภาพเท่านั้น!'+ftype).addClass('input-caption-alert');
                    $('#transfer_photo_icon').removeClass('check-active');
                    return false
            }

            // Allowed file size is less than 15 MB (15728640)
            if(fsize > max_filesize){
                $caption.html('ไฟล์ใหญ่เกิน '+ (max_filesize/1048576) +' MB!').addClass('input-caption-alert');
                $('#transfer_photo_icon').removeClass('check-active');
                return false
            }

            $caption.html('เลือกภาพแล้ว').removeClass('input-caption-alert');
            $('#transfer_photo_icon').addClass('check-active');
            return true;
        }
    }
    else{
        // Output error to older unsupported browsers that doesn't support HTML5 File API
        $caption.html('Browser ไม่รอบรับการทำงานนี้!').addClass('input-caption-alert');
        $('#transfer_photo_icon').removeClass('check-active');
        return false;
    }
}


function TotalValidation(){
    var $total = $('#transfer_total').val();
    var $payments = $('#all-payments').val();

    if($total == ""){
        $('#transfer_total_icon').removeClass('check-active');
        return false;
    }
    else{
        if($total < $payments){
            $('#transfer_total_icon').removeClass('check-active');
            return false;
        }
        else{
            $('#transfer_total_icon').addClass('check-active');
            return true;
        }
    }
}
function BankValidation(){
    var $bank = $('#transfer_bank').val();

    if($bank > 0){
        $('#transfer_bank_icon').addClass('check-active');
        return true;
    }
    else{
        $('#transfer_bank_icon').removeClass('check-active');
        return false;
    }
}

function NameValidation(){
    var $name = $('#transfer_realname').val();

    if($name == ""){
        $('#transfer_name_icon').removeClass('check-active');
        return false;
    }
    else{
        $('#transfer_name_icon').addClass('check-active');
        return true;
    }
}
function AddressValidation(){
    var $address = $('#transfer_address').val();

    if($address == ""){
        $('#transfer_address_icon').removeClass('check-active');
        return false;
    }
    else{
        $('#transfer_address_icon').addClass('check-active');
        return true;
    }
}
function PhoneValidation(){
    var $phone = $('#transfer_phone').val();

    if($phone == ""){
        $('#transfer_phone_icon').removeClass('check-active');
        return false;
    }
    else{
        $('#transfer_phone_icon').addClass('check-active');
        return true;
    }
}