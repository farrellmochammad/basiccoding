<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../seleksikulina/database.php';
include_once '../seleksikulina/user_review.php';

function deleteDB(){
  $database = new Database();
  $db = $database->getConnection();

  $userreview = new User($db);

  $data = json_decode(file_get_contents("php://input"));
  $userreview->id = $data->id;

  if($userreview->delete()){
    echo '{';
        echo '"pesan": "Review berhasil di delete"';
    echo '}';
  } else{
    echo '{';
        echo '"pesan": "delete review gagal"';
    echo '}';
  }
}
 ?>
