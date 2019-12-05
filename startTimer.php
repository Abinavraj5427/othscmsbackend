<?php
    //CORS Headers
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: *");

    //HTTP inputs
    $rest_json = file_get_contents("php://input");
    $_POST = json_decode($rest_json, true);
    $con = mysqli_connect("localhost", "root", "", "othscmsdb");
    $time = time()+7200;
    $sql =
    "UPDATE timer
    SET timer = $time";

    $res = mysqli_query($con, $sql);
    echo "SUCCESS";
?>
