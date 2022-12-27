<?php

namespace ConstantContactIntegration;

use Contao\System;
use Contao\Database;

class EventListener extends System
{
    public function refreshToken(): void
    {
        
        session_start();
        
        // get accessToken
        $token_access = file_get_contents('token_access.txt');
        // get refreshToken
        $token_refresh = file_get_contents('token_refresh.txt');

        // refresh our tokens
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
        
        $client = new \PHPFUI\ConstantContact\Client($apiKey, $secret, $redirectURI);
        $client->accessToken = $token_access;
        $client->refreshToken = $token_refresh;
        $client->refreshToken();
        
        // save refreshed tokens
        $file_handle = fopen('token_access.txt', 'w');
		fwrite($file_handle, $client->accessToken);
        $file_handle = fopen('token_refresh.txt', 'w');
		fwrite($file_handle, $client->refreshToken);
        
         // Log our success
        \Controller::log('CCI: Token refreshed - ' . $client->refreshToken . '.', __CLASS__ . '::' . __FUNCTION__, 'GENERAL');
        
    }
}
