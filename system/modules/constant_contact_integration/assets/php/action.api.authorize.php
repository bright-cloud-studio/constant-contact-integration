<?php
    
    // Start PHP session and include Composer, which also brings in our Google Sheets PHP stuffs
	session_start();
	require_once $_SERVER['DOCUMENT_ROOT'] . '/../vendor/autoload.php';
    
    $client->acquireAccessToken($_GET);

    $file_handle = fopen($_SERVER['DOCUMENT_ROOT'] . '/token_access.txt', 'w');
    fwrite($file_handle, $client->accessToken);

    $file_handle = fopen($_SERVER['DOCUMENT_ROOT'] . '/token_refresh.txt', 'w');
    fwrite($file_handle, $client->refreshToken);
