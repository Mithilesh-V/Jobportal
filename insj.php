<?php
require_once "config.php";

function open_window($url){
 header("Location: $url");
 exit();
};

try {
    
    $j_title = $_POST['j_title'];
    $loca = $_POST['loca'];
    $sal = $_POST['sal'];
    $txt='';

      $conn->beginTransaction();
      $conn->exec("INSERT INTO jobs(j_title,loca ,sal) VALUES ('$j_title','$loca ','$sal')");
      $conn->commit();
      $txt = "New record created successfully";

  } catch(PDOException $e) {
    $conn->rollback();
    echo "Error: " . $e->getMessage();
    echo "JOB EXISTS<br><a href='register.html'>admin.php</a>";

  }
  if(strcmp($txt,"New record created successfully") == 0)
  {
    open_window('admin.php');
  }
  $conn = null;
?>