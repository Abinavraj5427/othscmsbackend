<?php
    //CORS Headers
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: *");

    //HTTP inputs
    $rest_json = file_get_contents("php://input");
    $_POST = json_decode($rest_json, true);

    $file = $_POST['file'];
    $problem = $_POST['problem'];
    $team = $_POST['team'];

    //connecting to SQL Database
    $con = mysqli_connect("localhost", "root", "", "othscmsdb");

    //looking for matching username
    $sql = "INSERT INTO submissions (team, problem, file) VALUES ($team, $problem, $file)";
    $res = mysqli_query($con, $sql);

    
    
?>
