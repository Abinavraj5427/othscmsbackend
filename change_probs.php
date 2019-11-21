<?php
    //CORS Headers
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: *");

    //HTTP inputs
    $rest_json = file_get_contents("php://input");
    $_POST = json_decode($rest_json, true);
    $problem =  $_POST['problem'];
    $append = $_POST['append'];

    //connecting to SQL Database
    $con = mysqli_connect("localhost", "root", "", "othscmsdb");


    if($append){
        
        //looking for matching ptoblem
        $sql = "INSERT INTO problems (problem) VALUES (\"$problem\")";
        $res = mysqli_query($con, $sql);

        echo "success";
        die;
    }
    else{
        //looking for matching problem
        $sql = "DELETE FROM problems WHERE problem = \"$problem\"";
        $res = mysqli_query($con, $sql);

        echo "success";
        die;
    }

    echo "failure";
    ?>