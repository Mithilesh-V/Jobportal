<?php
use "config.php";

function openwindow($url){
 exit();
};
try {
    
    $name = $_POST['username'];
    $password = $_POST['password'];
    $cnt=0;
    
    $sql = "SELECT * FROM loge
    WHERE name='$name' AND password='$password' ";

    foreach ($conn->query($sql) as $row) {
        $cnt += 1;
    }
  } catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
  }
  if( $cnt < 1)
  {
    open_window('index.html');
  }
  else
  {
      header("Location: emp.php?name=$name");
  }
  $conn = null;
