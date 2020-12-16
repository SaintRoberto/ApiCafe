<?php
//include_once "controllers/gis_mapa.php"
//require 'asstes/dispatch/dispatch.php'


# sample JSON end point

    require_once('route.php');

    function home(){
        echo 'This is home. Home template in HTML yaaaaaaa';
    }

    function array_de_coordenadas(){
      $array_struc = array( "coordenates" => array("John" => "14.2343232, 52.124342", 
      "Mary" => "15.2343232, 42.378742", 
      "Peter" => "34.2343232, 34.367842", 
      "Sally" => "65.2343232, 23.3345342" ));

      echo json_encode($array_struc);

    }

    function contact_us(){
        echo 'This is contact us page. Contact Us template in HTML.';
    }

    function page404(){
        die('Page not found. Please try some different url.');
    }

    //If url is http://localhost/route/home or user is at the maion page(http://localhost/route/)
    if($request == 'home' or $request == '')
        home();
    //If url is http://localhost/route/get_all
    else if($request == 'get_all')
        array_de_coordenadas();
    //If url is http://localhost/route/contact-us
    else if($request == 'contact-us')
        contact_us();
    //If user entered something else
    else
        page404();
?>


       

        
   
