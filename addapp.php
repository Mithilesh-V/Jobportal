<?php
require_once "config.php";

try {
    
    $name = $_GET['name'];
    $j_id = $_GET['j_id'];
    $txt='';

      $conn->beginTransaction();
      $conn->exec("INSERT INTO appl(j_id,name,status) values('$j_id','$name','O');");
      $conn->commit();
      $txt = "New record created successfully";

  } catch(PDOException $e) {
    $conn->rollback();
    echo "Error: " . $e->getMessage();
    echo "JOB EXISTS<br><a href='register.html'>admin.php</a>";

  }
  if(strcmp($txt,"New record created successfully") == 0)
  {
    
    header("Location: appl.php?name=$name");
  }
  $conn = null;
?>