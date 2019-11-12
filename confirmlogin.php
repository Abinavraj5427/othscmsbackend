<?php
    //CORS Headers
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: *");

    //HTTP inputs
    $rest_json = file_get_contents("php://input");
    $_POST = json_decode($rest_json, true);
    $token = $_POST['authtoken'];


    //connecting to SQL Database
    $con = mysqli_connect("localhost", "root", "", "othscmsdb");

    //looking for matching username
    $sql = "SELECT * FROM users WHERE auth_token=\"$token\"";
    $res = mysqli_query($con, $sql);


    //checking if password is correct
    if(mysqli_num_rows($res)>0){
        while($row = mysqli_fetch_assoc($res)){
            $response = array('authenticated' => true, 'role' => $row['role']);
            echo json_encode($response);
            exit;
        }
    }

    $response = array('authenticated' => false);
    echo json_encode($response);

?>