    // this is the big bad booty daddy that will generate our Transactions on Google Sheets and mark our Work Assignment as Processed
    function finalizeConnection(datastring){

        alert("DING");
        
        // trigger this function when our form runs
        $.ajax({
            url: '/system/modules/gai_invoices/assets/php/action.api.authorize.php',
            type: 'GET',
            data: datastring,
            success:function(result){
                // redirect us to the success page
                $(".message").html("Success");
            },
            error:function(result){
                $(".message").html("Fail");
            }
        });
        
    }
