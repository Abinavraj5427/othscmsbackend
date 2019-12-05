<?php
    //CORS Headers
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: *");

    //HTTP inputs
    $rest_json = file_get_contents("php://input");
    $_POST = json_decode($rest_json, true);

    $con = mysqli_connect("localhost", "root", "", "othscmsdb");
    $sql = "SELECT * from timer";
    $res = mysqli_query($con, $sql);
    if(mysqli_num_rows($res)>0){
        while($row = mysqli_fetch_assoc($res)){
            $response = $row['timer']-time();
            echo json_encode($response);
            exit;
        }
    }
    echo json_encode($response);
?>
