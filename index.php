<?php

include "api/class/user.class.php";
//include "utils.php";


//$dbConn =  connect($db);

/*
  listar todos los posts o solo uno
 */
if ($_SERVER['REQUEST_METHOD'] == 'GET')
{
    if (isset($_GET['id']))
    {
      //Mostrar un post
      $sql = $dbConn->prepare("SELECT * FROM posts where id=:id");
      $sql->bindValue(':id', $_GET['id']);
      $sql->execute();
      header("HTTP/1.1 200 OK");
      echo json_encode(  $sql->fetch(PDO::FETCH_ASSOC)  );
      exit();
	  }
    else {

            $users   = new user();
			$result = $users->get_all();

			echo json_encode(array("data"     => $result,
								   "noticias" => "listados con éxito"
							)
			);

      //Mostrar lista de post
    //   $sql = $dbConn->prepare("SELECT * FROM posts");
    //   $sql->execute();
    //   $sql->setFetchMode(PDO::FETCH_ASSOC);
    //   header("HTTP/1.1 200 OK");
    //   echo json_encode( $sql->fetchAll()  );
    //   exit();
	}
}

// Crear un nuevo post
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $input = $_POST;
    $sql = "INSERT INTO posts
          (title, status, content, user_id)
          VALUES
          (:title, :status, :content, :user_id)";
    $statement = $dbConn->prepare($sql);
    bindAllValues($statement, $input);
    $statement->execute();
    $postId = $dbConn->lastInsertId();
    if($postId)
    {
      $input['id'] = $postId;
      header("HTTP/1.1 200 OK");
      echo json_encode($input);
      exit();
	 }
}

//Borrar
if ($_SERVER['REQUEST_METHOD'] == 'DELETE')
{
	$id = $_GET['id'];
  $statement = $dbConn->prepare("DELETE FROM posts where id=:id");
  $statement->bindValue(':id', $id);
  $statement->execute();
	header("HTTP/1.1 200 OK");
	exit();
}

//Actualizar
if ($_SERVER['REQUEST_METHOD'] == 'PUT')
{
    $input = $_GET;
    $postId = $input['id'];
    $fields = getParams($input);

    $sql = "
          UPDATE posts
          SET $fields
          WHERE id='$postId'
           ";

    $statement = $dbConn->prepare($sql);
    bindAllValues($statement, $input);

    $statement->execute();
    header("HTTP/1.1 200 OK");
    exit();
}


//En caso de que ninguna de las opciones anteriores se haya ejecutado
header("HTTP/1.1 400 Bad Request");





# sample JSON end point

    // require_once('route.php');

    // function home(){
    //     echo 'This is home. Home template in HTML yaaaaaaa';
    // }

    // function array_de_coordenadas(){
    //   $array_struc = array( "coordenates" => array("John" => "14.2343232, 52.124342", 
    //   "Mary" => "15.2343232, 42.378742", 
    //   "Peter" => "34.2343232, 34.367842", 
    //   "Sally" => "65.2343232, 23.3345342" ));

    //   echo json_encode($array_struc);

    // }

    // function contact_us(){
    //     echo 'This is contact us page. Contact Us template in HTML.';
    // }

    // function page404(){
    //     die('Page not found. Please try some different url.');
    // }

    // //If url is http://localhost/route/home or user is at the maion page(http://localhost/route/)
    // if($request == 'home' or $request == '')
    //     home();
    // //If url is http://localhost/route/get_all
    // else if($request == 'get_all')
    //     array_de_coordenadas();
    // //If url is http://localhost/route/contact-us
    // else if($request == 'contact-us')
    //     contact_us();
    // //If user entered something else
    // else
    //     page404();
?>


       

        
   
