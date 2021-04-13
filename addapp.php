<?php
require_once "config.php";

function open_window($url){
 header("Location: $url");
 exit();
};

try {
    
    $name = $_GET['name'];
    $j_id = $_GET['j_id'];
    $txt='';

      $conn->beginTransaction();
      $conn->exec("call appljbs('$name','$j_id');");
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