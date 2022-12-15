    // this is the big bad booty daddy that will generate our Transactions on Google Sheets and mark our Work Assignment as Processed
    function processWorkAssignment(id){

        // get every form field and add them to the ajax data line
        var datastring = $("#form_" + id).serialize();
        
        // trigger this function when our form runs
        $.ajax({
            url: '/system/modules/gai_invoices/assets/php/action.process.work.assignment.php',
            type: 'POST',
            data: datastring,
            success:function(result){
                // redirect us to the success page
                window.location.replace("https://www.globalassessmentsinc.com/payments/dashboard/process-work-assignments/process-work-assignments-success.html");
            },
            error:function(result){
                $(".message").html("There was an error using the AJAX call for processWorkAssignment");
            }
        });
        
    }
