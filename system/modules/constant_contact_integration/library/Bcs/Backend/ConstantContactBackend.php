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
    // Grab our Contact Lists from Constant Contact and display them as a select
    public function optionsLists() {

         // Grab our stored tokens from the text files
        $token_access = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/token_access.txt');
        $token_refresh = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/token_refresh.txt');
        
        // Constant Contact API values
        $redirectURI = '';
        $apiKey = '';
        $secret = '';
        
         // get our CCI info from the db
        $cci_db = \Database::getInstance()->prepare("SELECT * FROM tl_module")->execute();
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
        
        // get ours lists
        $listEndPoint = new \PHPFUI\ConstantContact\V3\ContactLists($client);
        $lists = $listEndPoint->get();

        
        // array to store our results until they are returned
        $arrLists = [];
        
        $arrLists[' '] = ' ';

        foreach($lists['lists'] as $entry){
            
            $arrLists[$entry['list_id']] = $entry['name'];
        }

        // sort the array alphabetically ascending
        asort($arrLists);
        
        // return our stored results
		return $arrLists;
	}
    
    // Display a select of Contact fields and select which on to link this form field to
    public function optionsFields() {
        return array(
            '' => '',
            'email_address' => 'email_address',
            'first_name' => 'first_name',
            'last_name' => 'last_name',
            'job_title' => 'job_title',
            'company_name' => 'company_name',
            'phone_number' => 'phone_number',
            'anniversary' => 'anniversary',
            'birthday_month' => 'birthday_month',
            'birthday_day' => 'birthday_day',
            'street' => 'street',
            'city' => 'city',
            'state' => 'state',
            'postal_code' => 'postal_code',
            'country' => 'country'
            // old format not supported by this "Create or Update Contact" call
            //'address_street' => 'address_street',
            //'address_city' => 'address_city',
            //'address_state' => 'address_state',
            //'address_postal_code' => 'address_postal_code',
            //'address_country' => 'address_country',
            //'anniversary' => 'anniversary',
            //'birthday_day' => 'birthday_day',
            //'birthday_month' => 'birthday_month',
            //'company_name' => 'company_name',
            //'email_address' => 'email_address',
            //'first_name' => 'first_name',
            //'job_title' => 'job_title',
            //'last_name' => 'last_name',
            //'phone_numbers_home' => 'phone_numbers_home',
            //'phone_numbers_work' => 'phone_numbers_work',
            //'phone_numbers_mobile' => 'phone_numbers_mobile',
            //'phone_numbers_other' => 'phone_numbers_other',
            //'phone_number' => 'phone_number'
        );
    }
}
