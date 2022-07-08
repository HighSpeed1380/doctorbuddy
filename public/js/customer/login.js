var loadingIcon ='<div class="sk-spinner sk-spinner-three-bounce pull-center"><div class="sk-bounce1"></div><div class="sk-bounce2"></div><div class="sk-bounce3"></div></div>';

function login()
{    
    if (!validator.checkAll($('form'))) {   
            return false;
        }else{
            
            $("header").attr('tabindex',-1);
            $("header").focus(); 
            
            $("#message").attr('class','');  
            $("#message-text").html(loadingIcon);
             
            
            $('button').prop('disabled', true);
            $.ajax({
            type: "POST",    
            data: $("#loginform").serialize(),
            dataType: "json",
            url :SITE_URL+"/customer/login",       
            success : function(response) { 
                if(response.error == 1){
                    $("#message-text").html(response.err_msg);
                    $("#message").addClass('alert alert-danger');              
                    $('button').prop('disabled', false);
                }else{
                    if(!REDIRECT)
                        window.location.href= SITE_URL+"/customer/dashboard";
                    else
                        window.location.href= SITE_URL+"/customer/"+REDIRECT;
                }

            },
            error : function(){
                $('button').prop('disabled', false);

                $("#message-text").html('<i class="fa-fw fa fa-times"></i><strong>Error!</strong> Something went wrong, please try again.');
                $("#message-text").show();
            },
            });  

    }
}
function resend_verify(custid){
     $.ajax({
            type: "POST",    
//            data: $("#loginform").serialize(),
            dataType: "json",
            url :SITE_URL+"/customer/verifyresend/"+custid,       
            success : function(response) { 
                if(response.error == 1){
                    $("#message-text").html(response.err_msg);
                    $("#message-text").removeClass('hide'); 
                    $("#message-text").addClass('show');              
                    $('button').prop('disabled', false);
                }else{
                    $('#message-text').show(); 
                    $("#message-text").removeClass('hide error-alert');
                    $("#message-text").addClass('success-alert');
                    $('#message-text').html('Email verification link send to your email');   
                    return false;
                }

            },
            error : function(){
                $('button').prop('disabled', false);

                $("#message-text").html('<i class="fa-fw fa fa-times"></i><strong>Error!</strong> Something went wrong, please try again.');
                $("#message-text").show();
            },
            });  
    
}