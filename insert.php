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
    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $phno = $_POST['phno'];
    $email = $_POST['email'];
    if(strcmp($password,$conp)==0)
    {
      $sql = "INSERT INTO loge
      VALUES ('$name','$password');
      INSERT INTO empdet(f_name,l_name,phno,email,name)
      VALUES ('$f_name','$l_name','$phno','$email','$name');
      ";
      // use exec() because no results are returned
      $conn->exec($sql);
      $txt = "New record created successfully";
    }
    else
    {
      open_window('register.html');
    }
  } catch(PDOException $e) {
    header("Location: err.html");
    //sleep(5);
    //open_window('register.html');
  }
  if(strcmp($txt,"New record created successfully") == 0)
  {
    open_window('index.html');
  }
  $conn = null;
?>