<?php
require_once "config.php";

function open_window($url){
 header("Location: $url");
 exit();
};

try {
    
    $name = $_POST['username'];
    $password = $_POST['password'];
    $conp = $_POST['confirm_password'];
    if(strcmp($password,$conp)==0)
    {
      $sql = "INSERT INTO loge
      VALUES ('$name','$password')";
      // use exec() because no results are returned
      $conn->exec($sql);
      $txt = "New record created successfully";
    }
    else
    {
      open_window('register.html');
    }
  } catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
  }
  if(strcmp($txt,"New record created successfully") == 0)
  {
    open_window('index.html');
  }
  $conn = null;
?>