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
            
            $has_params = 0;
            $has_permission = 0;
            
            // set up our Constant Contact parameters
            $params = [];
            $params['list_memberships'] = array($formData['cci_list']);
            
            // loop through all this forms fields
            $result = Database::getInstance()->prepare("SELECT * FROM tl_form_field WHERE pid='". $formData['id'] ."'")->execute();
            while($result->next())
            {
                // if this form field has a Constant Contact field linked
                if($result->cci_linked_field != '') {
                    // set the linked field to the parameters we are going to pass to Constant Contact
                    $params[$result->cci_linked_field] = $submittedData[$result->name];
                    $has_params = 1;
                }
                
                // if this form has a checkbox with cci_express_permission checked
                if($result->type == 'checkbox' && $result->cci_express_permission == 1) {
                     // if this form field is actually checked
                     if($submittedData[$result->name] != "")
                        $has_permission = 1;
                }
                // if this form has implied permission checked
                if($formData['cci_implied'] == 'yes') {
                    $has_permission = 1;
                }
                   
            }
            
            if($has_params != 0 && $has_permission != 0) {
                
                // Grab our stored tokens from the text files
                $token_access = file_get_contents('token_access.txt');
                $token_refresh = file_get_contents('token_refresh.txt');
                
                // Constant Contact API values
                $redirectURI = '';
                $apiKey = '';
                $secret = '';
                
                
                // get our CCI info from the db
                $cci_db = Database::getInstance()->prepare("SELECT * FROM tl_module")->execute();
                while($cci_db->next())
                {
                    // if this form field has a Constant Contact field linked
                    if($cci_db->type == 'constant_contact_authorize') {
                        $redirectURI = $cci_db->cci_url;
                        $apiKey = $cci_db->cci_key;
                        $secret = $cci_db->cci_secret;
                    }
                }

                // establish our connection
                $client = new \PHPFUI\ConstantContact\Client($apiKey, $secret, $redirectURI);
                $client->accessToken = $token_access;
                $client->refreshToken = $token_refresh;
                
                // Create a Contact object using the details from above
                $contact = new \PHPFUI\ConstantContact\Definition\ContactCreateOrUpdateInput($params);
                
                // Attempt to "signup" this new Contact
                $signup = new \PHPFUI\ConstantContact\V3\Contacts\SignUpForm($client);
                $response = $signup->post($contact);
                
                echo "Response: " . print_r($response);
                die();
            }

        }
        
    }
    
}
