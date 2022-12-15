    
    // Pass our $_GET values to the authorize script to establish the connection to the Constant Contact Oauth2 API
    function finalizeConnection(code, state){
        $.ajax({
            url: '/system/modules/constant_contact_integration/assets/php/action.api.authorize.php',
            type: 'GET',
            data:{ code: code, state: state},
            success:function(result){
                $(".message").html(result);
            },
            error:function(result){
                $(".message").html("There was an issue trying to establish the connection to the Constant Contact Oauth2 API");
            }
        });
        
    }
