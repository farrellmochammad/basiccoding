<?php
class User{

    // database connection and table name
    private $conn;
    private $table_name = "user_review";

    // object properties
    public $id;
    public $order_id;
    public $product_id;
    public $user_id;
    public $rating;
    public $review;
    public $review_at;
    public $updated_at;

    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    function read(){
      $query = " SELECT * FROM user_review ";
      $stmt = $this->conn->prepare($query);
      $stmt->execute();
      return $stmt;
    }

    function create(){
      $query = "insert into user_review set order_id=:order_id, product_id=:product_id, user_id=:user_id, rating=:rating, review=:review";
      $stmt = $this->conn->prepare($query);

       $this->order_id=htmlspecialchars(strip_tags($this->order_id));
       $this->product_id=htmlspecialchars(strip_tags($this->product_id));
       $this->user_id=htmlspecialchars(strip_tags($this->user_id));
       $this->rating=htmlspecialchars(strip_tags($this->rating));
       $this->review=htmlspecialchars(strip_tags($this->review));

       // bind values
       $stmt->bindParam(":order_id", $this->order_id);
       $stmt->bindParam(":product_id", $this->product_id);
       $stmt->bindParam(":user_id", $this->user_id);
       $stmt->bindParam(":rating", $this->rating);
       $stmt->bindParam(":review", $this->review);

       if($this->rating>5 || $this->rating<0){
         return false;
         }else{
           if($stmt->execute()){
            return true;
            }

       }
    }

    function update(){
      $query = "update user_review set order_id=:order_id, product_id=:product_id, user_id=:user_id, rating=:rating, review=:review where id=:id";
      $stmt = $this->conn->prepare($query);

       $this->id=htmlspecialchars(strip_tags($this->id));
       $this->order_id=htmlspecialchars(strip_tags($this->order_id));
       $this->product_id=htmlspecialchars(strip_tags($this->product_id));
       $this->user_id=htmlspecialchars(strip_tags($this->user_id));
       $this->rating=htmlspecialchars(strip_tags($this->rating));
       $this->review=htmlspecialchars(strip_tags($this->review));

       // bind values
       $stmt->bindParam(":id",$this->id);
       $stmt->bindParam(":order_id", $this->order_id);
       $stmt->bindParam(":product_id", $this->product_id);
       $stmt->bindParam(":user_id", $this->user_id);
       $stmt->bindParam(":rating", $this->rating);
       $stmt->bindParam(":review", $this->review);

       if($this->rating>5 || $this->rating<0){
         return false;
       }else{
         if($stmt->execute()){
            return true;
         }else{
            return false;
         }
       }
    }

    function delete(){
      $query = "delete from user_review where id=:id";
      $stmt = $this->conn->prepare($query);
      $this->id=htmlspecialchars(strip_tags($this->id));
      $stmt->bindParam(":id",$this->id);
      if($stmt->execute()){
        return true;
      }
      return false;
    }
}
