<?php
  //CORS Headers
  header("Access-Control-Allow-Origin: *");
  header("Access-Control-Allow-Headers: *");

  //HTTP inputs
  $rest_json = file_get_contents("php://input");
  $_POST = json_decode($rest_json, true);
  //connecting to SQL Database
  $con = mysqli_connect("localhost", "root", "", "othscmsdb");

  //looking for matching username
  $sql = "SELECT * FROM teams";
  $res = mysqli_query($con, $sql);
  if(mysqli_num_rows($res)>0){
    while($row = mysqli_fetch_assoc($res)){
      echo json_encode($row)."/";
    }
  }
?>
