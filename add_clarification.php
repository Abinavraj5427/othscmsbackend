<?php
    //CORS Headers
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: *");

    //HTTP inputs
    $rest_json = file_get_contents("php://input");
    $_POST = json_decode($rest_json, true);
    $username =  $_POST['team'];
    $question =  $_POST['question'];
    $problem = $_POST['problem'];


    //connecting to SQL Database
    $con = mysqli_connect("localhost", "root", "", "othscmsdb");

    if(isset($question)){
        //insert to database
        $sql = "INSERT INTO clarifications (team, question, problem) VALUES (\"$username\", \"$question\", \"$problem\")";
        $res = mysqli_query($con, $sql);
        echo "success";    
    die;
    }

    echo "failure";
    ?>