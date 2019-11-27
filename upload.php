<?php
    //CORS Headers
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: *");

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

    //separating by problem
    if (!is_dir($filePath.$problem)) 
    mkdir($filePath.$problem, 0700);

    $filePath = $filePath . $problem . "/";

    //date for separating attempts
    $date = date('Y-m-d-H-i-s');
    mkdir($filePath.$date, 0700);

    $filePath = $filePath . $date . "/";

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
