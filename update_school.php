<?php
    //CORS Headers
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: *");

    //HTTP inputs
    $rest_json = file_get_contents("php://input");
    $_POST = json_decode($rest_json, true);
    $con = mysqli_connect("localhost", "root", "", "othscmsdb");
    $team =  $_POST['team'];
    $school = $_POST['school'];

    if($school != ""){
        //update school
        $sql = "UPDATE teams SET school = \"$school\" where team = \"$team\"";
        $res = mysqli_query($con, $sql);
    }

    //update school
    $sql = "SELECT * from teams where team = \"$team\"";
    $res = mysqli_query($con, $sql);

    //checking if password is correct
    if(mysqli_num_rows($res)>0){
        while($row = mysqli_fetch_assoc($res)){
            echo $row['school'];
        }
      }
    
    die;

    ?>