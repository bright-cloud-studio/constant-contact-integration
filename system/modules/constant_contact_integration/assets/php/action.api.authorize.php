<?php

    // Start session and pull in Composer so we get access to the packages
	session_start();
	require_once $_SERVER['DOCUMENT_ROOT'] . '/../vendor/autoload.php';
	
	use Contao\Database;
    
    $redirectURI = '';
	$apiKey = '';
	$secret = '';
	
	// connect to the database and get our Key, Secret and Redirect URL
	// get our CCI info from the db
    $result = Database::getInstance()->prepare("SELECT * FROM tl_module")->execute();
    

	
	// create our client and pass 
	$client = new \PHPFUI\ConstantContact\Client($apiKey, $secret, $redirectURI);
    $client->acquireAccessToken($_GET);

    // save our keys to be used later on
    $file_handle = fopen($_SERVER['DOCUMENT_ROOT'] . '/token_access.txt', 'w');
    fwrite($file_handle, $client->accessToken);
    $file_handle = fopen($_SERVER['DOCUMENT_ROOT'] . '/token_refresh.txt', 'w');
    fwrite($file_handle, $client->refreshToken);
    
    // display our success message
    echo "You have successfully established a connection with the Constant Contact API";
