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
            
            // Stores details about our contact
            $params = [];
            $params['email_address'] = 'mark@brightcloudstudio.com';
            $params['list_memberships'] = array($formData['cci_list']);

            // Create a Contact object using the details from above
            $contact = new \PHPFUI\ConstantContact\Definition\ContactCreateOrUpdateInput($params);
            
            // Attempt to "signup" this new Contact
            $signup = new \PHPFUI\ConstantContact\V3\Contacts\SignUpForm($client);
            $response = $signup->post($contact);
            
            // View our response
            echo "Signup:<br>" . var_dump($response) . "<br>";
            
            die();
        }
        
    }
    
}
