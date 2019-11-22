<?php
    //CORS Headers
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: *");

    //HTTP inputs
    $rest_json = file_get_contents("php://input");
    $_POST = json_decode($rest_json, true);

    $problem = $_POST['problem'];
    $team = $_POST['team'];


    // //connecting to SQL Database
    // $con = mysqli_connect("localhost", "root", "", "othscmsdb");

    // //looking for matching username
    // $sql = "INSERT INTO submissions (team, problem, file) VALUES ($team, $problem, $file)";
    // $res = mysqli_query($con, $sql);

    
    
    $filename = $_FILES['file']['name'];
    //Stores the filetype e.g image/jpeg
    $filetype = $_FILES['file']['type'];
    //Stores any error codes from the upload.
    $fileerror = $_FILES['file']['error'];
    //Stores the tempname as it is given by the host when uploaded.
    $filetemp = $_FILES['file']['tmp_name'];

    //The path you wish to upload the file to
    $filePath = "submissions/" . $team . "/";

    echo $team;
    die;

    if(is_uploaded_file($filetemp)) {
        if(move_uploaded_file($filetemp, $filePath . $filename)) {
            echo "Sussecfully uploaded your image.";
        }
        else {
            echo "Failed to move your image.";
        }
    }
    else {
        echo "Failed to upload your image.";
    }
    
?>
