<?php
    //CORS Headers
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: *");
    //HTTP inputs
    $rest_json = file_get_contents("php://input");
    $_POST = json_decode($rest_json, true);
    $seconds = $_POST['seconds'];

    $con = mysqli_connect("localhost", "root", "", "othscmsdb");
    $sql = "SELECT * from timer";
    $res = mysqli_query($con, $sql);
    $time=$seconds;
    if(mysqli_num_rows($res)>0){
        while($row = mysqli_fetch_assoc($res)){
          $time+=$row['timer'];
        }
    }
    $sql =
    "UPDATE timer
    SET timer = $time
    ";

    $res = mysqli_query($con, $sql);
    $sql =
    "UPDATE timer
    SET paused = 0
    ";

    $res = mysqli_query($con, $sql);
    echo "SUCCESS";
?>
