<?php
    //CORS Headers
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: *");

    //HTTP inputs
    $rest_json = file_get_contents("php://input");
    $_POST = json_decode($rest_json, true);

    $team = $_POST['team'];

    //connecting to SQL Database
    $con = mysqli_connect("localhost", "root", "", "othscmsdb");

    //looking for matching username
    $sql = "SELECT * FROM submissions where user = \"$team\"";
    $res = mysqli_query($con, $sql);


    $rows = [];
    //checking if password is correct
    if(mysqli_num_rows($res)>0){
      while($row = mysqli_fetch_assoc($res)){
        array_push($rows, $row);
      }
    }

    echo json_encode($rows);
?>
