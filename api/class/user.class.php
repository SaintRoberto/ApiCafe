<?php


class user{   

     private $db = '';
     private $bd_blog = '';
     private $id = '';
     private $usuario = '';
     private $contrasena = '';
     private $estado = '';
     private $fecha = '';
     
     function __construct(){
          include 'conexion.php';
          $dba = parse_ini_file(realpath(".")  . "/api/config/config.ini", true);
         // var_dump($dba);
         $this->db =  connect($dba);
    }

     public function get_data_id($id){
     
          $sql = $dbConn->prepare("SELECT * FROM posts where id=:id");
          $sql->bindValue(':id', $id);
          $sql->execute();
     
          //header("HTTP/1.1 200 OK");
           echo json_encode(  $sql->fetch(PDO::FETCH_ASSOC)  );
     }
     
     public function get_all(){

          $sql = $this->db->prepare("SELECT * FROM users");
          $sql->execute();
          //header("HTTP/1.1 200 OK");
          return json_encode(  $sql->fetch(PDO::FETCH_ASSOC)  );

     }
     
     public function delete($id){

          $sql = $dbConn->prepare("SELECT * FROM users");
          $sql->execute();
          //header("HTTP/1.1 200 OK");
           echo json_encode(  $sql->fetch(PDO::FETCH_ASSOC)  );
      }
     
      public function update($id){
          $sql = $dbConn->prepare("SELECT * FROM posts");
          $sql->execute();
          //header("HTTP/1.1 200 OK");
           echo json_encode(  $sql->fetch(PDO::FETCH_ASSOC)  );
      }


}



?>