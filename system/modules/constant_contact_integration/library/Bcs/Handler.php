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
            
            // Grab our stored tokens from the text files
            $token_access = file_get_contents('token_access.txt');
            $token_refresh = file_get_contents('token_refresh.txt');
            
            // Constant Contact API values
            $redirectURI = 'https://framework.brightcloudstudioserver.com/cci_auth.php';
            $apiKey = 'c58a64d0-f0b1-4ba0-a9c9-699d50d1df4c';
            $secret = 'VuMhHswFzPHsUe4YtV7VtA';
            
            // establish our connection
            $client = new \PHPFUI\ConstantContact\Client($apiKey, $secret, $redirectURI);
            $client->accessToken = $token_access;
            $client->refreshToken = $token_refresh;
            
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
                }
            }

            // Create a Contact object using the details from above
            $contact = new \PHPFUI\ConstantContact\Definition\ContactCreateOrUpdateInput($params);
            
            // Attempt to "signup" this new Contact
            $signup = new \PHPFUI\ConstantContact\V3\Contacts\SignUpForm($client);
            $response = $signup->post($contact);
        }
        
    }
    
}
