<?php

/**
 * Bright Cloud Studio's Constant Contact Integration
 *
 * @copyright  2022-2023 Bright Cloud Studio
 * @package    bright-cloud-studio/constant-contact-integration
 * @license    GNU/LGPL
 * @filesource
 */

 
namespace Bcs\Backend;

use Contao\DataContainer;

class ConstantContactBackend extends \Backend
{
    
    public function optionsLists() {

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
        
        // get ours lists
        $listEndPoint = new \PHPFUI\ConstantContact\V3\ContactLists($client);
        $lists = $listEndPoint->get();
        
        // array to store our results until they are returned
        $arrLists = [];
        
        foreach($lists['lists'] as $entry){
            $arrLists[$entry['name']] = $entry['name'];
        }
        
        // sort the array alphabetically ascending
        asort($arrLists);
        
        // return our stored results
		return $arrLists;
	}
}
