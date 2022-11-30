<?php

namespace ConstantContactIntegration;

use Contao\System;

class EventListener extends System
{
    public function refreshToken(): void
    {
       
        // Testing the controller log
        \Controller::log('CCI: Attempting token refresh', __CLASS__ . '::' . __FUNCTION__, 'GENERAL');
        
        
        // get accessToken
        $token_access = file_get_contents('token_access.txt');
        
        // get refreshToken
        $token_refresh = file_get_contents('token_refresh.txt');
        
        
        
        
        // refresh our tokens
        $client = new \PHPFUI\ConstantContact\Client($apiKey, $secret, $redirectURI);
        $client->accessToken = $token_access;
        $client->refreshToken = $token_refresh;
        $client->refreshToken();3
        
        
        // save refreshed tokens
        $file_handle = fopen('token_access.txt', 'w');
		fwrite($file_handle, $client->accessToken);
        
        $file_handle = fopen('token_refresh.txt', 'w');
		fwrite($file_handle, $client->refreshToken);
        

         // Testing the controller log
        \Controller::log('CCI: Token refreshed - ' . $client->refreshToken . '.', __CLASS__ . '::' . __FUNCTION__, 'GENERAL');
        
    }
}
