<?php
require_once "config.php";

function open_window($url){
 header("Location: $url");
 exit();
};

try {
    
    $j_title = $_POST['j_title'];
    $loca = $_POST['loca'];
    $req = $_POST['req'];
    $sal = $_POST['sal'];
    $txt='';

      $conn->beginTransaction();
      $conn->exec("INSERT INTO jobs(j_title,loca,req,sal) VALUES ('$j_title','$loca ','$req','$sal')");
      $conn->commit();
      $txt = "New record created successfully";

  } catch(PDOException $e) {
    $conn->rollback();
    echo "Error: " . $e->getMessage();
    echo "JOB EXISTS<br><a href='addjobs.php'>Go Back</a>";

  }
  if(strcmp($txt,"New record created successfully") == 0)
  {
    open_window('addjobs.php');
  }
  $conn = null;
?>