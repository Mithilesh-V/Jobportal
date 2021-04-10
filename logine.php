<?php
require_once "config.php";

function open_window($url){
 header("Location: $url");
 exit();
};

try {
    
    $name = $_POST['username'];
    $password = $_POST['password'];
    $cnt=0;
    
    $sql = "SELECT * FROM register 
    WHERE name='$name' AND password='$password' ";

    foreach ($conn->query($sql) as $row) {
        $cnt += 1;
    }
  } catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
  }
  if( $cnt == 0)
  {
    open_window('register.html');
  }
  else
  {
      open_window('index.html');
  }
  $conn = null;
?>