<?php
use "config.php";

function openwindow($url){
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
    $qal = $_POST['degree'];
    $email = $_POST['email'];
    $skills = $_POST['skills'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $p_exp = $_POST['p_exp'];
    $txt='';
    if(strcmp($password,$conp)==0)
    {
      $conn->beginTransaction();
      $conn->exec("INSERT INTO loge VALUES ('$name','$password')");
      $conn->exec("INSERT INTO empdet(f_name,l_name,phno,email,qal,skills,age,gender,p_exp,name) 
      VALUES ('$f_name','$l_name','$phno','$email','$qal','$skills','$age','$gender','$p_exp','$name')");
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

  }
  if(strcmp($txt,"New record created successfully") == 0)
  {
    openwindow('index.html');
  }
  $conn = null;
