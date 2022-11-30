<?php

namespace Bcs;

use Contao\Database;

class Handler
{
    protected static $arrUserOptions = array();

    public function onProcessForm($submittedData, $formData, $files, $labels, $form)
    {
        
        // if this form has a CC list associated with it
        if($formData['cci_list'] != '') {
            
            echo "CC Form: " . $formData['cci_list'];
            die();
        }
        
    }
    
}
