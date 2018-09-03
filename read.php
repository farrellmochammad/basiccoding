<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// include database and object files
include_once '../seleksikulina/database.php';
include_once '../seleksikulina/user_review.php';

function readDB(){
   $database = new Database();
   $db = $database->getConnection();

  $userreview = new User($db);

  $stmt = $userreview->read();
  $num = $stmt->rowCount();

  if ($num>0){

    $userreview_arr = array();
    $userreview_arr["user_review"]=array();

    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
      extract($row);
      $userreview_item = array(
        "id" => $id,
        "order_id" => $order_id,
        "product_id" => $product_id,
        "user_id" => $user_id,
        "rating" => $rating,
        "review" => $review
      );
      array_push($userreview_arr["user_review"], $userreview_item);
    }

    echo json_encode($userreview_arr);
  }
  else {
    echo json_encode(
      array("Belum" => "ada")
    );
  }
}
?>
