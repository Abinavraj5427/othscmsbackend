<?php
    //CORS Headers
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: *");

    //HTTP inputs
    $rest_json = file_get_contents("php://input");
    $_POST = json_decode($rest_json, true);
    $id = $_POST['id'];


    //connecting to SQL Database
    $con = mysqli_connect("localhost", "root", "", "othscmsdb");

    $sql = "DELETE FROM clarifications WHERE id = \"$id\"";
    $res = mysqli_query($con, $sql);

    echo "success";
    die;

    //echo "failure";
    ?>