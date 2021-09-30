var count=2;

$("#addEmail").click(function(){

    if(count<6)
    {
        var html='';

        html+='<div id="emailBox" class="mb-3">';
        html+='<label class="form-label">Other Email address</label>';
        html+='<div class="input-group">';
        html+='<input type="email" name="userEmail[]" class="form-control" placeholder="name@example.com">';
        html+='<button class="btn btn-danger" type="button" id="removeEmail">-</button>';
        html+=' </div>';
        html+=' </div>';

        $('#emailAll').append(html);

        count++;
    }
    else
    {
        swal('Limit over.Max input fields allowed are 5');
    }
            
});

$(document).on('click','#removeEmail',function(){
    $(this).closest('#emailBox').remove();

    count--;
});