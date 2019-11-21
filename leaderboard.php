<?php
  class Team{
    public $school;
    public $score;
    public function __construct($school, $score){
      $this->school = $school;
      $this->score = $score;
    }
  }

  //CORS Headers
  header("Access-Control-Allow-Origin: *");
  header("Access-Control-Allow-Headers: *");

  //HTTP inputs
  $rest_json = file_get_contents("php://input");
  $_POST = json_decode($rest_json, true);
  //connecting to SQL Database
  $con = mysqli_connect("localhost", "root", "", "othscmsdb");

  //looking for matching username
  $sql = "SELECT * FROM teams";
  $res = mysqli_query($con, $sql);
  $teams = array();
  if(mysqli_num_rows($res)>0){
    while($row = mysqli_fetch_assoc($res)){
      $team_id = $row['id'];
      $sql_team = "SELECT * FROM submissions WHERE team=$team_id";
      $prob = mysqli_query($con, $sql_team);

      if(mysqli_num_rows($prob)>0){
        $completed = array();
        $score = 0;
        while($problem = mysqli_fetch_assoc($prob)){
          $t = $problem["team"];
          if(!array_key_exists("$t", $teams))$teams["$t"] = 0;
          if($problem["status"]=="completed"&&!in_array($problem["problem"],$completed)){
            $completed[] = $problem["problem"];
            $pID = $problem["problem"];
            $sql_team = "SELECT * FROM submissions WHERE team=$team_id AND problem=$pID";
            $attempts = mysqli_query($con, $sql_team);
            $score = 60;
            if(mysqli_num_rows($attempts)>0){
              while($att = mysqli_fetch_assoc($attempts)){
                if($att["status"]=="failed")$score -= 5;
              }
            }
            $teams["$t"] += $score;
          }

        }

      }


    }
    $schools = array();
    for($i = 1; $i<count($teams)+1; $i++){
      $sql = "SELECT * FROM teams WHERE id=$i";
      $res = mysqli_query($con, $sql);
      if(mysqli_num_rows($res)>0){
        while($result = mysqli_fetch_assoc($res)){
          $schools["$i"] = new Team($result["school"], $teams["$i"]);
        }
      }

    }
    echo json_encode($schools);
  }


?>
