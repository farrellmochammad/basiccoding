<?php

include_once '../seleksikulina/read.php';
include_once '../seleksikulina/create.php';
include_once '../seleksikulina/update.php';
include_once '../seleksikulina/delete.php';

  if ($_SERVER['REQUEST_METHOD'] == "GET"){
    readDB();
  } else if ($_SERVER['REQUEST_METHOD'] == "POST"){
    createDB();
  } else if ($_SERVER['REQUEST_METHOD'] == "PATCH"){
    updateDB();
  } else if ($_SERVER['REQUEST_METHOD'] == "DELETE"){
    deleteDB();
  } else {
    http_response_code(405);
  }
?>
