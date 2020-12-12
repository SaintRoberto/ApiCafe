<?php
//include_once "controllers/gis_mapa.php"
include_once "assets/dispatch.php"

# sample JSON end point
route('GET', '/books.json', function ($db, $config) {
  $list = loadAllBooks($db);
  $json = json_encode($list);
  return response($json, 200, ['content-type' => 'application/json']);
});

# html end point
route('GET', '/books/:id', function ($args, $db) {
  $book = loadBookById($db, $args['id']);
  $html = phtml(__DIR__.'/views/book', ['book' => $book]);
  return response($html);
});

# respond using a template
route('GET', '/about', page(__DIR__.'/views/about'));

# sample dependencies
$config = require __DIR__.'/config.php';
$db = createDBConnection($config['db']);

# arguments you pass here get forwarded to the route actions
dispatch($db, $config);


        $array_struc = array( "coordenates" => array("John" => "14.2343232, 52.124342", 
                                "Mary" => "15.2343232, 42.378742", 
                                "Peter" => "34.2343232, 34.367842", 
                                "Sally" => "65.2343232, 23.3345342" ));

         echo json_encode($array_struc);
        
   

?>