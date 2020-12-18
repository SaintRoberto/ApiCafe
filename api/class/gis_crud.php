<?php

include 'conexion.php'

public function get_data_id($id){
     $sql = $dbConn->prepare("SELECT * FROM posts where id=:id");
     $sql->bindValue(':id', $id);
     $sql->execute();

     //header("HTTP/1.1 200 OK");
      echo json_encode(  $sql->fetch(PDO::FETCH_ASSOC)  );
}

public function get_all($id){
    $sql = $dbConn->prepare("SELECT * FROM posts");
    $sql->execute();
    //header("HTTP/1.1 200 OK");
     echo json_encode(  $sql->fetch(PDO::FETCH_ASSOC)  );
}


?>