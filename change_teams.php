<?php
    //CORS Headers
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: *");

    //HTTP inputs
    $rest_json = file_get_contents("php://input");
    $_POST = json_decode($rest_json, true);
    $username =  $_POST['username'];
    $password =  $_POST['password'];
    $role = $_POST['role'];
    $append = $_POST['append'];

    //connecting to SQL Database
    $con = mysqli_connect("localhost", "root", "", "othscmsdb");


    if($append){
        
        //looking for matching ptoblem
        $sql = "INSERT INTO users (username, password, role) VALUES (\"$username\", \"$password\", \"$role\")";
        $res = mysqli_query($con, $sql);
        if (!is_dir('submissions/'.$username) && $role == 'COMPETITOR') 
            mkdir("submissions/".$username, 0700);
        echo "success";
        die;
    }
    else{
        //looking for matching problem
        $sql = "DELETE FROM users WHERE username = \"$username\"";
        $res = mysqli_query($con, $sql);
        if (is_dir('submissions/'.$username) && $role == 'COMPETITOR')
            rmdir('submissions/'.$username);
        echo "success";
        die;
    }

    echo "failure";
    ?>