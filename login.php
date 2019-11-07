<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: *");
    $rest_json = file_get_contents("php://input");
    $_POST = json_decode($rest_json, true);
    $username =  $_POST['username'];
    $password = $_POST['password'];
    if($username === 'admin' && $password == 'admin')
        echo 'success';
    else
        echo 'failure';  
?>
