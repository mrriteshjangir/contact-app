var count1=2;

$("#addMobile").click(function(){

    if(count1<6)
    {
        var html='';

        html+='<div id="mobileBox" class="mb-3">';
        html+='<label class="form-label">Other Mobile address</label>';
        html+='<div class="input-group">';
        html+='<input type="tel" name="userMobile[]" class="form-control" placeholder="xxxxxxxxxx">';
        html+='<button class="btn btn-danger" type="button" id="removeMobile">-</button>';
        html+=' </div>';
        html+=' </div>';

        $('#mobileAll').append(html);

        count1++;
    }
    else
    {
        swal('Limit over.Max input fields allowed are 5');
    }
            
});

$(document).on('click','#removeMobile',function(){
    $(this).closest('#mobileBox').remove();
    count1--;
});