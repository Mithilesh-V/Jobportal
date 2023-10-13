<?php
use "config.php";

function openwindow($url){
 header("Location: $url");
 exit();
};
try {
    
    $name = $_GET['name'];
    $jid = $_GET['j_id'];
    $txt='';

      $conn->beginTransaction();
      $conn->exec("UPDATE appl set status='R' where name= '$name' and j_id='$jid' ");
      $conn->commit();
      $txt = "New record created successfully";

  } catch(PDOException $e) {
    $conn->rollback();
    echo "Error: " . $e->getMessage();
    echo "JOB EXISTS<br><a href='addjobs.php'>Go Back</a>";

  }
  if(strcmp($txt,"New record created successfully") == 0)
  {
    openwindow('anr.php');
  }
  $conn = null;
?>
