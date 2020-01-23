<?php
    //CORS Headers
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: *");

    //HTTP inputs
    $rest_json = file_get_contents("php://input");
    $_POST = json_decode($rest_json, true);
    $con = mysqli_connect("localhost", "root", "", "othscmsdb");
    $id =  $_POST['id'];
    $member = $_POST['member'];
    $score = $_POST['score'];

    if($member == 1){
        //update school
        $sql = "UPDATE teams SET score1 = $score where id = $id";
        $res = mysqli_query($con, $sql);
    }
    if($member == 2){
        //update school
        $sql = "UPDATE teams SET score2 = $score where id = $id";
        $res = mysqli_query($con, $sql);
    }
    if($member == 3){
        //update school
        $sql = "UPDATE teams SET score3 = $score where id = $id";
        $res = mysqli_query($con, $sql);
    }

    echo "success";
    
    ?>