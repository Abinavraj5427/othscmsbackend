<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: *");
    $rest_json = file_get_contents("php://input");
    $_POST = json_decode($rest_json, true);
    $username =  $_POST['username'];
    $password = $_POST['password'];
    $con = mysqli_connect("localhost", "root", "", "othscmsdb");
    $sql = "SELECT * FROM users WHERE username=\"$username\"";
    $res = mysqli_query($con, $sql);
    $p = '';
    if(mysqli_num_rows($res)>0){
      while($row = mysqli_fetch_assoc($res)){
        $p = $row['password'];
      }
    }else{
      echo 'failure';
      exit;
    }

    if($password == $p)
        echo 'success';
    else
        echo 'failure';
?>
