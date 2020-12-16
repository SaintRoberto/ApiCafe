<?php

   // require_once('config.php');
    $ini_array = parse_ini_file("config/config.ini");
    if (empty($ini_array['site_url']))
    {
        $site_url = 'defaultvalue';
    }
    else
    {
        $site_url = $ini_array['site_url'];
    }

    //          HTTP protocol + Server address(localhost or example.com) + requested uri (/route or /route/home)
    $current_url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    
    //Current URL = http://localhost/route/somenthing
    //Site URL - http://localhost/route

    //Requested page = Current URL - Site URL
    //Requested page = something
    $request = str_replace($site_url, '', $current_url);


    //Replacing extra back slash at the end
    $request = str_replace('/', '', $request);

    //Converting the request to lowercase
    $request = strtolower($request);

?>