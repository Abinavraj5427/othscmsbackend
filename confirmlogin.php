<?php
    //CORS Headers
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: *");

    //HTTP inputs
    $rest_json = file_get_contents("php://input");
    $_POST = json_decode($rest_json, true);
    $username =  $_POST['username'];
    $password = $_POST['password'];

    //connecting to SQL Database
    $con = mysqli_connect("localhost", "root", "", "othscmsdb");

?>