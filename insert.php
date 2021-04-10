<?php
require_once "config.php";

function open_window($url){
 header("Location: .$url.");
 exit();
};

try {
    
    $name = $_POST['username'];
    $password = $_POST['password'];

    $sql = "INSERT INTO register
    VALUES ('$name','$password')";
    // use exec() because no results are returned
    $conn->exec($sql);
    $txt = "New record created successfully";
  } catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
  }
  if(strcmp($txt,"New record created successfully") == 0)
  {
    open_window('index.html');
  }
  $conn = null;
?>