<?php
require_once "config.php";

function open_window($url){
 header("Location: $url");
 exit();
};

try {
    
    $name = $_GET['name'];
    $jid = $_GET['j_id'];
    $txt='';

      $conn->beginTransaction();
      $conn->exec("UPDATE appl set status='A' where name='$name' and j_id='$jid' ");
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