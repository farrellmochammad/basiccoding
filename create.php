<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../seleksikulina/database.php';
include_once '../seleksikulina/user_review.php';

function createDB(){
  $database = new Database();
  $db = $database->getConnection();

  $userreview = new User($db);

  $data = json_decode(file_get_contents("php://input"));
  $userreview->order_id = $data->order_id;
  $userreview->product_id = $data->product_id;
  $userreview->user_id = $data->user_id;
  $userreview->rating = $data->rating;
  $userreview->review = $data->review;

  if($userreview->create()){
    echo '{';
        echo '"pesan": "Review berhasil di create"';
    echo '}';
  } else{
    echo '{';
        echo '"pesan": "Create review gagal"';
    echo '}';
  }
}
 ?>
