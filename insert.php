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
    $txt='';
    if(strcmp($password,$conp)==0)
    {
      $conn->beginTransaction();
      $conn->exec("INSERT INTO loge VALUES ('$name','$password')");
      $conn->exec("INSERT INTO empdet(f_name,l_name,phno,email,name) VALUES ('$f_name','$l_name','$phno','$email','$name')");
      $conn->commit();
      $txt = "New record created successfully";
    }
    else
    {
      open_window('register.html');
    }
  } catch(PDOException $e) {
    $conn->rollback();
    echo "Error: " . $e->getMessage();
    echo "USERNAME ALREADY EXISTS<br><a href='register.html'>CLICK HERE TO GO BACK</a>";
    // header("Location: err.html");
    // sleep(5);
    // open_window('register.html');
  }
  if(strcmp($txt,"New record created successfully") == 0)
  {
    open_window('index.html');
  }
  $conn = null;
?>